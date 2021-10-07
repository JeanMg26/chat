<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
   protected $fillable = [
      'name',
      'email',
      'password'
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array
    */
   protected $hidden = [
      'password',
      'remember_token'
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array
    */
   protected $casts = [
      'email_verified_at' => 'datetime'
   ];

   public function chats()
   {
      return $this->belongsToMany(Chat::class);
   }

   public function messages()
   {
      return $this->hasMany(Message::class);
   }

   // protected $dispatchesEvents = [
   //    'created' => UserCreated::class,
   //    'updated' => UserUpdated::class,
   //    'deleted' => UserDeleted::class
   // ];

}
