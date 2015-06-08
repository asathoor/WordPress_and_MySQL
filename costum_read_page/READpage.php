<?php
/*
Template Name: PHP and MySQL

*
* The template will READ data from any database and a table via PHP
*

*/

require_once "db.php";

get_header();
get_sidebar();

/* query */
$sql = "SELECT `first_name`,`last_name` FROM `actor` ORDER BY `first_name`";
$result =  $mysqli->query($sql); // query

/* create an array and loop it out */
$row = $result->fetch_array(); // fetch associative array

while($row = $result->fetch_assoc()){
    echo $row['first_name'] . " " . $row['last_name'] . "<br />\n";
   }

mysqli_close($mysqli);

get_footer(); ?>