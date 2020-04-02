@extends('front.layouts.master')
@section('content')

<!-- Home -->

<div class="home">
    <div class="home_slider_container">
        
        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">
            
            <!-- Slider Item -->
            @foreach ($slides as $slide)
                
            @php
            
                $img = json_decode($slide->images);
                
            @endphp
<div class="owl-item home_slider_item">
    <div class="home_slider_background" style="background-image:url({{asset('images/'.$img[0])}})"></div>
    <div class="home_slider_content_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                    <div class="home_slider_title">{{$slide->title}}</div>
                        <div class="home_slider_subtitle">{{Str::words($slide->description,50)}}.</div>
                        <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            @endforeach


        </div>

        <!-- Home Slider Dots -->
        
        <div class="home_slider_dots_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_slider_dots">
                            <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                <li class="home_slider_custom_dot active">01.</li>
                                <li class="home_slider_custom_dot">02.</li>
                                <li class="home_slider_custom_dot">03.</li>
                            </ul>
                        </div>
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
<div class="col">

<div class="product_grid">
    @foreach ($products as $product)
        
    
<!-- Product -->
<div class="product">
<div class="product_image">
@php
$img = json_decode($product->images);

@endphp
<img src="{{asset('images/'.$img[0])}}" alt="">
</div>
<div class="product_extra product_new" style="width:45%" >
<a href="{{route('category',$product->category->slug)}}">{{$product->category->category}}</a></div>
<div class="product_content">
<div class="product_title">
    <a href="{{route('single',[$product->category->slug,$product->slug])}}">{{$product->title}}</a></div>
    <div class="product_price">${{$product->price}} </div>
</div>
</div>
@endforeach
<!-- Product -->

                                                                                                                                                                                                                                                                                                    

    
</div>
</div>
</div>
</div>

<!-- Ad -->

<div class="avds_xl">
<div class="container">
<div class="row">
<div class="col">
<div class="avds_xl_container clearfix">
<div class="avds_xl_background" style="background-image:url({{asset('front/')}}/images/avds_xl.jpg)"></div>
    <div class="avds_xl_content">
        <div class="avds_title">Amazing Devices</div>
        <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.</div>
        <div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
    </div>
</div>
</div>
</div>
</div>
</div>

<!-- Icon Boxes -->

<div class="icon_boxes">
<div class="container">
<div class="row icon_box_row">

<!-- Icon Box -->
<div class="col-lg-4 icon_box_col">
<div class="icon_box">
<div class="icon_box_image"><img src="{{asset('front/')}}/images/icon_1.svg" alt=""></div>
    <div class="icon_box_title">Free Shipping Worldwide</div>
    <div class="icon_box_text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
    </div>
</div>
</div>

<!-- Icon Box -->
<div class="col-lg-4 icon_box_col">
<div class="icon_box">
    <div class="icon_box_image"><img src="{{asset('front/')}}/images/icon_2.svg" alt=""></div>
    <div class="icon_box_title">Free Returns</div>
    <div class="icon_box_text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
    </div>
</div>
</div>

<!-- Icon Box -->
<div class="col-lg-4 icon_box_col">
<div class="icon_box">
    <div class="icon_box_image"><img src="{{asset('front/')}}/images/icon_3.svg" alt=""></div>
    <div class="icon_box_title">24h Fast Support</div>
    <div class="icon_box_text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
    </div>
</div>
</div>

</div>
</div>
</div>

@endsection