<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ArchiveCreatedEvent' => [
            'App\Listeners\ArchiveDispatchListener'
        ],
        'App\Events\EventCreatedEvent' => [
            'App\Listeners\EventDispatchListener'
        ],
        'App\Events\VisitCreatedEvent' => [
            'App\Listeners\VisitDispatchListener'
        ],
        'App\Events\HealthCreatedEvent' => [
            'App\Listeners\HealthMemberListener',
            'App\Listeners\HealthHeightListener',
            'App\Listeners\HealthFatListener',
            'App\Listeners\HealthMinFatListener',
            'App\Listeners\HealthBloodPressureListener',
            'App\Listeners\HealthBloodOxygenListener',
            'App\Listeners\HealthEcgListener',
            'App\Listeners\HealthPEEcgListener',
            'App\Listeners\HealthRemoteEcgListener',
            'App\Listeners\HealthTemperatureListener',
            'App\Listeners\HealthWhrListener',
            'App\Listeners\HealthBloodSugarListener',
            'App\Listeners\HealthUricAcidListener',
            'App\Listeners\HealthCholListener',
            'App\Listeners\HealthBloodFatListener',
            'App\Listeners\HealthCardiovascularListener',
            'App\Listeners\HealthBMDListener',
            'App\Listeners\HealthAlcoholListener',
            'App\Listeners\HealthLungListener',
            'App\Listeners\HealthHbListener',
            'App\Listeners\HealthUrinalysisListener',
            'App\Listeners\HealthDispatcherListener'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
