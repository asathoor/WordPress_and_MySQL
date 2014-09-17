<?
/**
 * Plugin Name: PETJ Weather Plugin
 * Plugin URI: http://multimusen.dk/downloads/weather.zip
 * Description: Display weather info on a WordPress post or page from the OpenWeather.org API via Json. In this version .js and .css extensions changed to weather.php to enable php funtionality in js.
 * Version: 0.2
 * Author: Per Thykjaer Jensen, MA & cand.mag.
 * Author URI: http://www.multimusen.dk
 * License: GPLv3
 **/

/* importing the scripts */
function theme_name_scripts() {
	wp_enqueue_style( 'petj-weather-styles', plugins_url('css.php', __FILE__) ); // css - now php will work inside css
	wp_enqueue_script( 'script-name', plugins_url( 'weather.php', __FILE__ ), array(), '0.2' , true ); // js true = in bcompiler_write_footer(filehandle)
	wp_enqueue_script( 'script-name', plugins_url( 'jQueryRotate.js', __FILE__ ), array(), '0.2' , true ); // load jQueryRotate.js - sample howto use jQ in plugin
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' ); 

/* the script will echo a div where the weather data will be displayed */
function petj_html(){
	echo "<div id='weather'></div>";
}

add_shortcode('petjWeather', 'petj_html'); // Register the shortcode [petjWeather]

/* Widget code from here (next version) */
?>
