<?php

/**
* Wpdb insert sample code
* NB:
* %d = number
* %s = string
**/

$wpdb->insert(
		'MyTable',
		array(
			'Id' => NULL,
			'KbnProjects_Id' => 1,
			'Color' => 'Smurphy',
			'Limit' => 3,
			'State' => 'Nuser!'
		),
		array(
			'%d',
			'%d',
			'%s',
			'%d',
			'%s'
		)

	);
?>
