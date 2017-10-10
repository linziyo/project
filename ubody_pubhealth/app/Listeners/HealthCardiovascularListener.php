<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthCardiovascular;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthCardiovascularListener
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
        if (array_key_exists('Cardiovascular', $json) && !empty($json->Cardiovascular)) {

            $cardiovascular = $json->Cardiovascular;

            $model = new HealthCardiovascular();
            $model->health_id = $event->getHealth()->id;
            $model->HeartFunction1 = isset($cardiovascular->HeartFunction1) ? $cardiovascular->HeartFunction1 : null;
            $model->VascularCondition1 = isset($cardiovascular->VascularCondition1) ? $cardiovascular->VascularCondition1 : null;
            $model->HeartFunction2 = isset($cardiovascular->HeartFunction2) ? $cardiovascular->HeartFunction2 : null;
            $model->VascularCondition2 = isset($cardiovascular->VascularCondition2) ? $cardiovascular->VascularCondition2 : null;
            $model->SV = isset($cardiovascular->SV) ? $cardiovascular->SV : null;
            $model->CO = isset($cardiovascular->CO) ? $cardiovascular->CO : null;
            $model->HOV = isset($cardiovascular->HOV) ? $cardiovascular->HOV : null;
            $model->CMBV = isset($cardiovascular->CMBV) ? $cardiovascular->CMBV : null;
            $model->TPR = isset($cardiovascular->TPR) ? $cardiovascular->TPR : null;
            $model->PAWP = isset($cardiovascular->PAWP) ? $cardiovascular->PAWP : null;
            $model->N = isset($cardiovascular->N) ? $cardiovascular->N : null;
            $model->Result = isset($cardiovascular->Result) ? $cardiovascular->Result : null;
            $model->save();
        }
    }
}