<?php

class DB_test extends CI_TestCase {

	// ------------------------------------------------------------------------

	public function test_db_invalid()
	{
		$connection = new Mock_Database_DB(array(
			'undefined' => array(
				'dsn' => '',
				'hostname' => 'undefined',
				'username' => 'undefined',
				'password' => 'undefined',
				'database' => 'undefined',
				'dbdriver' => 'undefined',
			),
		));

		$this->setExpectedException('InvalidArgumentException', 'CI Error: Invalid DB driver');

		Mock_Database_DB::DB($connection->set_dsn('undefined'), TRUE);
	}

	// ------------------------------------------------------------------------

	public function test_db_valid()
	{
		var_dump('here');
		$config = Mock_Database_DB::config(DB_DRIVER);
		$connection = new Mock_Database_DB($config);
		var_dump('there');
		$db = Mock_Database_DB::DB($connection->set_dsn(DB_DRIVER), TRUE);
		var_dump('there too');

		$this->assertTrue($db instanceof CI_DB);
		$this->assertTrue($db instanceof CI_DB_Driver);
	}

	// ------------------------------------------------------------------------

	public function test_db_failover()
	{
		$config = Mock_Database_DB::config(DB_DRIVER);
		$connection = new Mock_Database_DB($config);
		$db = Mock_Database_DB::DB($connection->set_dsn(DB_DRIVER.'_failover'), TRUE);

		$this->assertTrue($db instanceof CI_DB);
		$this->assertTrue($db instanceof CI_DB_Driver);
	}
	
}