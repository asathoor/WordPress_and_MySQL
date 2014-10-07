<?
/*
file: actors.php
purpose: a list of actors from the sakila database
*/

require_once('header.php'); // html header
require_once('db.php'); // the mysqli object

$sql = "SELECT * FROM `actor`\n"
    . "ORDER BY `actor`.`first_name` ASC"; // a query created in PhpMyAdmin
    
$result =  $mysqli->query($sql); // query

$row = $result->fetch_array(); // fetch associative array

?>

<nav>
	<ul>
		<li>
			<a href="form.php">Enter new actor to the list</a>		
		</li>	
	</ul>
</nav>

<h2>Actors</h2>

<?
// looping out the result
while($row = $result->fetch_assoc()){
    echo $row['first_name'] . " ";
    echo $row['last_name']. '<br />';
   }

require_once('footer.php'); // html footer
?>

