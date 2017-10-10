<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthTemperature;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthTemperatureListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  HealthCreatedEvent  $event
     * @return void
     */
    public function handle(HealthCreatedEvent $event)
    {
        $json = json_decode($event->getHealth()->content);
        if (array_key_exists('Temperature', $json) && !empty($json->Temperature)) {

            $temperature = $json->Temperature;

            $model = new HealthTemperature();
            $model->health_id = $event->getHealth()->id;
//            $model->Temperature = $temperature->Temperature;
//            $model->Result = $temperature->Result;
            $model->Temperature = isset($temperature->Temperature) ? $temperature->Temperature : null;
            $model->Result = isset($temperature->Result) ? $temperature->Result : null;
            $model->save();
        }
    }
}
