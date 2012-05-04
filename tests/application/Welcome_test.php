<?php

class Welcome_test extends CI_Selenium_TestCase {

	public function set_up()
	{
		$this->setBrowser('firefox');
        $this->setBrowserUrl('http://codeigniter.com/');
        //$this->setBrowserUrl('http://codeigniter.dev/');
	}
	
	// ------------------------------------------------------------------------
	
	public function test_welcome()
	{
		$this->url('http://codeigniter.com/');
		$this->assertEquals('CodeIgniter - Open source PHP web application framework', $this->title());
		//$this->assertEquals('Welcome to CodeIgniter', $this->title());
	}
	
}