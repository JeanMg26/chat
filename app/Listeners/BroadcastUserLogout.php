<?php

namespace App\Listeners;

use App\Events\UserSessionChanged;
use Illuminate\Auth\Events\Logout;

class BroadcastUserLogout
{
   /**
    * Create the event listener.
    *
    * @return void
    */
   public function __construct()
   {
      //
   }

   /**
    * Handle the event.
    *
    * @param  object  $event
    * @return void
    */
   public function handle(Logout $event)
   {
      // $user = auth()->user();
      broadcast(new UserSessionChanged($event->user->id, 'danger'));

   }
}
