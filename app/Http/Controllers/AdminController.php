<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
   Models\User,
   Models\Product,
   Http\Requests\ProductRequest
};
use App\Events\ProductEvent;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show dashboard-users-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardUsers(Request $request)
    {
        $users = User::get();

        return view('admin.users', ['users' => $users]);
    }

    /**
     * Show dashboard-products-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardProducts(Request $request)
    {
        $products = Product::get();

        return view('admin.products', ['products' => $products]);
    }   
    
     /**
     * Edit-view for selected product.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */      
    public function edit(Product $product)
    {
       return view('admin.product', compact('product'));
    } 

    /**
     * Update selected product in storage.
     *
     * @param  \App\Http\Requests\CartRequest $request
     * @return \Illuminate\Http\Response
     */      
    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        event(new ProductEvent($product->id, $product->name, $product->price));

        return redirect(route('dashboard-products'));
    }

}
