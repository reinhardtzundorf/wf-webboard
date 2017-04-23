<?php
	require('includes/config.php');

	/** ---------------------------------------------------------------------- **
	 *	Collect values from the URL 											*
	 ** ---------------------------------------------------------------------- **/
	$memberID = trim($_GET['x']);
	$active = trim($_GET['y']);

	/** ---------------------------------------------------------------------- **
	 *	If id is number and the active token is not empty carry on 				*
	 ** ---------------------------------------------------------------------- **/
	if(is_numeric($memberID) && !empty($active))
	{
		/** ------------------------------------------------------------------ **
		 *	Update user's record set the active column to Yes where the 		*
		 *	memberID and active value match the ones provided in the array 		*
		 ** ------------------------------------------------------------------ **/
		$stmt = $db->prepare("UPDATE members 
							  SET active 	 = 'Yes' 
							  WHERE memberID = :memberID 
							  AND active 	 = :active");

		$stmt->execute(array(':memberID' => $memberID,
  							 ':active' 	 => $active		));

		/** ------------------------------------------------------------------- **
		 *	If the result fetches a result (1)- activate the account. 			 *
		 ** ------------------------------------------------------------------- **/
		if($stmt->rowCount() == 1)
		{
			header('Location: login.php?action=active');
			exit;
		} 
		else 
		{
			echo "Your account could not be activated."; 
		}
		
	}
?>