<!DOCTYPE html>
<html>
<head>
	<title>PHP and MySQL connect</title>
</head>
<body>

<?php
// MySQL connect script - based on PHP pp. 336.

$solutions = "<br><span style='color:green'>Check your settings</span> - e.g. is the password ok? <br> Alternatively you may have to set the MYSQL password in Xampp.You can set this in Xampp Security.";

// controls
if(
	$dbc = mysql_connect(
		"localhost",
		"user",
		"password"
	)) {
		print("OK you're connected to the database.");
		// or ... logic that'll present your query.
		
		// create a database here (p. 343)
		// tip: mysql_query()		
		
		// connect to it
		// tip: mysql_select_db()
		
		// create tables
		// tip p. 349: mysql_query("CREATE TABLE ...")
		
		// Insert data into the database
		// tip: p. 362 mysql_query("INSERT INTO tablename VALUES ...")
		
		// so why don't you add a form ... ?
		// tip: p. 353
		
		// securing data
		// tip: p. 358
		
		// delete data ... yep you guessed it ... delete some data ...
		// tip: p. 366.
		
		// update something
		// tip: p. 372
		
		// then it's wise to close the connection
		mysql_close($dbc);
	}
	else {
		print("<p style='color:red'>
			Well, shit happens. No connection to the database. " 
			. $solutions . "</p><p>Here is the error message from MySQL: '<em>" . mysql_error() . "'</em></p>");
	}

?>


</body>
</html>
