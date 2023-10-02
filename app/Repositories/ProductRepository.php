<?php

namespace App\Repositories;

use App\Models\ {
    Product,
    Cart
};
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $modelProduct;
    protected $modelCart;


    /**
     * Create a new ProductRepository instance.
     *
     * @param  \App\Models\Product $product
     */
    public function __construct(Product $product, Cart $cart)
    {
        $this->modelProduct = $product;
        $this->modelCart = $cart;
    }

    /**
     * Create a query for Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request)
    {
        $query = $this->modelProduct;

        if(isset($request->search) && $request->search) 
           $query = $query->where('name', 'like', '%' . $request->search . '%');  
        
        $query = $query->orderBy('price', 'asc');

        return $query->get();     
    }

    /**
     * Store item to cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function funcStoreCart($request)
    {
       $this->modelCart->product_id = $request->product_id;
       $this->modelCart->user_id = \Auth::user()->id;
       $this->modelCart->save(); 
    } 

    /**
     * Show items from cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function funcSelectCart()
    {
       return $this->modelCart
          ->cartUser()
          ->with('product')
          ->get();
    }        

}
