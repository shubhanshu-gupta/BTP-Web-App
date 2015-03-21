<?php



require_once("constants.php");


//connecting the database
	$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	
		if(!$connection)
			{
		die("Database connection failed: ".mysql_error($connection));
			}

//selecting a database to use
	$db_select = mysql_select_db(DB_NAME,$connection);

	if(!$db_select){
        die("Database connection failed" . mysql_error($connection));
    }
			
?>