<!DOCTYPE HTML>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Welcome | Volunteer Management System | Insight Student Volunteers</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>
    <body>
        <div class="container-fluid" style="background:rgba(255,255,255,0.65); width:100%; min-height:170px;">
            <img alt="logo" src="res/img/mainLogo.jpg"/> 
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-success">
                        <div class="panel-heading"><h3 class="panel-title">Sign In</h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="login.php">
                                <fieldset>
                                    <div class="form-group"><input class="form-control" placeholder="E-mail" name="email" type="email" autofocus></div>
                                    <div class="form-group"><input class="form-control" placeholder="Password" name="pass" type="password" value=""></div>
                                    <input id="cc-login-button" class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="js/jquery-ui-min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </body>
</html>
