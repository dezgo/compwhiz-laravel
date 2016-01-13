<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceItemTest extends TestCase
{
    use DatabaseTransactions;

    private $invoice;
    private $user;
    private $customer;

    public function setUp()
    {
        // This method will automatically be called prior to any of your test cases
        parent::setUp();

        $this->invoice = factory(App\Invoice::class)->create();
        $this->user = factory(App\User::class)->make();
    }

    public function tearDown()
    {
        // Artisan::call('migrate:refresh');
        // Artisan::call('db:seed');
        parent::tearDown();
    }

    public function testCreate_noCategory()
    {
        $this->actingAs($this->user)
            ->visit('/invoice')
            ->click('View')
            ->see('Show Invoice')
            ->click('Create Item')
            ->see('Step 1 - Select category')
            ->click('Next')
            ->see('The category fireld is required');
    }

    public function testCreate_noDescr()
    {
        $this->actingAs($this->user)
            ->visit('/invoice')
            ->click('View')
            ->click('Create Item')
            ->type('Software','category_id')
            ->click('Next')
            ->click('Next')
            ->see('The description field is required');
    }

    public function testCreate_save()
    {
        $this->actingAs($this->user)
            ->visit('/invoiceitem/'.$this->invoice->id.'/create')
            ->select('1', 'category_id')
            ->type('LAN Cable 1mm', 'description')
            ->type('2', 'quantity')
            ->type('5.2', 'price')
            ->press('Save')
            ->seePageIs('/invoice/'.$this->invoice->id);
    }

    public function testEdit()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoiceitem/'.$invoice_item->id.'/edit')
            ->see('Edit Invoice Item for invoice '.$invoice_item->invoice->invoice_number);
    }

    public function testEdit_invalid()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoiceitem/'.$invoice_item->id.'/edit')
            ->type('', 'quantity')
            ->press('Update')
            ->see('quantity field is required');
    }

    public function testEdit_save()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoiceitem/'.$invoice_item->id.'/edit')
            ->type('A new description\n', 'description')
            ->press('Update')
            ->seePageIs('/invoice/'.$invoice_item->invoice->id);
    }

    public function testDetails()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoiceitem/'.$invoice_item->id)
            ->see('Show Invoice Item for invoice '.$invoice_item->invoice->invoice_number)
            ->see('disabled="true"')
            ->press('Edit')
            ->see('Edit Invoice Item for invoice '.$invoice_item->invoice->invoice_number);
    }

    public function testDelete()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->visit('/invoiceitem/'.$invoice_item->id.'/delete')
            ->press('Delete')
            ->seePageIs('/invoice/'.$invoice_item->invoice->id);
    }
}
