<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAccessTest extends TestCase
{
    use DatabaseTransactions;

	private $customer;
	private $user;

    // This method will automatically be called prior to any of the test cases
	public function setUp()
	{
        parent::setUp();

        if (!defined('SUPERADMIN')) { define('SUPERADMIN', 1); }
        if (!defined('ADMIN')) { define('ADMIN', 2); }
        if (!defined('CUSTOMER')) { define('CUSTOMER', 3); }

		$this->customer = factory(App\Customer::class)->create();
		$this->user = factory(App\User::class)->create();
		$this->user->roles()->attach(CUSTOMER);
	}

    public function testNoAccess()
    {
        $this->actingAs($this->user)
			->visit('/customer')
			->see('Show Customers')
			->dontSee($this->customer->description);
    }

    public function testHasAccess()
    {
        $this->customer->email = $this->user->email;

        $this->actingAs($this->user)
			->visit('/customer')
			->see('Show Customers')
			->see($this->customer->description);
    }
}
