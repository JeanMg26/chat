<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   use HasFactory;

   protected $fillable = ['content', 'chat_id', 'user_id'];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function chat()
   {
      return $this->belongsTo(Chat::class);
   }

}
