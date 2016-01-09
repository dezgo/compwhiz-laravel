<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MainSiteNavigationTest extends TestCase
{
	public function testHome()
	{
		$this->visit('/')
			->see('Home');
	}

  public function testAbout()
  {
    $this->visit('/about')
      ->see('Pricing');
  }

  public function testServices()
  {
    $this->visit('/services')
      ->see('Services');
  }

  public function testContact()
  {
    $this->visit('/contact')
      ->see('Contact');
  }

  public function testSubscribe()
  {
    $this->visit('/subscribe')
      ->see('Subscribe');
  }
}
