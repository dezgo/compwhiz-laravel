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
        $this->user = factory(App\User::class)->create();
        $this->user->roles()->attach(1);
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
            ->press('Next')
            ->see('The category field is required');
    }

    public function testCreate_noDescr()
    {
        $category = App\InvoiceItemCategory::orderBy(DB::raw('RAND()'))->take(1)->first();
        // dd($category);
        $this->actingAs($this->user)
            ->visit('/invoice')
            ->click('View')
            ->click('btnCreateItem')
            ->select($category->id,'category_id')
            ->press('Next')
            ->press('Next')
            ->see('The description field is required');
    }

    // public function testCreate_save()
    // {
    //     $category = App\InvoiceItemCategory::orderBy(DB::raw('RAND()'))->take(1)->first();
    //     // dd($category);
    //     $this->actingAs($this->user)
    //         ->visit('/invoice')
    //         ->click('View')
    //         ->click('btnCreateItem')
    //         ->select($category->id,'category_id')
    //         ->press('Next')
    //         ->type('LAN Cable 1m test', 'description')
    //         ->press('Next')
    //         ->type('2', 'quantity')
    //         ->type('5.2', 'price')
    //         ->press('Save')
    //         ->seePageIs('/invoice/'.$this->invoice->id);
    // }

    public function testEdit()
    {
        $invoice = factory(App\Invoice::class)->create();
        factory(App\InvoiceItem::class, 5)->create(['invoice_id' => $invoice->id]);
        $this->actingAs($this->user)
            ->visit('/invoice_item/'.$invoice->invoice_items->first()->id.'/edit')
            ->see('Edit Invoice Item for invoice '.$invoice->invoice_number);
    }

    public function testEdit_invalid()
    {
        $invoice = factory(App\Invoice::class)->create();
        factory(App\InvoiceItem::class, 5)->create(['invoice_id' => $invoice->id]);
        $this->actingAs($this->user)
            ->visit('/invoice_item/'.$invoice->invoice_items->first()->id.'/edit')
            ->type('', 'quantity')
            ->press('Update')
            ->see('quantity field is required');
    }

    public function testEdit_save()
    {
        $invoice = factory(App\Invoice::class)->create();
        factory(App\InvoiceItem::class, 5)->create(['invoice_id' => $invoice->id]);
        $description = App\InvoiceItem::orderBy(DB::raw('RAND()'))->take(1)->first();
        $this->actingAs($this->user)
            ->visit('/invoice_item/'.$invoice->invoice_items->first()->id.'/edit')
            ->type($description->description, 'description')
            ->press('Update')
            ->seePageIs('/invoice/'.$invoice->id);
    }

    public function testDetails()
    {
        $invoice = factory(App\Invoice::class)->create();
        factory(App\InvoiceItem::class, 5)->create(['invoice_id' => $invoice->id]);
        $this->actingAs($this->user)
            ->visit('/invoice_item/'.$invoice->invoice_items->first()->id)
            ->see('Show Invoice Item for invoice '.$invoice->invoice_number)
            ->see('disabled="true"')
            ->press('Edit')
            ->see('Edit Invoice Item for invoice '.$invoice->invoice_number);
    }

    public function testDelete()
    {
        $invoice = factory(App\Invoice::class)->create();
        factory(App\InvoiceItem::class, 5)->create(['invoice_id' => $invoice->id]);
        $this->actingAs($this->user)
            ->visit('/invoice_item/'.$invoice->invoice_items->first()->id.'/delete')
            ->press('Delete')
            ->seePageIs('/invoice/'.$invoice->id);
    }
}
