<?php

/* normally we would include_once('classfile.php') the class via a separate file in OOP */

class computer {

	private $computer = "<h3> En computer </h3>"; // declare variables
	public $brand = "Acer";
	public $cpu = "Intel";
	public $location = "Office";
	public $uri = "192.168.0.11";
	
	/* functions will print out some html */
	
	
	// set id function
	public function myPC($id){
		echo "The id of this pc: " 
		. $id
		. "<br /> "	;
	}
	
	// get private var
	public function getComputer() {
		return $this->computer;
	}
	
	// lav en funtion, der sætter værdien på en private var ... ?

	
}

?>

<!DOCTYPE HTML>
<html>

<head>
	<title> Simple Class Sample </title>
</head>

<body>

<h1> Class Demo </h1>

<?

/**
* HOW TO USE THE CLASS
* set variables, echo variables, use functions etc.
**/

$macBook = new computer(); // set a new computer instance

$macBook::myPC(777); // function with attributes

echo $macBook->brand; // echo var

$macBook->cpu = "WaHueng"; // set string in public var

echo "<br />" . $macBook->cpu; // echo public var

echo "<br /> URI: " . $macBook->uri; // print public var

echo "<br />" . $macBook->getComputer(); // printer en privat var ud

?>

<!-- more info -->
<p>
	For more information about visibility and classes
	chech out 
	<a href="http://www.php.net/manual/en/language.oop5.visibility.php"> this site</a>.
</p>

<!-- demo -->
<p>
	<a href="http://multimusen.dk/php/umlTo.php"> 
		Klassen kan ses i aktion her 
	</a>
	.
</p>
</body>
</html>

