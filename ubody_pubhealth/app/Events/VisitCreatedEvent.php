<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Visit;

class VisitCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $visit;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Visit $visit)
    {
        //
        $this->visit = $visit;
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

    public function getVisit()
    {
        return $this->visit;
    }
}
