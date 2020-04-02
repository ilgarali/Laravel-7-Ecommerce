@extends('front.layouts.master')
@section('category')
<link rel="stylesheet" type="text/css" href="{{asset('front/')}}/styles/categories.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/')}}/styles/categories_responsive.css">
@endsection
@section('content')

<div class="products">
<div class="container">
    <div class="row">
        <div class="col">
            
            <!-- Product Sorting -->
            <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
            <div class="results">Showing <span>{{$getproducts->count()}}</span> result(s)</div>
                <div class="sorting_container ml-md-auto">
                    <div class="sorting">
                        <ul class="item_sorting">
                            <li>
                                <span class="sorting_text">Sort by</span>
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                <ul>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            
            <div class="product_grid">
                @foreach ($getproducts as $getproduct)
                @php
            
                $img = json_decode($getproduct->images);
                
            @endphp
    
        <!-- Product -->
        <div class="product">
        <div class="product_image"><img src="{{asset('images/'.$img[0])}}" alt=""></div>
        <div class="product_extra product_new" style="width:45%" >
            <a href="{{route('category',$getproduct->slug)}}">{{$getproduct->category->category}}</a>
        </div>
            <div class="product_content">
            <div class="product_title">
                <a href="{{route('single',[$getproduct->category->slug,$getproduct->slug])}}">{{$getproduct->title}}</a>
            </div>
            <div class="product_price">${{$getproduct->price}}</div>
            </div>
        </div>
        @endforeach



            </div>
            <div class="product_pagination">
                <ul>
                    {{$getproducts->links() }}
                </ul>
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
                <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                <div class="icon_box_title">Free Shipping Worldwide</div>
                <div class="icon_box_text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                </div>
            </div>
        </div>

        <!-- Icon Box -->
        <div class="col-lg-4 icon_box_col">
            <div class="icon_box">
                <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
                <div class="icon_box_title">Free Returns</div>
                <div class="icon_box_text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                </div>
            </div>
        </div>

        <!-- Icon Box -->
        <div class="col-lg-4 icon_box_col">
            <div class="icon_box">
                <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
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