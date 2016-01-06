<?php

namespace App\Providers;

use App\Invoice;
use App\InvoiceItem;
use App\InvoiceItemCategory;
use App\Customer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('invoiceitem.invoice', function($view)
        {
            $view->with('invoice_list', Invoice::all()->lists('description', 'id'));
        });

        view()->composer('invoiceitem.form', function($view)
        {
            $view->with('invoice_item_categories', InvoiceItemCategory::all()->lists('description', 'id'));
            $view->with('invoice_item_list', InvoiceItem::invoiceItemList());
        });

        view()->composer('invoice.form', function($view)
        {
            $view->with('customer_list', Customer::all()->lists('description', 'id'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
