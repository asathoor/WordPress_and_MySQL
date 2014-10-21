<?php
/*
**
* Plugin Name: PETJ Quotes
* Plugin URI: http://multimusen.dk/
* Description: A dashboard widget
* Version: 1.0
* Author: Per Thykjaer Jensen
* Author URI: http://www.multimusen.dk
* License: GPL3
*/

/*
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function petj_quote_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'petj_quotes',         // Widget slug.
                 'A Quote',         		// Title.
                 'petj_write_quote' // Display function.
        );	
}
$add_widget = add_action( 'wp_dashboard_setup', 'petj_quote_add_dashboard_widgets' );


/* create table if it isn't present */

check_quotes_table(); // Is the table present?

function check_quotes_table()
{
	global $wpdb; // The WP database class

	$table_name = "wp_quotes";
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
	{
		$sql = "CREATE TABLE " . $table_name . " (
		petj_id INT(11) NOT NULL AUTO_INCREMENT,
		petj_quote TEXT,
		petj_author TEXT,
		PRIMARY KEY id (petj_id)
		);";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		$insert = "INSERT INTO " . $table_name
		. " (petj_id, petj_quote, petj_author) "
		. "VALUES (NULL, 'Do what thou willt shall be the whole of the law', 'Aleister Crowley')";
		$results = $wpdb->query( $insert ); // test data inserted.
	}
}


/* READ or Echo a Quote */
function petj_echo_quote(){
	global $wpdb;

	$sql = "select count(`petj_id`) from wp_quotes"; // count the number of rows in the table
	$num_quotes = $wpdb->query($sql); // execute the sql 

	// $quote_sql = "SELECT * FROM `wp_quotes` WHERE `petj_id` <= FLOOR( RAND() * $num_quotes ) "; // random number rounded up.
	$quote_sql ="SELECT * FROM `wp_quotes` WHERE `petj_id` >= (SELECT FLOOR( MAX(`petj_id`) * RAND()) FROM `wp_quotes` ) ORDER BY `petj_id` LIMIT 1";

	foreach( $wpdb->get_results($quote_sql) as $key => $row) {
	// each column in your row will be accessible like this

	$row->petj_quote = stripcslashes($row->petj_quote);
	$row->petj_author = stripcslashes($row->petj_author);

	// to print out all the rows
	print "
		<div class='wrap'>\n
			<blockquote>\n
				\"$row->petj_quote.\" <br><br>\n
				($row->petj_author)\n
			</blockquote>\n
		</div>
	";
	}
}


/* form to INSERT a new quote */

function petj_write_quote() {
	?> <!-- escapes php now you can enter HTML --> 

	<!-- one random quote -->
	<div class="wrap">
		<blockquote style="font-size:large">
					<?php petj_echo_quote(); ?>
		</blockquote>
	</div>

	<?php 
}

/* Here we add something to the Dashboard toolbar */

add_action( 'admin_menu', 'petj_quotes_menu' );

function petj_quotes_menu(){
	add_options_page(
		'PETJ Quotes', 
		'PETJ Add Quotes', 
		'delete_posts', 
		'petj_quote', 
		'petj_add_quote');
}


/*SQL INSERT */ 

function petj_add_quote(){
	?>
	<div class="wrap">
		<h3>Add a quote</h3>
		
		<form action="" method="post" enctype="multipart/form-data">
			<strong>Enter a quote</strong> <input type="text" name="quote"><br>
			<strong>Name of the author</strong> <input type="text" name="author"><br>
			<input type="submit" name="submit" value="Submit">
		</form>

		<?php
			if(isset($_POST) && $_POST['quote'] != '' && $_POST['author'] != '') {
				echo "Saving your quote.";

				global $wpdb;

				/* security: sanitize input 
				** Read on here - http://codex.wordpress.org/Validating_Sanitizing_and_Escaping_User_Data 
				*/
				$_POST["quote"] = sanitize_text_field($_POST["quote"]);
				$_POST["author"] = sanitize_text_field($_POST["author"]);

				$wpdb->insert(
					'wp_quotes',
						array(
							'petj_id' => NULL,
							'petj_quote' => $_POST["quote"],
							'petj_author' => $_POST["author"]
						),
						array(
							'%d',
							'%s',
							'%s'
						)
				);

			}
			else {
				echo "<div class='error'>Please write your quote and author in the form.</div>";
			}
		?>
	</div>
	<?php
}


/* MYSQL UPDATE */
function petj_quotes_update($id){
	$wpdb->update( 
	'wp_quotes', 
	array( 
		'id' => NULL,	// int
		'quote' => $_POST['quote'],	// str
		'author' => $_POST['author']
	), 
	array( 'ID' => $id ), 
	array( 
		'%d',	// value1
		'%s',	// value2
		'%s'
	), 
	array( '%d' ) 
	);
}


/* MYSQL DELETE */
function petj_quotes_delete($id){
	$wpdb->delete(
	 	'wp_quotes',
	 	array('id' => $id),
	 	array('%d')
	 );
}

/* Edit page to Dashboard Menu */


/* READ all quotes */
function petj_echo_all_quotes(){
	global $wpdb;

	$sql = "select count(`petj_id`) from wp_quotes"; // count the number of rows in the table
	$num_quotes = $wpdb->query($sql); // execute the sql 

	$quote_sql ="SELECT * FROM `wp_quotes` ORDER BY 'petj_author' ";

	print "
	<div class='wrap'>
	<h3>Update or delete quotes</h3>
	";

	foreach( $wpdb->get_results($quote_sql) as $key => $row) {
	// each column in your row will be accessible like this

	$row->petj_quote = stripcslashes($row->petj_quote);
	$row->petj_author = stripcslashes($row->petj_author);

	print 	'<div class="submitbox" style="margin-bottom:1.3em">
			<form action="" method="post" enctype="multipart/form-data">
			Quote no. ' . $row->petj_id . 
			'<input type="hidden" name="quoteUpdate" value="' . $row->petj_id . ' " size="3"><br>
			<input type="text" name="quoteUpdateQuote" value="' . $row->petj_quote . ' " size="75"><br>
			<input type="text" name="quoteUpdateAuthor" value="' . $row->petj_author .  '" size="30"><br>
			<input type="submit" name="quoteUpdateSubmit" value="UpdateSubmit">
			</form>
			</div>'; 
	}

	print_r($_POST['Update']);

}

?>