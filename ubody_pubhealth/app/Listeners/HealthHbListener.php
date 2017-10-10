<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthHb;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthHbListener
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
        if (array_key_exists('Hb', $json) && !empty($json->Hb)) {

            $hb = $json->Hb;

            $model = new HealthHb();
            $model->health_id = $event->getHealth()->id;
            $model->Hb = isset($hb->Hb) ? $hb->Hb : null;
            $model->Hct = isset($hb->Hct) ? $hb->Hct : null;
            $model->Result = isset($hb->Result) ? $hb->Result : null;
            $model->save();
        }
    }
}
