<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class reserva
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reserva;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Ensayo $reserva)
    {
        $this->reserva = $reserva;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('reservas');
    }
}
