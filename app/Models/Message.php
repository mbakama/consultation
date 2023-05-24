<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

   /**
    * Summary of users
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
   public function users()
   {
       return $this->belongsToMany(User::class);
   } 
   
}
