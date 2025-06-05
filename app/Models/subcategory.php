<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    
     protected $fillable = [
      'subcategory_name',
      'category_id'
       
    ];
    
    public function categories() {
    return $this->belongsTo(Category::class, 'category_id');
}
}
