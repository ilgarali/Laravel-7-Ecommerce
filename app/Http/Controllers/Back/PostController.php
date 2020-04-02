<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use function GuzzleHttp\json_decode;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $posts = Product::latest()->paginate(12);
        return view('back.post.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('back.post.addpost',compact('categories'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = new Product;
        $post->title = $request->title;
        $post->price = $request->price;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category;
        $post->slider = $request->slide;
        $post->description = $request->content;
       if ($request->hasFile('images')) {
        $i = 1;  
        foreach ($request->images as $image) {
            $imgName = Str::slug($request->title).'.'.$i. $image->getClientOriginalExtension();
            $data[] = $imgName;
            $i++;
            $image->move(public_path('images/'),$imgName);
           
        }
       }

       $post->images = json_encode($data);
       $post->save();
       return redirect()->route('admin.post.index')->with('success','Product has been published Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Product::findOrFail($id);
        $categories = Category::get();
        return view('back.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Product::findOrFail($id);
        $post->title = $request->title;
        $post->price = $request->price;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category;
        $post->slider = $request->slide;
        $post->description = $request->content;
       if ($request->hasFile('images')) {
        $i = count(json_decode($post->images));  
        foreach ($request->images as $image) {
            $imgName = Str::slug($request->title).'.'.$i. $image->getClientOriginalExtension();
            $data[] = $imgName;
            $i++;
            $image->move(public_path('images/'),$imgName);
           
        }
        foreach (json_decode($post->images) as $img) {
            $data[]=$img;
        }
       
        $post->images = $data;
       }

       
       $post->save();
       return redirect()->route('admin.post.index')->with('success','Product has been updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Product::findOrFail($id);
        if(File::exists($post->img)){
            File::delete(public_path(('images/'),$post->img));
          }
          $post->delete();
          return redirect()->route('admin.post.index')->with('success','You have deleted post successfully');
    
    }
}
