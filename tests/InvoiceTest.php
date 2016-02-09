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
        $this->invoice = factory(App\Invoice::class)->create();
        factory(App\InvoiceItem::class, 5)->create(['invoice_id' => $this->invoice->id]);

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
        $this->actingAs($this->user)
            ->visit('/invoice/'.$this->invoice->id.'/edit')
            ->see('Edit Invoice');
    }

    public function testEdit_invalid()
    {
        $this->actingAs($this->user)
            ->visit('/invoice/'.$this->invoice->id.'/edit')
            ->type('', 'invoice_number')
            ->press('Update')
            ->see('invoice number field is required');
    }

    public function testEdit_save()
    {
        $this->actingAs($this->user)
            ->visit('/invoice/'.$this->invoice->id.'/edit')
            ->type('01-02-2015', 'invoice_date')
            ->press('Update')
            ->seePageIs('/invoice/'.$this->invoice->id);
    }

    public function testDetails()
    {
        $this->actingAs($this->user)
            ->visit('/invoice/'.$this->invoice->id)
            ->see('Show Invoice')
            ->see('disabled="true"')
            ->press('Edit')
            ->see('Edit Invoice');
    }

    public function testDelete()
    {
        $this->actingAs($this->user)
            ->visit('/invoice/'.$this->invoice->id.'/delete')
            ->press('Delete')
            ->seePageIs('/invoice');
    }

    public function testPrint()
    {
        $this->actingAs($this->user)
            ->visit('/invoice/'.$this->invoice->id)
            ->click('Print')
            ->see('Customer Details')
            ->see('How to Pay')
            ->see('Enquiries');
    }

    public function testPrintPartiallyPaid()
    {
        $this->invoice->paid = $this->invoice->owing/2;
        $this->invoice->save();
        $this->actingAs($this->user)
            ->visit('/invoice/'.$this->invoice->id.'/print')
            ->see(number_format($this->invoice->paid,2));
    }

    public function testPrintReceipt()
    {
        $this->invoice->paid = $this->invoice->owing;
        $this->invoice->save();
        $this->actingAs($this->user)
            ->visit('/invoice/'.$this->invoice->id.'/print')
            ->see(number_format($this->invoice->paid,2))
            ->see('RECEIPT');
    }

    public function testCreateInvoiceWizardValidation()
    {
        $this->actingAs($this->user)
            ->visit('/')
            ->click('Create Invoice')
            ->see('Pick a Customer:')
            ->press('Next')
            ->see('The customer field is required');
    }

    public function testCreateInvoiceWizardExistingCustomer()
    {
        $customer = factory(App\Customer::class)->create();
        $this->actingAs($this->user)
            ->visit('/')
            ->click('Create Invoice')
            ->select($customer->id, 'customer')
            ->press('Next')
            ->seePageIs('/invoice/'.$customer->id.'/create');
    }

    public function testCreateInvoiceWizardNewCustomer()
    {
        $customer = factory(App\Customer::class)->create();
        $this->actingAs($this->user)
            ->visit('/')
            ->click('Create Invoice')
            ->click('Create a new customer')
            ->seePageIs('/customer/create?flag=1')
            ->type('Robert', 'first_name')
            ->type('Wagner', 'last_name')
            ->type('1 Waid Road', 'address1')
            ->type('Knoxton', 'suburb')
            ->select('ACT', 'state')
            ->type('2000', 'postcode')
            ->press('Save')
            ->see('Create Invoice')
            ->see('Robert Wagner');
    }
}
