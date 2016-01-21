<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->before(function ($user, $ability) {
            if ($user->hasRole('super_admin')) {
                return true;
            }
        });

        $gate->define('create-invoice', function ($user) {
            return ($user->hasRole('admin'));
        });

        $gate->define('view-invoice', function ($user, $invoice) {
            if ($user->hasRole('admin'))
            {
                return true;
            }

            if ($user->hasRole('customer'))
            {
                return $user->hasCustomer($invoice->customer);
            }
        });
    }
}
