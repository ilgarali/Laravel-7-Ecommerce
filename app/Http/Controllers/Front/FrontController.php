<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
     view()->share('categories',Category::get());   
    }
    public function index()
    {
        $products = Product::latest()->paginate(12);
        $slides = Product::where('slider','1')->take(3)->inRandomOrder()->get();
        return view('front.index',compact('products','slides'));
    }

    public function single($category,$product)
    {
        $getcategory = Category::where('slug',$category)->firstOrFail();
        $getproduct = Product::where('slug',$product)->where('category_id',$getcategory->id)->firstOrFail();
        
        $relatedproducts = Product::where('category_id',$getcategory->id)->take(4)->inRandomOrder()->get();
     
        return view('front.single',compact('getproduct','relatedproducts'));
    }

    public function category($cat)
    {
        $getcat = Category::where('slug',$cat)->firstOrFail();
        
        $getproducts = Product::where('category_id',$getcat->id)->paginate(12) ?? abort(404,'Not Found');
        
        return view('front.category',compact('getproducts'));

    }
}
