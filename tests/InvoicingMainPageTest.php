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

		$this->user = factory(App\User::class)->make();
	}

	public function testMain()
	{
		$this->actingAs($this->user)
			->visit('/admin/invoice')
			->see('Invoicing')
      ->see('Customers')
      ->see('Invoices')
      ->see('Invoice Item Categories');
	}

  public function testCustomersLink()
  {
    $this->actingAs($this->user)
      ->visit('/admin/invoice')
      ->click('Customers')
      ->seePageIs('/customer');
  }

  public function testInvoicesLink()
  {
    $this->actingAs($this->user)
      ->visit('/admin/invoice')
      ->click('Invoices')
      ->seePageIs('/invoice');
  }

  public function testInvoiceItemCategoriesLink()
  {
    $this->actingAs($this->user)
      ->visit('/admin/invoice')
      ->click('Invoice Item Categories')
      ->seePageIs('/invoice_item_category');
  }
}
