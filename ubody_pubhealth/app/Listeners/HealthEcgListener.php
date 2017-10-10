<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthEcg;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthEcgListener
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
        if (array_key_exists('Ecg', $json) && !empty($json->Ecg)) {

            $ecg = $json->Ecg;

            $model = new HealthEcg();
            $model->health_id = $event->getHealth()->id;
//            $model->Hr = $ecg->Hr;
//            $model->EcgData = $ecg->EcgData;
//            $model->nGain = $ecg->nGain;
//            $model->Result = $ecg->Result;
//            $model->Analysis = $ecg->Analysis;
            $model->Hr = isset($ecg->Hr) ? $ecg->Hr : null;
            $model->EcgData = isset($ecg->EcgData) ? $ecg->EcgData : null;
            $model->nGain = isset($ecg->nGain) ? $ecg->nGain : null;
            $model->Analysis = isset($ecg->Analysis) ? $ecg->Analysis : null;
            $model->Result = isset($ecg->Result) ? $ecg->Result : null;
            $model->save();
        }
    }
}
