<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('allowed_email_domain', function ($attribute, $value, $parameters, $validator) {
            $allowed_domains = ['gmail.com', 'yahoo.com', 'hotmail.com'];
            $domain = explode('@', $value)[1];

            return in_array($domain, $allowed_domains);
        });
    }
}
