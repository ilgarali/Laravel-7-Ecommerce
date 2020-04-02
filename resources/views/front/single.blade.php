@extends('front.layouts.master')
@section('single')
<link rel="stylesheet" type="text/css" href="{{asset('front/')}}/styles/product.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/')}}/styles/product_responsive.css">
@endsection
@section('content')
@php
$img = json_decode($getproduct->images);

@endphp
<div class="home">
<div class="home_container">
<div class="home_background" style="background-image:url({{asset('images/'.$img[0])}})"></div>
<div class="home_content_container">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="home_content">
                <div class="home_title" style="color:#000;">{{$getproduct->category->category}}<span>.</span></div>
            <div class="home_text"><p class="text-muted">{{$getproduct->title}}</p></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- Product Details -->

<div class="product_details">
<div class="container">
<div class="row details_row">

<!-- Product Image -->
<div class="col-lg-6">
<div class="details_image">
 
    <div class="details_image_large"><img src="{{asset('images/'.$img[0])}}" alt="">
    <div class="product_extra product_new" style="width:22%"><a href="{{route('category',$getproduct->category->slug)}}">{{$getproduct->category->category}}</a></div></div>
    <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">

        @foreach ($img as $images)
            
       
        <div class="details_image_thumbnail @if($img[0] ==$images) active @endif" data-image="{{asset('images/'.$images)}}">
            <img src="{{asset('images/'.$images)}}" alt="">
        </div>
        @endforeach



    </div>
</div>



</div>

<!-- Product Content -->
<div class="col-lg-6">
    <div class="details_content">
        <div class="details_name">{{$getproduct->title}}</div>
        <div class="details_discount">${{$getproduct->price}}</div>
        <div class="details_price">${{$getproduct->price - 21}}</div>

        <!-- In Stock -->
        <div class="in_stock_container">
            <div class="availability">Availability:</div>
        <span>@if ($getproduct->available)
            
         In Stock @else Not Avaibale @endif </span>
        </div>
        <div class="details_text">
        <p>{{$getproduct->description}}</p>
        </div>
        <form style="display:inline-block" action="{{route('cart.store')}}" method="post">
        <!-- Product Quantity -->
        <div class="product_quantity_container">
            <div class="product_quantity clearfix">
                <span>Qty</span>
                <input id="quantity_input" name="quantity" type="text" pattern="[0-9]*" value="1">
            <input type="hidden" name="id" value="{{$getproduct->id}}">
    <div class="quantity_buttons">
        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
    </div>
            </div>
       
            @csrf
            <div style="width:0%;display:inline-block"><button class="button cart_button">Add to cart</button></div>
       
        </div>
    </form>
        <!-- Share -->
        <div class="details_share">
            <span>Share:</span>
            <ul>
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>
</div>


</div>
</div>

<!-- Products -->

<div class="products">
<div class="container">
<div class="row">
<div class="col text-center">
    <div class="products_title">Related Products</div>
</div>
</div>
<div class="row">
<div class="col">
    
    <div class="product_grid">

        @foreach ($relatedproducts as $relatedproduct) 
        @php
$related = json_decode($relatedproduct->images);



@endphp
        <!-- Product -->
        <div class="product">
        <div class="product_image"><img src="{{asset('images/'.$related[0])}}" alt=""></div>
        <div class="product_extra product_new" style="width:45%" >
            <a href="{{route('category',$relatedproduct->category->slug)}}">{{$relatedproduct->title}}</a></div>
            <div class="product_content">
            <div class="product_title">
                <a href="{{route('single',[$relatedproduct->category->slug,$relatedproduct->slug])}}">{{$relatedproduct->title}}</a></div>
            <div class="product_price">${{$relatedproduct->price}}</div>
            </div>
        </div>
        @endforeach

    </div>
</div>
</div>
</div>
</div>


@endsection
@section('product.js')
<script src="{{asset('front/')}}/js/product.js"></script>
@endsection