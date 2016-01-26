<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MainSiteNavigationTest extends TestCase
{
	public function testHome()
	{
		$this->visit('/')
			->see('Hi, I\'m Derek Gillett and I run Computer Whiz');
	}
}
