<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['middleware' => ['cors']], function () {

   Route::get('/', function () {
      return view('welcome');
   });

   Route::get('/dashboard', function () {
      return view('dashboard');
   })->middleware(['auth'])->name('dashboard');

   require __DIR__ . '/auth.php';

   Route::get('auth/user', function () {
      if (auth()->check()) {
         return response()->json(['authUser' => auth()->user()]);
      }
      return null;
   });

   Route::get('chat/{chat}', [ChatController::class, 'show'])->name('chat.show');
   Route::get('chat/with/{user}', [ChatController::class, 'chat_with']);
   Route::get('chat/{chat}/get_users', [ChatController::class, 'get_users'])->name('chat.get_users');
   Route::get('chat/{chat}/get_messages', [ChatController::class, 'get_messages'])->name('chat.get_messages');
   Route::post('message/sent', [MessageController::class, 'sent'])->name('message.sent');

   Route::view('users', 'users.showAll')->name('users.all');

});
