<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $productId;
    public $productName;
    public $productPrice;

    public function __construct($productId, $productName, $productPrice)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
    }

    public function broadcastOn()
    {
        return [
            "chat-room.1"
        ];
    }
    
}
