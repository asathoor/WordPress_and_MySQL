<!DOCTYPE html>
<html>
<head>
<title>Mysqli / PHP</title>
</head>

<style>
	pre {
		position: relative;
		margin-left: 25px;
		font-family: Courier;
	}

	blockquote {
		color: green;	
	}

</style>

<body>

<h1>PHP and MySQL</h1>

<?php
$mysqli = new mysqli("localhost", "user", "password","middleearth");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

/*
$mysqli = new mysqli("localhost", "root", "mojndo", "", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

*/
echo $mysqli->host_info . "\n";


?>

<p>
Trying this query (and I made it via the Query tab):
</p>

<pre>
SELECT `hobbitses`.`firstName`, `hobbitses`.`lastName`, `swords`.`name` 
FROM `hobbitses` 
LEFT JOIN `middleearth`.`swords` 
ON `hobbitses`.`id` = `swords`.`hobbitses_id` 
ORDER BY `hobbitses`.`firstName` ASC, `swords`.`name` ASC
</pre>

<h2>From PhpMyAdmin to PHP</h2>
<p>
	In PhpMyAdmin choose the "Create PHP code" option via the Query button.
	The result is something like this:
</p>


<p>
	Ok, here's the variable ... so I can use it in my php code.
</p>

<pre>
<?
// setting the variable from PhpMyAdmin in PHP
$sql = "SELECT `hobbitses`.`firstName`, `hobbitses`.`lastName`, `swords`.`name`\n"
    . "FROM `hobbitses`\n"
    . " LEFT JOIN `middleearth`.`swords` ON `hobbitses`.`id` = `swords`.`hobbitses_id` \n"
    . "ORDER BY `hobbitses`.`firstName` ASC, `swords`.`name` ASC\n"
    . "\n"
    . "";


print($sql);
?>
</pre>

<h2>Query via PHP</h2>
<p>
	The next step is to run the query via PHP.
	Try sonething along these lines:
</p>

<pre>
$result =  $mysqli->query($sql);
print_r($result);
</pre>

<p>
	The PHP class mysqli can execute a query like this: $mysqli->query($sql)
</p>

<pre>
<?
// query via the mysqli class
$result =  $mysqli->query($sql);
print_r($result);
?>
</pre>

<p>
	So here you have the key to all kinds of queries.
</p>

<p>
	The object is an object. Loop it out!
</p>

<h2>Loop through the Object</h2

<p>
	In order to loop out the result we need an array. The code is:
</p>

<pre>
// fetch associative array
$row = $result->fetch_array();

// print_r($row);

// looping out the result
while($row = $result->fetch_assoc()){
    echo $row['firstName'] 
    . "'s - sword is called "
    . $row['name'] 
    . '<br />';
   }
</pre>

<p>
And here is the result:
</p>

<blockquote style="color:green">
<?
// fetch associative array
$row = $result->fetch_array();

// print_r($row);

// looping out the result
while($row = $result->fetch_assoc()){
    echo $row['firstName'] 
    . "'s - sword is called "
    . $row['name'] 
    . '<br />';
   }
?>
</blockquote>

<h2>Add something</h2>

<p>
	Enter names of the evil hobbitses:
</p>

<form action="mysqli_connect.php" method="post">
	First Name <input type="text" name="firstName"><br>
	Last Name <input type="text" name="lastName"><br>
	Address <input type="text" name="address"><br>
	<input type="submit" name="submit" value="submit"><button name="Cancel" value="Cancel" type="reset">Cancel</button>
</form>

<blockquote>
	<?
	
	if($_POST) { 
		/*
		if(isset($mysqli)) {
			echo "OK ----------<br>";
		}		
		*/
		
		// print($_POST['firstName'] . " " . $_POST['lastName']); // print out what's in the form.
		
		// store input in vars
		$fn = $_POST['firstName'];
		$ln = $_POST['lastName'];
		$adr = $_POST['address'];	
		
		// security ...	
		
		// change sql 
		// Nb. only the table not the db name in this case		
		
		//$sql2 = "INSERT INTO hobbitses (`id`,`firstName`, `lastName`, `addr`) VALUES (NULL, 'Greg', 'Hinterseher', 'Cassel');";
		$sql2 = "INSERT INTO hobbitses (`id`,`firstName`, `lastName`, `addr`) VALUES (NULL, '$fn', '$ln', '$adr');";
		
		// Query
		$insert = $mysqli->query($sql2);	
		
		if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";		
		
		print("<br>The SQL sentence: " . $sql2);
	}
	else {
		print("<span style='color:red'>You may want to insert a hobbit name above.</span>");
	} 
	?>
</blockquote>

<p>
	In order to insert a hobbit in the table we need this SQL:
</p>

<pre>
	INSERT INTO `middleearth`.`hobbitses` (`id`, `firstName`, `lastName`, `addr`) VALUES (NULL, 'Rosie', 'Cotton', 'The Inn');
</pre>

<pre> 
/* You know how to make a query. 
** Write the php code that will insert the $_POST in the database
*/
</pre>



<h2>Delete something</h2>

<p>
	On <a href="http://www.sanwebe.com/2013/03/basic-php-mysqli-usage">Sanwebe.com</a> you can find several examples on how to do basic mysqli operations, such as: create, read, update, delete.
</p>
 
<pre> 
/*
** Let PHP create a table with the names of all hobbits.
** Add a delete button
** Tip: use some logic like "... where id = 2" (or whatever the id is)
*/
</pre>



<h2>Update</h2>



<pre>
/*
** Let PHP create forms with the names of the hobbits.
** If you change a name and click a save button the database i updated.
*/
</pre>



<h2>Close connection</h2>


<?
// close connection
//$result->close();
?>
</body>
</html>
