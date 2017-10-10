<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthHeight;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthHeightListener
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
        if (array_key_exists('Height', $json) && !empty($json->Height)) {

            $height = $json->Height;

            $model = new HealthHeight();
            $model->health_id = $event->getHealth()->id;
//            $model->Height = $height->Height;
//            $model->Weight = $height->Weight;
//            $model->BMI = $height->BMI;
//            $model->IdealWeight = $height->IdealWeight;
//            $model->Result = $height->Result;
            $model->Height = isset($height->Height) ? $height->Height : null;
            $model->Weight = isset($height->Weight) ? $height->Weight : null;
            $model->BMI = isset($height->BMI) ? $height->BMI : null;
            $model->IdealWeight = isset($height->IdealWeight) ? $height->IdealWeight : null;
            $model->Result = isset($height->Result) ? $height->Result : null;
            $model->save();
        }
    }
}
