<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
	use DatabaseTransactions;

	public function testShowIndex()
	{
		$user = factory(App\User::class)->create();
		$this->actingAs($user)
			->visit('/customer')
			->see('Show Customers')
			->see('/create\'" class="btn btn-success">');
	}

	public function testCreate()
	{
		$user = factory(App\User::class)->create();
		$this->actingAs($user)
			->visit('/customer/create')
			->see('Create Customer');
	}

	public function testCreate_invalid()
	{
		$user = factory(App\User::class)->create();
		$this->actingAs($user)
			->visit('/customer/create')
			->press('Save')
			->see('first name field is required');
	}

	public function testCreate_save()
	{
		$user = factory(App\User::class)->create();
		$this->actingAs($user)
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
		$user = factory(App\User::class)->create();
		$customer = factory(App\Customer::class)->create();
		$this->actingAs($user)
			->visit('/customer/1/edit')
			->see('Edit Customer');
	}

	public function testEdit_invalid()
	{
		$user = factory(App\User::class)->create();
		$this->actingAs($user)
			->visit('/customer/1/edit')
			->type('', 'description')
			->press('Update')
			->see('description field is required');
	}

	public function testEdit_save()
	{
		$user = factory(App\User::class)->create();
		$this->actingAs($user)
			->visit('/customer/1/edit')
			->type('A new one', 'description')
			->press('Update')
			->seePageIs('/customer');
	}

	public function testDetails()
	{
		$user = factory(App\User::class)->create();
		$this->actingAs($user)
			->visit('/customer/1')
			->see('Show Customer')
			->see('disabled="true"')
			->press('Edit')
			->seePageIs('/customer/1/edit');
	}

	public function testDelete()
	{
		$user = factory(App\User::class)->create();
		$this->actingAs($user)
			->visit('/customer/1/delete')
			->press('Delete')
			->seePageIs('/customer');
	}
}
