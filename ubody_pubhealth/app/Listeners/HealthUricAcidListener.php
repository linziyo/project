<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthUricAcid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthUricAcidListener
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
        if (array_key_exists('Ua', $json) && !empty($json->Ua)) {

            $uricAcid = $json->Ua;

            $model = new HealthUricAcid();
            $model->health_id = $event->getHealth()->id;
//            $model->Ua = $uricAcid->Ua;
//            $model->Result = $uricAcid->Result;
            $model->Ua = isset($uricAcid->Ua) ? $uricAcid->Ua : null;
            $model->Result = isset($uricAcid->Result) ? $uricAcid->Result : null;
            $model->save();
        }
    }
}
