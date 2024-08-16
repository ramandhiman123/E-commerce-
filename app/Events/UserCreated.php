<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
class UserCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return , \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        // return ['my-channel'];
        return new Channel('my-channel');
    }

    // public function broadcastAs()
    // {
    //     return 'form-submitted';
    // }

    public function broadcastWith()
    {
        return [
            'user' => $this->user
        ];
    }
}
