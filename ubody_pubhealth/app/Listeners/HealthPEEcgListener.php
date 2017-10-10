<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthPEEcg;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthPEEcgListener
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
        if (array_key_exists('PEEcg', $json) && !empty($json->PEEcg)) {

            $peecg = $json->PEEcg;

            $model = new HealthPEEcg();
            $model->health_id = $event->getHealth()->id;
            $model->Hr = isset($peecg->Hr) ? $peecg->Hr : null;
            $model->EcgData =isset($peecg->EcgData) ? $peecg->EcgData : null;
            $model->PAxis = isset($peecg->PAxis) ? $peecg->PAxis : null;
            $model->Result = isset($peecg->Result) ? $peecg->Result : null;
            $model->QRSAxis = isset($peecg->QRSAxis) ? $peecg->QRSAxis : null;
            $model->TAxis = isset($peecg->TAxis) ? $peecg->TAxis : null;
            $model->PR = isset($peecg->PR) ? $peecg->PR : null;
            $model->QRS = isset($peecg->QRS) ? $peecg->QRS : null;
            $model->QT = isset($peecg->QT) ? $peecg->QT : null;
            $model->QTc = isset($peecg->QTc) ? $peecg->QTc : null;
            $model->RV5 = isset($peecg->RV5) ? $peecg->RV5 : null;
            $model->SV1 = isset($peecg->SV1) ? $peecg->SV1 : null;
            $model->EcgImg = isset($peecg->EcgImg) ? $peecg->EcgImg : null;
            $model->save();
        }
    }
}