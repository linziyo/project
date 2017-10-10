<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthBMD;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthBMDListener
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
        if (array_key_exists('BMD', $json) && !empty($json->BMD)) {

            $bmd = $json->BloodSugar;

            $model = new HealthBMD();
            $model->health_id = $event->getHealth()->id;
            $model->TSCORE = isset($bmd->TSCORE) ? $bmd->TSCORE : null;
            $model->ZSCORE = isset($bmd->ZSCORE) ? $bmd->ZSCORE : null;
            $model->OI = isset($bmd->OI) ? $bmd->OI : null;
            $model->BQI = isset($bmd->BQI) ? $bmd->BQI : null;
            $model->SOS = isset($bmd->SOS) ? $bmd->SOS : null;
            $model->YOUNG_ADULT = isset($bmd->YOUNG_ADULT) ? $bmd->YOUNG_ADULT : null;
            $model->AGE_MATCHED = isset($bmd->AGE_MATCHED) ? $bmd->AGE_MATCHED : null;
            $model->BUA = isset($bmd->BUA) ? $bmd->BUA : null;
            $model->EOA = isset($bmd->EOA) ? $bmd->EOA : null;
            $model->RRF = isset($bmd->RRF) ? $bmd->RRF : null;
            $model->PAB = isset($bmd->PAB) ? $bmd->PAB : null;
            $model->Result = isset($bmd->Result) ? $bmd->Result : null;
            $model->GraphBmp = isset($bmd->GraphBmp) ? $bmd->GraphBmp : null;
            $model->save();
        }
    }
}