<?php
/**
 * Plugin Name: Hello World
 * Plugin URI: http://petj.mmd.eal.dk/
 * Description: Shortcode that will write hello world on a page or in a post
 * Version: 1.0
 * Author: Per Thykjaer Jensen
 * Author URI: http://www.multimusen.dk
 * License: GPL3
 */

function mojnDo( $atts ){
	return "Mojn Mojn! Do."; // it's hello in South Jutland
}
add_shortcode( 'mojnMojn', 'mojnDo' ); // mojnMojn = the shortcode, mojnDo = the function above
?>
