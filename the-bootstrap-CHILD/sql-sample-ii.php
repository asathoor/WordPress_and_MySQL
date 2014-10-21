<?php

/*
Template Name: PHP and MySQL sample page
Purpose: demonstration of a query via traditional PHP and MySQL (if you want to use another database than WordPress)
*/

get_header(); ?>

<div id="primary" class="span8">
	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top(); ?>

		<h2>PHP and MySQL in a WordPress template</h2>
		<p>
			If you need to query another database than the one where WordPress is installed
			you have to use this approach.
		</p>
		<ol>
			<li>Create a custom page.</li>
			<li>Connect to the database via php.</li>
			<li>Execute a query via PHP.</li>
			<li>Echo the result, as below.</li>
		</ol>

		<h3> The Query </h3>
		<hr />

<!-- PHP and MySQL -->
<?
// connection
$mysqli = new mysqli("localhost", "USER", "PASSWORD","sakila"); // connects to the sakila database

// connection test
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; // if error messages
}
// host info printed to the page
echo $mysqli->host_info . ".\n I am connected to the Sakila database."; // you can drop this ... but for now it is a nice test.
?>
<div id=actors>
	<h3> The Actors from the Sakila database </h3>
<?
// query
$sql = "SELECT * FROM `actor`\n"
    . "ORDER BY `actor`.`first_name` ASC"; // a query created in PhpMyAdmin
    
$result =  $mysqli->query($sql); // query

$row = $result->fetch_array(); // fetch associative array

// looping out the result
while($row = $result->fetch_assoc()){
    echo $row['first_name'] . " ";
    echo $row['last_name']. '<br />';
   }

// ends the query and loop
?>	
</div><!-- actors end -->

	</div><!-- #content -->
	<?php tha_content_after(); ?>
</div><!-- #primary -->


<?php
get_sidebar();
get_footer();


/* End of file page.php */
/* Location: ./wp-content/themes/the-bootstrap/page.php */
