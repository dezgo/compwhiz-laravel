<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleUserTest extends TestCase
{
    use DatabaseTransactions;

	private $userSuperAdmin;
    private $userAdmin;
    private $userCustomer;

    /**
     * Create class variables to be used in all tests
     */
	public function setUp()
	{
		parent::setUp();

		$this->userSuperAdmin = factory(App\User::class)->create();
		$this->userSuperAdmin->roles()->attach(1);
        $this->userAdmin = factory(App\User::class)->create();
		$this->userAdmin->roles()->attach(2);
        $this->userCustomer = factory(App\User::class)->create();
		$this->userCustomer->roles()->attach(3);
        $this->user = factory(App\User::class)->create();
	}

    /**
     * Ensure super admin has appropriate access
     *
     * @return void
     */
    public function testSuperAdmin()
    {
        $this->actingAs($this->userSuperAdmin)
             ->visit('/')
             ->see('Invoicing')
             ->see('Customers')
             ->see('Invoices')
             ->see('Invoice Item Categories')
             ->see('Create Invoice');
    }

    /**
     * Ensure admin has appropriate access
     *
     * @return void
     */
    public function testAdmin()
    {
        $this->actingAs($this->userAdmin)
             ->visit('/')
             ->see('Invoicing')
             ->see('Customers')
             ->see('Invoices')
             ->see('Invoice Item Categories')
             ->see('Create Invoice');
    }

    /**
     * Ensure customer has appropriate access
     *
     * @return void
     */
    public function testCustomer()
    {
        $this->actingAs($this->userCustomer)
             ->visit('/')
             ->dontSee('Invoicing');
    }

    /**
     * Ensure user has appropriate access
     *
     * @return void
     */
    public function testUser()
    {
        $this->actingAs($this->user)
             ->visit('/')
             ->dontSee('Invoicing');
    }
}
