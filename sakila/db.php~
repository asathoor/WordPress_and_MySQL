<?php
// CONNECT TO THE SAKILA DATABASE

$mysqli = new mysqli("localhost", "USER", "PASSWORD","sakila"); // creates the object
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; // if error messages
}

echo $mysqli->host_info . "\n"; // you can drop this ... but for now it is a nice test.
?>