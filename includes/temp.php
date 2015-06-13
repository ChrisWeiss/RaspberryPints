<?php

//Includes the Database and config information
require_once 'config_names.php';
require_once 'config.php';

//Unused at the moment will call untappdPHP library to post to Untappd
//include __DIR__."/app/library/UntappdPHP/lib/untappdPHP.php";

//This can be used to choose between CSV or MYSQL DB
	$db = true;


if($db){
		// Connect to the database
		db();
		
		
		$config = array();
		//Pulls config information (not currently used)
		$sql = "SELECT * FROM config";
		$qry = mysql_query($sql);
		while($c = mysql_fetch_array($qry)){
			$config[$c['configName']] = $c['configValue'];
		}
		
		// Creates arguments from info passed by python script from temp probe
		$TEMP = $argv[1];
		
	
		// Inserts in to the temp table 
		$qry = "INSERT INTO temp(temp) values ('".$TEMP."')";
		mysql_query($qry);
} 

}

		// REFRESHES CHROMIUM BROWSER ON LOCAL HOST ONLY
		// COMMENT OUT TO DISABLE
		exec(__DIR__."/refresh.sh");

?>
