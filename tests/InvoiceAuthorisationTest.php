<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvoiceAuthorisationTest extends TestCase
{
    use DatabaseTransactions;

    private $invoice1;
    private $invoice2;
    private $user1;
    private $user2;

    // create two users
    // create an invoice for each user
    // ensure each user can only see their invoice
    public function setUp()
    {
        parent::setUp();

        $this->user1 = factory(App\User::class)->create();
        $this->user2 = factory(App\User::class)->create();

        $this->invoice1 = factory(App\Invoice::class)->create();
        factory(App\InvoiceItem::class, 5)->create(['invoice_id' => $this->invoice1->id]);

        $this->invoice2 = factory(App\Invoice::class)->create();
        factory(App\InvoiceItem::class, 5)->create(['invoice_id' => $this->invoice2->id]);

    }
}
