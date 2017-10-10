<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthBloodFat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthBloodFatListener
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
        if (array_key_exists('BloodFat', $json) && !empty($json->BloodFat)) {

            $bloodFat = $json->BloodFat;

            $model = new HealthBloodFat();
            $model->health_id = $event->getHealth()->id;
            $model->TChol = isset($bloodFat->TChol) ? $bloodFat->TChol : null;
            $model->HdlChol = isset($bloodFat->HdlChol) ? $bloodFat->HdlChol : null;
            $model->Trig = isset($bloodFat->Trig) ? $bloodFat->Trig : null;
            $model->TcHdl = isset($bloodFat->TcHdl) ? $bloodFat->TcHdl : null;
            $model->CalcLdl = isset($bloodFat->CalcLdl) ? $bloodFat->CalcLdl : null;
            $model->Result = isset($bloodFat->Result) ? $bloodFat->Result : null;
            $model->save();
        }
    }
}
