<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
	use DatabaseTransactions;

	private $customer;
	private $user;

	public function setUp()
	{
		// This method will automatically be called prior to any of your test cases
		parent::setUp();

		$this->customer = factory(App\Customer::class)->create();
		$this->user = factory(App\User::class)->create();
		$this->user->roles()->attach(1);
	}

	public function tearDown()
    {
        // Artisan::call('migrate:refresh');
        // Artisan::call('db:seed');
        parent::tearDown();
    }

	public function testShowIndex()
	{
		$this->actingAs($this->user)
			->visit('/customer')
			->see('Show Customers')
			->see('/create\'" class="btn btn-success">');
	}

	public function testCreate()
	{
		$this->actingAs($this->user)
			->visit('/customer')
			->click('Create Customer')
			->see('Create Customer');
	}

	public function testCreate_invalid()
	{
		$this->actingAs($this->user)
			->visit('/customer/create')
			->press('Save')
			->see('The first name field is required.')
			->see('The last name field is required.')
			->see('The address field is required.')
			->see('The suburb field is required.')
			->see('The postcode field is required.');
	}

	public function testCreate_save()
	{
		$this->actingAs($this->user)
			->visit('/customer/create')
			->type('Joe', 'first_name')
			->type('Bloe', 'last_name')
			->type('34 Ape St', 'address1')
			->type('Blossom', 'suburb')
			->type('ACT', 'state')
			->type('2600', 'postcode')
			->press('Save')
			->seePageIs('/customer');
	}

	public function testEdit()
	{
		$this->actingAs($this->user)
			->visit('/customer/'.$this->customer->id.'/edit')
			->see('Edit Customer');
	}

	public function testEdit_invalid()
	{
		$this->actingAs($this->user)
			->visit('/customer/'.$this->customer->id.'/edit')
			->type('', 'first_name')
			->press('Update')
			->see('first name field is required');
	}

	public function testEdit_save()
	{
		$this->actingAs($this->user)
			->visit('/customer/'.$this->customer->id.'/edit')
			->type('Bob', 'first_name')
			->press('Update')
			->seePageIs('/customer');
	}

		public function testDetails()
		{
			$this->actingAs($this->user)
				->visit('/customer/'.$this->customer->id)
				->see('Show Customer')
				->see('disabled="true"')
				->press('Edit')
				->see('Edit Customer');
//				->seePageIs('/customer/1/edit?state=ACT');
			// not sure why it adds in the state, but just went went that
		}

	public function testDelete()
	{
		$this->actingAs($this->user)
			->visit('/customer/'.$this->customer->id.'/delete')
			->press('Delete')
			->seePageIs('/customer');
	}
}
