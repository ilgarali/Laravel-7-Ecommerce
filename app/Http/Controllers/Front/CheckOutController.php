<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{

    public function __construct()
    {
     view()->share('categories',Category::get());   
    }
    public function checkout()
    {

        $cartCollection = \Cart::session('cart')->getContent();
        return view('front.checkout.checkout',compact('cartCollection'));
    }
}
