<?php

namespace App\Providers;

use App\Events\VisitCreatedEvent;
use App\Models\Visit;
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
        //
        \Validator::extend('mobile', function ($attribute, $value, $parameters, $validator) {
            return empty($value) ? null : preg_match('/^1[34578]\d{9}$/', $value);
        });

        \Validator::extend('id_card_number', function ($attribute, $value, $parameters, $validator) {
            return empty($value) ? null : preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $value);
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
