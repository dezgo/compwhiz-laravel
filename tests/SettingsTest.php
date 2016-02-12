<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SettingsTest extends TestCase
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

    /**
     * See settings and change them - check validation
     *
     * @return void
     */
    public function testUpdateSettings_validate()
    {
        $this->actingAs($this->user)
             ->visit('/settings')
             ->type('a', 'next_invoice_number')
             ->press('Update')
             ->see('The next invoice number must be a number');
    }

    /**
     * See settings and change them - check validation
     *
     * @return void
     */
    public function testUpdateSettings()
    {
        $this->actingAs($this->user)
             ->visit('/settings')
             ->type('34', 'next_invoice_number')
             ->press('Update')
             ->see('Settings updated');
    }
}
