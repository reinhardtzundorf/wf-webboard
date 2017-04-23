<?php 

	/** -------------------------------------------------------------------------- **
	 *	Insight Student Volunteers - Volunteer Portal 								*
	 *	File 			index.php 													*
	 *	Date 			14 March 2017												*
	 *	Author 			Reinhardt Zundorf											*
	 ** -------------------------------------------------------------------------- **/
	require("conf/conf.php");

	/** -------------------------------------------------------------------------- **
	 *	Check whether the user is logged in.		 								*
	 ** -------------------------------------------------------------------------- **/
	if($user->checkLogin()) 
	{ 
		header('Location: modules/dashboard/dashboard.php'); 
	}

	/** -------------------------------------------------------------------------- **
	 *	Register the user 							 								*
	 ** -------------------------------------------------------------------------- **/
	if(isset($_POST['submit']))
	{

		/** -------------------------------------------------------------------------- **
		 *	Check length of the username entered 										*
		 ** -------------------------------------------------------------------------- **/
		if(strlen($_POST['username']) < 3)
		{
			$error[] = 'Username is too short.';
		} 
		else 
		{
			/** -------------------------------------------------------------------------- **
			 *	Prepared SQL statement to fetch all matching username's from the 'vp_admin' *      
			 *  table. Lastly, create error message if there is a match						*
			 ** -------------------------------------------------------------------------- **/
			$stmt = $db->prepare('SELECT username 
								  FROM members 
								  WHERE username = :username;');

			/* -------------------------------------------------------------------------- */

			$stmt->execute(array(':username' => $_POST['username']));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			/* -------------------------------------------------------------------------- */

			if(!empty($row['username']))
			{
				$error[] = 'Username provided is already in use.';
			}

		}

		/** -------------------------------------------------------------------------- **
		 *	Check password entry length 												*
		 ** -------------------------------------------------------------------------- **/
		if(strlen($_POST['password']) < 3){
			$error[] = 'Password is too short.';
		}

		/** -------------------------------------------------------------------------- **
		 *	Check confirmation password 												*
		 ** -------------------------------------------------------------------------- **/
		if(strlen($_POST['passwordConfirm']) < 3)
		{
			$error[] = 'Confirm password is too short.';
		}

		/** -------------------------------------------------------------------------- **
		 *	Check whether password and confirm password are the same.					*
		 ** -------------------------------------------------------------------------- **/
		if($_POST['password'] != $_POST['passwordConfirm'])
		{
			$error[] = 'Passwords do not match.';
		}

		/** -------------------------------------------------------------------------- **
		 *	Validate the email address entered 											*
		 ** -------------------------------------------------------------------------- **/
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
		    $error[] = 'Please enter a valid email address';
		} 
		else 
		{
			/** -------------------------------------------------------------------------- **
			 *	Prepare SQL statement that returns all the email addresses that match the   *
			 *  one entered by the user. If there is even one match, throw an error.        *
			 ** -------------------------------------------------------------------------- **/
			$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
			$stmt->execute(array(':email' => $_POST['email']));
			
 			/* --------------------------------------------------------------------------- */

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			/* --------------------------------------------------------------------------- */

			if(!empty($row['email']))
			{
				$error[] = 'That email address has already been taken.';
			}

		}


		/** --------------------------------------------------------------------------- **
		 * 	Finally, if there are no errors with the data entered then continue to 		 *
		 *	register the user. First we create a hash to encrypt the password and 		 *
		 *	generate an 'md5 hash' that will be the activation code sent to the user by  *
		 *	email.																		 *
		 *	Hash Format: 																 *
		 ** --------------------------------------------------------------------------- **/
		if(!isset($error))
		{

			/** -------------------------------------------------------------------------- **
			 *	Hash the user's password.                                                   *
			 ** -------------------------------------------------------------------------- **/
			$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

			/** -------------------------------------------------------------------------- **
			 *	Create the activation code.							                        *
			 ** -------------------------------------------------------------------------- **/
			$activation = md5(uniqid(rand(),true));

			try 
			{

				/* ------------------------------------------------------------------------ */
				
				$stmt = $db->prepare('INSERT INTO members (username,password,email,active) VALUES (:username, :password, :email, :active)');

				/* ------------------------------------------------------------------------ */

				$stmt->execute(array(':username' => $_POST['username'],
									 ':password' => $hashedpassword,
									 ':email' 	 => $_POST['email'],
									 ':active'	 => $activation
				));
				
				$id = $db->lastInsertId('memberID');

				/** ---------------------------------------------------------------------- **
				 *	Send activation link email.												*
				 ** ---------------------------------------------------------------------- **/
				$to = $_POST['email'];
				$subject = "Registration Confirmation";
				$body = "<p>Thank you for registering at demo site.</p>
				<p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activation'>".DIR."activate.php?x=$id&y=$activation</a></p>
				<p>Regards Site Admin</p>";

				$mail = new Mail();
				$mail->setFrom(SITEEMAIL);
				$mail->addAddress($to);
				$mail->subject($subject);
				$mail->body($body);
				$mail->send();

				/** ---------------------------------------------------------------------- **
				 *	Redirect the now registered user to the main dashboard.					*
				 ** ---------------------------------------------------------------------- **/
				header('Location: index.php?action=joined');
				exit;
			} 
			catch(PDOException $e) 
			{
			    $error[] = $e->getMessage();
			}

		}

	}

	//define page title
	$title = 'Demo';

	//include header template
	require(DIR . "modules/layout/header.php");
	?>


	<div class="container">

		<div class="row">

		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form role="form" method="post" action="" autocomplete="off">
					<h2>Please Register Up</h2>
					<p>
						Already a member? 
						<a href="modules/login/login.php">Login</a>
					</p>
					
					<hr>

					<?php

						if(isset($error))
						{
							foreach($error as $error)
							{
								echo "<p class='bg-danger'>".$error."</p>";
							}
						}

						if(isset($_GET['action']) && $_GET['action'] == 'joined')
						{
							echo "<h2 class='bg-success'>" .
								 	"Registration successful, please check your email to activate your account." . 
								 "</h2>";
						}
					?>

					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
					</div>
					<div class="form-group">
						<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
							</div>
						</div>
					</div>

					<!-- Submit button -->
					<div class="row">
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
					</div><!-- /submit -->

				</form><!-- /form -->
			</div><!-- /content -->
		</div><!-- /row -->
	</div><!-- /div -->

<?php require(DIR . "modules/layout/footer.php"); ?>