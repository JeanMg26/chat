<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserSessionChanged implements ShouldBroadcast
{
   use Dispatchable, InteractsWithSockets, SerializesModels;

   public $user;
   public $type;

   /**
    * Create a new event instance.
    *
    * @return void
    */
   public function __construct($user, $type)
   {
      $this->user = $user;
      $this->type = $type;
   }

   /**
    * Get the channels the event should broadcast on.
    *
    * @return \Illuminate\Broadcasting\Channel|array
    */
   public function broadcastOn()
   {
      Log::debug($this->user->name);
      Log::debug($this->type);
      return new PrivateChannel('notifications');
   }
}
