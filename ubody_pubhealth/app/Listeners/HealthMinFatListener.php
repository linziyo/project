<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthMinFat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthMinFatListener
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
//        $json = json_decode($event->getHealth()->content);
//        if (array_key_exists('MinFat', $json) && !empty($json->MinFat)) {
//
//            $minFat = $json->MinFat;
//
//            $model = new HealthMinFat();
//            $model->health_id = $event->getHealth()->id;
//            $model->Height = isset($minFat->Height) ? $minFat->Height : null;
//            $model->Weight = isset($minFat->Weight) ? $minFat->Weight : null;
//            $model->FatRat = isset($minFat->FatRat) ? $minFat->FatRat : null;
//            $model->BasicMetabolism = isset($minFat->BasicMetabolism) ? $minFat->BasicMetabolism : null;
//            $model->Bmi = isset($minFat->Bmi) ? $minFat->Bmi : null;
//            $model->Physique = isset($minFat->Physique) ? $minFat->Physique : null;
//            $model->Shape = isset($minFat->Shape) ? $minFat->Shape : null;
//            $model->Result = isset($minFat->Result) ? $minFat->Result : null;
//            $model->save();
//        }
    }
}