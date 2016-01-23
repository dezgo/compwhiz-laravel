<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceTest extends TestCase
{
    use DatabaseTransactions;

    private $invoice;
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
            ->visit('/invoice')
            ->see('Show Invoices');
    }

    public function testCreate()
    {
        $this->actingAs($this->user)
            ->visit('/invoice')
            ->click('Create')
            ->see('Create Invoice');
    }

    public function testCreate_invalid()
    {
        $this->actingAs($this->user)
            ->visit('/invoice/create')
            ->type('','invoice_number')
            ->press('Save')
            ->see('The invoice number field is required');
    }

    public function testCreate_save()
    {
        $customer = factory(App\Customer::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoice/create')
            ->select($customer->id, 'customer_id')
            ->press('Save')
            ->see('Show Invoice')
            ->see('Create Item');
    }

    public function testEdit()
    {
        $invoice = factory(App\Invoice::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoice/'.$invoice->id.'/edit')
            ->see('Edit Invoice');
    }

    public function testEdit_invalid()
    {
        $invoice = factory(App\Invoice::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoice/'.$invoice->id.'/edit')
            ->type('', 'invoice_number')
            ->press('Update')
            ->see('invoice number field is required');
    }

    public function testEdit_save()
    {
        $invoice = factory(App\Invoice::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoice/'.$invoice->id.'/edit')
            ->type('01-02-2015', 'invoice_date')
            ->press('Update')
            ->seePageIs('/invoice/'.$invoice->id);
    }

    public function testDetails()
    {
        $invoice = factory(App\Invoice::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoice/'.$invoice->id)
            ->see('Show Invoice')
            ->see('disabled="true"')
            ->press('Edit')
            ->see('Edit Invoice');
    }

    public function testDelete()
    {
        $invoice = factory(App\Invoice::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoice/'.$invoice->id.'/delete')
            ->press('Delete')
            ->seePageIs('/invoice');
    }

    public function testPrint()
    {

    }
}
