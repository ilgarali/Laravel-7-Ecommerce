@extends('front.layouts.master')

@section('cart.css')
<link rel="stylesheet" type="text/css" href="{{asset('front')}}/styles/cart.css">
<link rel="stylesheet" type="text/css" href="{{asset('front')}}/styles/cart_responsive.css">
@endsection
@section('content')



<div class="home">
<div class="home_container">
<div class="home_background" style="background-image:url({{asset('front/')}}/images/cart.jpg)"></div>
    <div class="home_content_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content">
                        <div class="breadcrumbs">
                            <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                                
                                <li>Shopping Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div class="cart_info">
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Column Titles -->
                <!-- Cart Info -->
            @if (session('success'))
            <div class="allert alert-info text-center font-weight-bold" style="font-size:22px;color:#000">
                {{session('success')}}
            </div>
            @endif

            <div class="cart_info_columns clearfix">
                <div class="cart_info_col cart_info_col_product">Product</div>
                <div class="cart_info_col cart_info_col_price">Price</div>
                <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                <div class="cart_info_col cart_info_col_total">Total</div>
            </div>
        </div>
    </div>
    <div class="row cart_items_row">
        <div class="col">

            <!-- Cart Item -->

            @foreach ($cartCollection as $item)
                
           
            <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                <!-- Name -->
                <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_item_image">
                        @php
                      
                          
                                $image = json_decode($item->model->images);
                            
                        
                            
                        @endphp
                        <div><img src="{{asset('images/'.$image[0])}}" alt="{{$item->model->title}}"></div>
                    </div>
                    <div class="cart_item_name_container">
                    <div class="cart_item_name"><a href="{{route('single',[$item->model->category->slug,$item->model->slug])}}">{{$item->model->title}}</a></div>
                        
                    </div>
                </div>
                <!-- Price -->
<div class="cart_item_price">${{$item->model->price}}</div>
    <!-- Quantity -->
    <div class="cart_item_quantity">
        <div class="product_quantity_container">
            <div class="product_quantity clearfix">
                <span>Qty</span>
            <input class="quantity_input" readonly id="{{$item->model->id}}"  type="text" pattern="[0-9]*" value="{{$item->quantity}}">
          
            <input type="hidden" class="ids" value="{{$item->model->id}}">
            </div>
        </div>
    </div>
                <!-- Total -->
            <div class="cart_item_total">${{$item->quantity * $item->price}}</div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row row_cart_buttons">
        <div class="col">
            <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
            <div class="button continue_shopping_button"><a href="{{route('home')}}">Continue shopping</a></div>
                <div class="cart_buttons_right ml-lg-auto">
                <form  style="display:inline-block" >
                        <div style="width:0%"><button class="button clear_cart_button" id="clear">Clear cart</button></div>
                    </form>
                  
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row row_extra">
        

        <div class="offset-2 col-md-8">
            <div class="cart_total">
                <div class="section_title">Cart total</div>
                <div class="section_subtitle">Final info</div>
                <div class="cart_total_container">
                    <ul>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Subtotal</div>
                            <div class="cart_total_value ml-auto">${{Cart::session('cart')->getSubTotal()}}</div>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Shipping</div>
                            <div class="cart_total_value ml-auto">Free</div>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Total</div>
                        <div class="cart_total_value ml-auto">${{Cart::session('cart')->getTotal()}}</div>
                        </li>
                    </ul>
                </div>
            <div class="button checkout_button"><a href="{{route('checkout')}}">Proceed to checkout</a></div>
            </div>
        </div>
    </div>
</div>		
</div>

<div id="csrf" style="display:none">
    @csrf
</div>
@endsection



@section('cart')
<script src="{{asset('front/')}}/js/cart.js"></script>
<script>
    let ids = document.querySelectorAll('.ids');
    let holdId = [];
    let token = document.getElementById('csrf').childNodes[1].value;
    let clear = document.getElementById('clear');
    clear.addEventListener('click',(e) => {
        e.preventDefault();
        ids.forEach((element) => {
        
        holdId.push(element.value)
    })
    let url = "{{route('deletecart')}}";
    let data = new FormData();
    data.append('ids',holdId)
    fetch(url,{
        headers: {
            "X-CSRF-TOKEN": token
        },
        method:'POST',
        body:data
    }).then((res) => res.json())
       .then((data) => {
            if (data) {
                        alert('Cart is cleared');
                        location.href = '/';
                    }
           
       }) .catch((error) => {
           console.log(error)
           
       });
    })
    
let quantity_inc = document.querySelectorAll('.quantity_inc');
let quantity_dec = document.querySelectorAll('.quantity_dec');
let quantity_input;
let updatedIds = [];
quantity_inc.forEach((element) => {
    element.addEventListener('click',(e) => {
        e.preventDefault();
        quantity_input = document.getElementById(element.getAttribute('data-id'));
        updatedIds.push(element.getAttribute('data-id'));
        ++quantity_input.value
        
    })
    
    
})



quantity_dec.forEach((element) => {
    element.addEventListener('click',(e) => {
        e.preventDefault();
        quantity_input = document.getElementById(element.getAttribute('data-id'));
 
        if (quantity_input.value >1) {
            --quantity_input.value
            
        }
        
    })
    
    
})

// let update = document.getElementById('update');
// let data = new FormData();
// let holdValues = [];
// update.addEventListener('click',(e) => {
    
//     holdValues = [];
//    let getNewValues = document.querySelectorAll('.quantity_input');
//    getNewValues.forEach((element) => {
//        holdValues.push(element.value)
       
       
//    })
//    data.append('values',holdValues);
//    data.append('ids',updatedIds)
//    let url = "";
//    fetch(url,{headers: {
//             "X-CSRF-TOKEN": token
//         },
//         method:'POST',
//         body:data}
//         ).then((res) => res.json())
//         .then((data) => {
//             if (data) {
//                 location.reload();
//                 updatedIds = [];
//             }
           
//         }).catch((error) => {
//             console.log(error);
            
//         })
   
    
// })


     
</script>
@endsection
