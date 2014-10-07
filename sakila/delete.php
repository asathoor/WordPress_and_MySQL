<? 

/*
File: delete.php
Purpose: delete something in the Sakila sample database
*/

require_once('header.php'); // html header
require_once('db.php'); // the mysqli object

$sql = "SELECT * FROM `actor`\n"
    . "ORDER BY `actor`.`first_name` ASC"; // a query created in PhpMyAdmin
    
$result =  $mysqli->query($sql); // query

$row = $result->fetch_array(); // fetch associative array

// $row['actor_id'] = NULL; // defined because the next var needs it

$deleteForm = "<form action='deleteAction.php'>\n
						<input type='hidden' name='delete' value='$row[actor_id]'>\n
						<button name='Delete' value='Delete' type='submit'>Delete</button>\n
					</form>\n";

?>

<h2>Actors</h2>

<p>
	Delete unwanted actors from the database.
</p>

<!-- A table for the actors -->
<table>

<?
// looping out a nice table of actors with a deletebutton too.
while($row = $result->fetch_assoc()){
	
	// the delete button form used in the table	
	$deleteForm = "<form action='deleteAction.php'>\n
						<input type='hidden' name='delete' value='$row[actor_id]'>\n
						<button name='Delete' value='Delete' type='submit'>Delete</button>\n
					</form>\n";
	
	// tr and td
    echo "\n<tr>\n<td>" 
    . $row['first_name'] 
    . " " 
    . $row['last_name']
    . "<td>" 
    . $deleteForm 
    . "</td>"
    . "</td>\n</tr>";
   }

require_once('footer.php'); // html footer
?>

</table>