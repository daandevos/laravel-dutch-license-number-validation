<?php

namespace DeVos\Laravel\Validation\LicenseNumber;

use Illuminate\Support\Facades\Validator;
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
        Validator::extendImplicit(
            'dutch_license_number',
            new Rules\DutchLicenseNumber,
            'The :attribute format is invalid.'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}