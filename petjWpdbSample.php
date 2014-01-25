<?php
/**
 * Plugin Name: PETJ wpdb demo
 * Plugin URI: http://petj.mmd.eal.dk/
 * Description: Shortcode for a SQ via PHP
 * Version: 1.0
 * Author: Per Thykjaer Jensen
 * Author URI: http://www.multimusen.dk
 * License: GPL3
 */

/*
The function will define a SQL sentence and return the result.
You can use the result in a post or page by entering the shortcode
[petjSchedule]
*/

function usePetjDB(){

	global $wpdb; // you have to globalize wpdb before use

	$sql = "SELECT * FROM `E13_undervisning` ORDER BY `Klasse`";
	$visSkema = $wpdb->get_results($sql);

	echo "<table>"; // primitive table without th etc.

    foreach($visSkema as $row){
	echo "<tr>";
        echo "<td>" . $row->Uge . "</td>";
	echo "<td>" . $row->Emne . "</td>";
	echo "<td>" . $row->Klasse . "</td>";
	echo "<td>" . $row->OmLektionen . "</td>";
	echo "</tr>";
    }

	echo "</table>";

}
add_shortcode( 'pSchedule', 'usePetjDB' ); // register the shortcode in WP
?>
