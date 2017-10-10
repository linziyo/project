<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthBloodSugar;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthBloodSugarListener
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
        if (array_key_exists('BloodSugar', $json) && !empty($json->BloodSugar)) {

            $bloodSugar = $json->BloodSugar;

            $model = new HealthBloodSugar();
            $model->health_id = $event->getHealth()->id;
            $model->BloodSugar = isset($bloodSugar->BloodSugar) ? $bloodSugar->BloodSugar : null;
            $model->BloodsugarType = isset($bloodSugar->BloodsugarType) ? $bloodSugar->BloodsugarType : null;
            $model->Result = isset($bloodSugar->Result) ? $bloodSugar->Result : null;
            $model->save();
        }
    }
}
