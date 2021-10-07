<?php

namespace App\Http\Controllers;

use App\Models\User;

class OnlineController extends Controller
{
   public function index()
   {
      $users = User::all();

      return view('users.index', compact('users'));
   }
}
