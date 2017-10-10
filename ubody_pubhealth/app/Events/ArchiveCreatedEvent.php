<?php

namespace App\Events;

use App\Models\Archive;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ArchiveCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $archive;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Archive $archive)
    {
        $this->archive = $archive;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function getArchive()
    {
        return $this->archive;
    }
}
