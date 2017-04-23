<?php
	/** ------------------------------------------------------------------------------ **
	 *  Chipa Tabane Comprehensive High	School											*
	 *  Global Configuration File 														*
	 ** ------------------------------------------------------------------------------ **
	 *	File 					conf.php 												*	
	 * 	Path 					/conf/conf.php 											*
 	 * 	Version   				1.0											    		*
	 *  Date Created            21/03/2017                                       		*
	 ** ------------------------------------------------------------------------------ **/

	/** ------------------------------------------------------------------------------ **
     *  Set logging variables                                                           *
     ** ------------------------------------------------------------------------------ **/
    $date    = date("Y-m-d h:m:s");
    $file    = __FILE__;
    $level   = "INFO";
    $log 	 = "";

	date_default_timezone_set('Europe/London');

	/** ------------------------------------------------------------------------------ **
	 * Establish iSV Database connection parameters. 								    *
	 ** ------------------------------------------------------------------------------ **/
	define('DBHOST','localhost');
	define('DBUSER','root');
	define('DBPASS','16538xxr');
	define('DBNAME','ctc_mainwebdb');

	/** ------------------------------------------------------------------------------ **
	 *	Domain Configuration							 								    *
	 ** ------------------------------------------------------------------------------ **/
	define('DIR','http://localhost/ctc/');					/* for development */
	define('MODULE', '/var/www/html/ctc/modules/');
	define('CONFIG', '/var/www/html/ctc/conf/');
	define('RES', '/var/www/html/ctc/res/');
	define('EMAIL','noreply@chipatabanechs.co.za');			/* needs to be created */

	/** ------------------------------------------------------------------------------ **
	 *	Create PDO objects with the specified database parameters, throw an error if 	*
	 *	not successful.							 								    	*
	 ** ------------------------------------------------------------------------------ **/
	try 
	{
		$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		/* -------------------------------------------------------------------------------- */

		$level =  "INFO";
		$log   = "{$date} {$file} {$level} : PDO object 'db' successfully created." . PHP_EOL;

		error_log($log);
	} 
	catch(PDOException $e) 
	{
		/* -------------------------------------------------------------------------------- */

		$level	= "ERROR";
		$log 	= "{$date} {$file} {$level} : Failed to create PDO database connection object." . PHP_EOL;
		
		error_log($log);
	    exit;
	}
?>
