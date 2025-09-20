<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductAddedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    // $productプロパティを定義する
    

    /**
     * Create a new event instance.
     */
    
    // 補足として今までJavaで明示的に型を書いていたのでわかりにくい部分だが
    // 動的型言語なのでそのままthisで代入はできている。
    public function __construct(Product $product) {
        // インスタンス化時に渡されたProductインスタンスを自身の$productプロパティに代入する
        $this->product = $product;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
