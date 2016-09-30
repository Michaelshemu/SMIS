<?php 
require_once 'settings.php';

$connection = @mysql_connect($settings['dbhost'], $settings['dbuser'],$settings['dbpassword']);
		
		if(!$connection)
			{ 
				echo "unable to connect to database";
			}
		

//Selecting the database
			@mysql_select_db($settings['dbname'], $connection);

?>