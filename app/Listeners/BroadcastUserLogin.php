<?php

namespace App\Listeners;

use App\Events\UserSessionChanged;
use App\Models\User;

class BroadcastUserLogin
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
   public function handle($event)
   {
      // $authUser = $event->user->name;
      broadcast(new UserSessionChanged($event->user, 'success'));

   }
}
