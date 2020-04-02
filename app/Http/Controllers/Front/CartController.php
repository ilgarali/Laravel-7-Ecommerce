<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
     view()->share('categories',Category::get());   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCollection = \Cart::session('cart')->getContent();
        
        return view('front.cart.cart',compact('cartCollection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Product = Product::find($request->id); // assuming you have a Product model with id, name, description & price

        // add the product to cart
        \Cart::session('cart')->add(array(
            'id' => $request->id,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => $request->quantity,
            'attributes' => array(),
            'associatedModel' => $Product
        ));
        return redirect()->route('cart.index')->with('success','Product has added your cart successfully');

    }

  

    public function delete(Request $request)
    {
        $holdIds = explode(',',$request->ids);
        foreach($holdIds as $id) {
            \Cart::session('cart')->remove($id);
        }

        $success = ['success' =>true]; 
        return response()->json($success);
    }

   
 
}
