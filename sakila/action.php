
<?php
/*
File: action.php
Purpose: INSERT INTO ...
*/

require_once('header.php');

require_once('db.php');

	if($_GET) { 
		
		// store input in vars
		// $fn = $_GET['firstName'];
		// $ln = $_GET['lastName'];
		
		// SECURITY
		// sanitise input
		// source url: http://www.phpdevtips.com/2011/06/simplified-data-sanitizing
		function clean_data( $input ){
    		$input = trim( htmlentities( strip_tags( $input,"," ) ) );

    		if( get_magic_quotes_gpc() )
        		$input = stripslashes( $input );

    			$input = mysql_real_escape_string( $input );
    			return $input;
			}	

		// sanitise the input from the form
		$fn = clean_data( $_GET['firstName'] );
		$ln = clean_data( $_GET['lastName'] );
		
		// format the sql
		$sql = "
			INSERT INTO `sakila`.`actor` (`actor_id`, `first_name`, `last_name`, `last_update`) VALUES (NULL, '$fn', '$ln', CURRENT_TIMESTAMP);";
					
		// INSERT
		$insert = $mysqli->query($sql);	
		
		echo "<p>New actor added: $fn $ln - Gee tanx a lot.</p>";
		
	}
	else {
		echo "<p>Error: Use the form please. No GET got.</p>";
	}

require_once('footer.php');
?>
