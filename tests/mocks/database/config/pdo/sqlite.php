<?php
return array(

	// Typical Database configuration
	'pdo/sqlite' => array(
		'dsn' => 'pdo:/'.realpath(__DIR__.'/..').'/ci_test.sqlite',
		'pdodriver' => 'sqlite',
	),

	// Database configuration with failover
	'pdo/sqlite_failover' => array(
		'dsn' => 'pdo:/'.realpath(__DIR__.'/..').'/not_exists.sqlite',
		'pdodriver' => 'sqlite',
		'failover' => array(
			array(
				'dsn' => 'pdo:/'.realpath(__DIR__.'/..').'/ci_test.sqlite',
				'pdodriver' => 'sqlite',
			),
		),
	),
);