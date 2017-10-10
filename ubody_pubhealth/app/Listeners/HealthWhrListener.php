<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthWhr;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthWhrListener
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
        if (array_key_exists('Whr', $json) && !empty($json->Whr)) {

            $whr = $json->Whr;

            $model = new HealthWhr();
            $model->health_id = $event->getHealth()->id;
//            $model->Waistline = $whr->Waistline;
//            $model->Hipline = $whr->Hipline;
//            $model->Whr = $whr->Whr;
//            $model->Result = $whr->Result;
            $model->Waistline = isset($whr->Waistline) ? $whr->Waistline : null;
            $model->Hipline = isset($whr->Hipline) ? $whr->Hipline : null;
            $model->Whr = isset($whr->Whr) ? $whr->Whr : null;
            $model->Result = isset($whr->Result) ? $whr->Result : null;
            $model->save();
        }
    }
}
