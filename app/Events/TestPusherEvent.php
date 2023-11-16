<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestPusherEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public $channel;

    public function __construct($message)
    {
        $this->channel = 'Test-channel';
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel($this->channel);
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'Test-event';
    }

    // public function broadcastOn()
    // {
    //     //return ['my-channel'];

    //     return ['Test-channel'];
    // }

    // public function broadcastAs()
    // {
    //     //return 'my-event';

    //     return 'Test-event';
    // }
}
