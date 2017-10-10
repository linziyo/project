<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthBloodOxygen;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthBloodOxygenListener
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
     * @param  HealthCreatedEvent $event
     * @return void
     */
    public function handle(HealthCreatedEvent $event)
    {
        $json = json_decode($event->getHealth()->content);
        if (array_key_exists('Bo', $json) && !empty($json->Bo)) {

            $bloodOxygen = $json->Bo;

            $model = new HealthBloodOxygen();
            $model->health_id = $event->getHealth()->id;
            $model->Oxygen = $bloodOxygen->Oxygen;
            $model->Bpm = $bloodOxygen->Bpm;
            $model->OxygenList = $bloodOxygen->OxygenList;
            $model->BpmList = $bloodOxygen->BpmList;
            $model->Result = $bloodOxygen->Result;
            if ($bloodOxygen->StartTime) {
                $model->StartTime = $bloodOxygen->StartTime;
            }
            if ($bloodOxygen->EndTime) {
                $model->EndTime = $bloodOxygen->EndTime;
            }
            $model->SecondCount = $bloodOxygen->SecondCount;
            $model->save();
        }
    }
}