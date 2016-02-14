<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAdminTest extends TestCase
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

	public function testShowIndex()
	{
		$this->actingAs($this->user)
			->visit('/user')
			->see('Show Users')
            ->click($this->user->name)
            ->see('Edit User')
            ->see($this->user->email);
    }
}
