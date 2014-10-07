<?
/*
file: deleteAction.php
purpose: delete somebody in the Sakila database
*/

require_once('header.php'); // html header
require_once('db.php'); // the mysqli object

$delete = $_GET['delete'];

/*** 
NB: Fails because of a foreign key constraint error.

--- SOLUTION ---

1. Go to the table film_actor
2. -> Structure -> Relations
3. actor_id ... change restriction to CASCADE
4. Now you can delete an actor.
***/

$sql = "DELETE FROM actor WHERE actor_id = $delete";
    
$result =  $mysqli->query($sql);
echo 	"An actor with the id $delete was deleted!"
	. "<p><a href='delete.php'>Actor List</a></p>";

require_once('footer.php'); // html footer
?>

