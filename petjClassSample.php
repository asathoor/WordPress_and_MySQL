<?php

/**
* A very simple PHP class sample
* Sample: http://multimusen.dk/test/petjClassSample.php
**/

class petjC {

	public function cpyrgt(){
		print('By: Per Thykjaer Jensen, ' 
		. date('Y')
		. ' - live long and prosper.' );		
	}

}

/**
* How to instantiate the class
**/

$ppp = new petjC();

/**
* How to fire off a function from a class instance
**/

$ppp::cpyrgt(); // should return a copyright string ...
?>
