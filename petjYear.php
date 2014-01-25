<?php
 
/**
 * Plugin Name: Write the year by the shortcode 'anno'
 * Plugin URI: http://www.multimusen.dk
 * Description: IAITS.
 * Version: 1.0
 * Author: Per Thykjaer Jensen (inspired by the link below)
 * Author URI: http://www.multimusen.dk
 * License: (c) 2013 GPLv3
 
* Insert the current year by a shortcode
* Inspired by: http://wordpress.org/support/topic/creating-a-year-shortcode
**/
 
function year_shortcode() {
	$year = date('Y');
	return $year;
}
 
add_shortcode('anno', 'year_shortcode');
 
?>
