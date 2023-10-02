<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public function carts()
    {
        return $this->hasMany(Cart::class); //id(Product) -> product_id(Cart)
    } 
    
    public function productsCartUser()
    {
        return $this->carts()
                    ->where('user_id', auth()->user()->id);
    }      
    
}
