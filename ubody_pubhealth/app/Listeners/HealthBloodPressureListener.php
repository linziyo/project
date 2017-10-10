<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthBloodPressure;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthBloodPressureListener
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
        if (array_key_exists('BloodPressure', $json) && !empty($json->BloodPressure)) {

            $bloodPressure = $json->BloodPressure;

            $model = new HealthBloodPressure();
            $model->health_id = $event->getHealth()->id;
            $model->HighPressure = isset($bloodPressure->HighPressure) ? $bloodPressure->HighPressure : null;
            $model->LowPressure = isset($bloodPressure->LowPressure) ? $bloodPressure->LowPressure : null;
            $model->Pulse = isset($bloodPressure->Pulse) ? $bloodPressure->Pulse : null;
            $model->Result = isset($bloodPressure->Result) ? $bloodPressure->Result : null;
            $model->save();
        }
    }
}
