<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Log;

class UserDeleted implements ShouldBroadcast
{
   use Dispatchable, InteractsWithSockets;

   public $user;
   /**
    * Create a new event instance.
    *
    * @return void
    */
   public function __construct(User $user)
   {
      $this->user = $user;
   }

   /**
    * Get the channels the event should broadcast on.
    *
    * @return \Illuminate\Broadcasting\Channel|array
    */
   public function broadcastOn()
   {
      Log::debug("User deleted {$this->user->name}");
      return new Channel('users');
   }
}
