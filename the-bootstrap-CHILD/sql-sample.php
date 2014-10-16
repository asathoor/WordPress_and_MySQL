<?php

/*
Template Name: WPDB sample page
*/

get_header(); ?>

<div id="primary" class="span8">
	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top(); ?>

		<h2>The $wpdb class</h2>
		<p>
			This page will echo the options from the wp_options table via a foreach loop.
		</p>
		<p>
			However the $wpdb-class can only use the tables from the database of your WordPress.
		</p>

		<!-- the wpdb class -->
		<?
		// 1st Method - Declaring $wpdb as global and using it to execute an SQL query statement that returns a PHP object
		global $wpdb;
		$results = $wpdb->get_results( 'SELECT * FROM wp_options ORDER BY option_name', OBJECT );

		echo "<ul>";
		foreach($results as $result) {
			echo "<li>" . $result->option_name . "</li>";
		}
		echo "</ul>";

		?>	


	</div><!-- #content -->
	<?php tha_content_after(); ?>
</div><!-- #primary -->


<?php
get_sidebar();
get_footer();


/* End of file page.php */
/* Location: ./wp-content/themes/the-bootstrap/page.php */
