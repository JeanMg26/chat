<?php

namespace App\Listeners;

use App\Events\UserSessionChanged;
use Illuminate\Auth\Events\Login;

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
   public function handle(Login $event)
   {
      // $authUser = $event->user->name;
      broadcast(new UserSessionChanged($event->user->name, 'success'));

   }
}
