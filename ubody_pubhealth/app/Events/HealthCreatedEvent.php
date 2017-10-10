<?php

namespace App\Events;

use App\Models\Health;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class HealthCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $health;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Health $health)
    {
        $this->health = $health;
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

    public function getHealth()
    {
        return $this->health;
    }
}
