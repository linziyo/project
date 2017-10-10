<?php
/**
 * Created by PhpStorm.
 * User: Juven
 * Date: 2017/8/10
 * Time: 11:00
 */

namespace App\Listeners;


use App\Events\HealthCreatedEvent;

class HealthDispatcherListener
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
        \Dispatcher::dispatch($event->getHealth());
    }
}