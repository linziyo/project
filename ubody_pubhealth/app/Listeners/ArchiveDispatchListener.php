<?php

namespace App\Listeners;

use App\Events\ArchiveCreatedEvent;
use App\Models\Tenant;
use Sonka\Dispatcher\Facades\Dispatcher;

class ArchiveDispatchListener
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
     * @param  ArchiveCreatedEvent $event
     * @return void
     */
    public function handle(ArchiveCreatedEvent $event)
    {
        $archive = $event->getArchive();

            \Dispatcher::dispatch($archive);
    }
}
