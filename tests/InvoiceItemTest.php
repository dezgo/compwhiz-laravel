<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceItemTest extends TestCase
{
    use DatabaseTransactions;

    private $invoice;
    private $user;

    public function setUp()
    {
        // This method will automatically be called prior to any of your test cases
        parent::setUp();

        $this->invoice = factory(App\Invoice::class)->create();
        $this->user = factory(App\User::class)->create();
    }

    public function testShowIndex()
    {
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem')
            ->see('Show Invoice Items for invoice '.$this->invoice->invoice_number)
            ->see('button onclick="location.href=\'http://cw.app/invoiceitem/create');
    }

    public function testCreate()
    {
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem/create')
            ->see('Create Invoice Item for invoice '.$this->invoice->invoice_number);
    }

    public function testCreate_invalid()
    {
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem/create')
            ->press('Save')
            ->see('The price field is required')
            ->see('The description field is required')
            ->see('The category field is required');
    }

    public function testCreate_save()
    {
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem/create')
            ->type('Cable', 'category')
            ->type('1m LAN', 'description')
            ->type('2', 'quantity')
            ->type('5.2', 'price')
            ->press('Save')
            ->seePageIs('/InvoiceItem');
    }

    public function testEdit()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem/'.$invoice_item->id.'/edit')
            ->see('Edit Invoice Item for invoice '.$this->invoice->invoice_number);
    }

    public function testEdit_invalid()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem/'.$invoice_item->id.'/edit')
            ->type('', 'description')
            ->press('Update')
            ->see('description field is required');
    }

    public function testEdit_save()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem/'.$invoice_item->id.'/edit')
            ->type('A new description', 'description')
            ->press('Update')
            ->seePageIs('/InvoiceItem');
    }

    public function testDetails()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem/'.$invoice_item->id)
            ->see('Show Invoice Item for invoice '.$this->invoice->invoice_number)
            ->see('disabled="true"')
            ->press('Edit')
            ->see('Edit Invoice Item for invoice '.$this->invoice->invoice_number);
    }

    public function testDelete()
    {
        $invoice_item = factory(App\InvoiceItem::class)->create();
        $this->actingAs($this->user)
            ->withSession('invoice_id', $this->invoice->id)
            ->visit('/InvoiceItem/'.$invoice_item->id.'/delete')
            ->press('Delete')
            ->seePageIs('/InvoiceItem');
    }
}