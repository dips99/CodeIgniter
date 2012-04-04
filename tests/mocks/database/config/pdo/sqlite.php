<?php

return array(

	// Typical Database configuration
	'pdo/sqlite' => array(
		'dsn' => 'sqlite:/'.realpath(__DIR__.'/..').'/ci_test.sqlite',
		'dbdriver' => 'pdo',
	),

	// Database configuration with failover
	'pdo/sqlite_failover' => array(
		'dsn' => 'sqlite:/'.realpath(__DIR__.'/..').'/ci_test.sqlite',
		'dbdriver' => 'pdo',
		'dbdebug' => 'false',
		'failover' => array(
			array(
				'dsn' => 'sqlite:/'.realpath(__DIR__.'/..').'/ci_test.sqlite',
				'dbdriver' => 'pdo',
			),
		),
	),
);