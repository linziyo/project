<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthLung;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthLungListener
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
        if (array_key_exists('Lung', $json) && !empty($json->Lung)) {

            $lung = $json->Lung;

            $model = new HealthLung();
            $model->health_id = $event->getHealth()->id;
            $model->Lung = isset($lung->Lung) ? $lung->Lung : null;
            $model->Result = isset($lung->Result) ? $lung->Result : null;
            $model->save();
        }
    }
}
