<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
   
     protected $fillable = [
      'store_name', 'slug', 'details','user_id'  
    ];

}
