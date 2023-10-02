<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
   Repositories\ProductRepository,
   Models\Product,
   Models\Cart,
   Models\User
};
use App\Http\Requests\CartRequest;
use App\Services\Mail;


class ProductController extends Controller
{
    /**
     * The ProductRepository instance.
     *
     * @var \App\Repositories\ProductRepository
     */
    protected $repository; //1 variant

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $repository)
    {
        //$this->middleware('auth');

        $this->repository = $repository;
    }

    /**
     * Show index-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = $this->repository->funcSelect($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.brick-standard", ['products' => $products])->render(),
            ]);
        } 

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show product-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product(Request $request) 
    {
        $product = Product::find($request->id);

        if ($product == null || $product->productsCartUser()->count()) {
           return view('404');
        } else {
           return view('product.product', ['product' => $product]);
        }
    }

    /**
     * Show cart-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart(Request $request)
    {
        $carts = $this->repository->funcSelectCart();

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.cart-standard", ['carts' => $carts])->render(),
            ]);
        }         

        return view('product.cart', ['carts' => $carts]);
    }  

    /**
     * Store item to cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tocart(CartRequest $request)
    {
        $this->repository->funcStoreCart($request);

        return redirect(route('cart'));
    }  

    /**
     * Clear all cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearall(Cart $cart)
    {
        $cart->cartUser()->delete();

        return redirect(route('cart'));
    }

    /**
     * Remove one item from cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removeone(Request $request, Cart $cart)
    {
        $cartone = $cart->find($request->id);        
        $cartone->delete();

        //return $this->cart($request); //jq
        return $this->repository->funcSelectCart(); //vue
    } 

    /**
     * Mailer.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mailer(Request $request, Mail $mailer)
    {
       return $mailer->funcSend($request->message, $request->contact);   
    } 

    /**
     * cartUserCount
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cartUserCount(User $user, Cart $cart)
    {      
       /* 
        return $user->with('productsCartUser')
                    ->count();
        */
        
        //...or
        return $cart->cartUser()->count();
    }                           
}
