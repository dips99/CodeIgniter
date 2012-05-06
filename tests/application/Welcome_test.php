<?php

class Welcome_test extends CI_Selenium_TestCase {

	public function set_up()
	{
		$this->setBrowser('firefox');
        $this->setBrowserUrl('http://127.0.0.1/codeigniter/index.php');
	}
	
	// ------------------------------------------------------------------------
	
	public function test_welcome()
	{
		$this->url('http://127.0.0.1/codeigniter/index.php');
		$this->assertEquals('Welcome to CodeIgniter', $this->title());
	}
	
}