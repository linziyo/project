<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthUrinalysis;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthUrinalysisListener
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
        if (array_key_exists('Urinalysis', $json) && !empty($json->Urinalysis)) {

            $urinalysis = $json->Urinalysis;

            $model = new HealthUrinalysis();
            $model->health_id = $event->getHealth()->id;
            $model->URO = isset($urinalysis->URO) ? $urinalysis->URO : null;
            $model->BLD = isset($urinalysis->BLD) ? $urinalysis->BLD : null;
            $model->BIL = isset($urinalysis->BIL) ? $urinalysis->BIL : null;
            $model->KET = isset($urinalysis->KET) ? $urinalysis->KET : null;
            $model->LEU = isset($urinalysis->LEU) ? $urinalysis->LEU : null;
            $model->GLU = isset($urinalysis->GLU) ? $urinalysis->GLU : null;
            $model->PRO = isset($urinalysis->PRO) ? $urinalysis->PRO : null;
            $model->PH = isset($urinalysis->PH) ? $urinalysis->PH : null;
            $model->NIT = isset($urinalysis->NIT) ? $urinalysis->NIT : null;
            $model->SG = isset($urinalysis->SG) ? $urinalysis->SG : null;
            $model->VC = isset($urinalysis->VC) ? $urinalysis->VC : null;
            $model->MAL = isset($urinalysis->MAL) ? $urinalysis->MAL : null;
            $model->CR = isset($urinalysis->CR) ? $urinalysis->CR : null;
            $model->UCA = isset($urinalysis->UCA) ? $urinalysis->UCA : null;
            $model->Result = isset($urinalysis->Result) ? $urinalysis->Result : null;
            $model->save();
        }
    }
}