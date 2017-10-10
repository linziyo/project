<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthAlcohol;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthAlcoholListener
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
        if (array_key_exists('Alcohol', $json) && !empty($json->Alcohol)) {

            $alcohol = $json->Alcohol;

            $model = new HealthAlcohol();
            $model->health_id = $event->getHealth()->id;
            $model->Alcohol = isset($alcohol->Alcohol) ? $alcohol->Alcohol : null;
            $model->Result = isset($alcohol->Result) ? $alcohol->Result : null;
            $model->AlcoholImg = isset($alcohol->AlcoholImg) ? $alcohol->AlcoholImg : null;
            $model->errcode = isset($alcohol->errcode) ? $alcohol->errcode : null;
            $model->errinfo = isset($alcohol->errinfo) ? $alcohol->errinfo : null;
            $model->save();
        }

    }
}