<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    protected $fillable = [
         'product_id', 'user_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }   
    
    public function cartUser()
    {
        return $this->where('user_id', auth()->user()->id);
    }
    
}
