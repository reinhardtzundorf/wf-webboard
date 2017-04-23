<?php require_once '../../conf/conf.php';?>
<!-- Start of Header -->
<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
	<!-- Head -->
	<head>
		<meta charset="utf-8">
    	<meta name="viewport"      content="width=device-width, initial-scale=1, maximum-scale=1">
    	<meta name="description"   content="Chipa-Tabane Comprehensive High School">
    	<meta name="author"        content="Web Folders (Pty) Ltd | Reinhardt Zündorf">
    	<!--[if IE]>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->

        <title>
<?php
/** ------------------------------------------------------------------ **
 *	Set the current page's title, if '$title' does not have a value 	*
 *  then set the default value. 										*
 ** ------------------------------------------------------------------ **/
if (isset($title)) {
	echo $title;
} else {
	echo "Welcome to | Chipa-Tabane Comprehensive High School ";
}
?>
        </title><!-- /title -->

	    <!-- CSS -->
	    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans'>        <!-- Google Font -->
	    <link rel="stylesheet" href="http://localhost/ctc/conf/css/bootstrap.css">		   <!-- Bootstrap -->
        <link rel="stylesheet" href="http://localhost/ctc/conf/css/bootstrap-theme.css">   <!-- Bootstrap-Theme -->
        <link rel="stylesheet" href="http://localhost/ctc/conf/css/font-awesome.min.css">  <!-- Font-Awesome -->
	    <link rel="stylesheet" href="http://localhost/ctc/conf/css/style/main.css">		   <!-- Custom Style -->
	    <!-- /css -->

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    	<![endif]-->

	</head><!-- /head -->

	<!-- Body -->
	<body>

	<!-- Content for page is inserted here... -->

	    <!-- NAV SECTION -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="services.html">SERVICES</a></li>
                    <li><a href="pricing.html">PRICING</a></li>
                    <li><a href="gallery.html">GALLERY</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!--END NAV SECTION -->