<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthChol;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthCholListener
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
        if (array_key_exists('Chol', $json) && !empty($json->Chol)) {

            $chol = $json->Chol;

            $model = new HealthChol();
            $model->health_id = $event->getHealth()->id;
            $model->Chol = isset($chol->Chol) ? $chol->Chol : null;
            $model->Result = isset($chol->Result) ? $chol->Result : null;

            $model->save();
        }
    }
}
