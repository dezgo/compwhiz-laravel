<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoicingMainPageTest extends TestCase
{
	use DatabaseTransactions;

	private $user;

	public function setUp()
	{
		// This method will automatically be called prior to any of your test cases
		parent::setUp();

		$this->user = factory(App\User::class)->create();
		$this->user->roles()->attach(1);
	}

	public function testMain()
	{
		$this->actingAs($this->user)
			 ->visit('/')
			->see('Invoicing')
			->see('Customers')
			->see('Invoices')
			->see('Invoice Item Categories');
	}

  public function testUsersLink()
  {
    $this->actingAs($this->user)
		->visit('/')
		->click('userAnchor')
		->seePageIs('/user');
  }

  public function testInvoicesLink()
  {
    $this->actingAs($this->user)
		->visit('/')
		->click('Invoices')
		->seePageIs('/invoice');
  }

  public function testInvoiceItemCategoriesLink()
  {
    $this->actingAs($this->user)
		->visit('/')
		->click('Invoice Item Categories')
		->seePageIs('/invoice_item_category');
  }
}
