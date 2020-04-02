@extends('front.layouts.master')
@section('contact.css')
<link rel="stylesheet" type="text/css" href="{{asset('front/')}}/styles/contact.css">
<link rel="stylesheet" type="text/css" href="{{asset('front/')}}/styles/contact_responsive.css">
@endsection
@section('content')


<div class="home">
<div class="home_container">
<div class="home_background" style="background-image:url({{asset('front/')}}/images/contact.jpg)"></div>
<div class="home_content_container">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="home_content">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- Contact -->

<div class="contact">
<div class="container">
<div class="row">


<!-- Get in touch -->
<div class="col-lg-8 contact_col">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>    
@endif

    <div class="get_in_touch">
        <div class="section_title">Get in Touch</div>
        <div class="section_subtitle">Say hello</div>
        <div class="contact_form_container">
        <form action="{{route('contactus')}}" id="contact_form" class="contact_form" method="POST">
            @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <!-- Name -->
                        <label for="contact_name">Name*</label>
                        <input type="text"  name="name" id="contact_name" class="contact_input" required="required">
                    </div>
                    <div class="col-xl-6 last_name_col">
                        <!-- Last Name -->
                        <label for="contact_last_name">Email*</label>
                        <input type="text" name="email" id="contact_last_name" class="contact_input" required="required">
                    </div>
                </div>
                <div>
                    <!-- Subject -->
                    <label for="contact_company">Subject</label>
                    <input type="text" name="subject" id="contact_company" class="contact_input">
                </div>
                <div>
                    <label for="contact_textarea">Message*</label>
                    <textarea name="content" id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
                </div>
                <button class="button contact_button"><span>Send Message</span></button>
            </form>
        </div>
    </div>
</div>

<!-- Contact Info -->
<div class="col-lg-3 offset-xl-1 contact_col">
    <div class="contact_info">
        <div class="contact_info_section">
            <div class="contact_info_title">Marketing</div>
            <ul>
                <li>Phone: <span>+53 345 7953 3245</span></li>
                <li>Email: <span>yourmail@gmail.com</span></li>
            </ul>
        </div>
        <div class="contact_info_section">
            <div class="contact_info_title">Shippiing & Returns</div>
            <ul>
                <li>Phone: <span>+53 345 7953 3245</span></li>
                <li>Email: <span>yourmail@gmail.com</span></li>
            </ul>
        </div>
        <div class="contact_info_section">
            <div class="contact_info_title">Information</div>
            <ul>
                <li>Phone: <span>+53 345 7953 3245</span></li>
                <li>Email: <span>yourmail@gmail.com</span></li>
            </ul>
        </div>
    </div>
</div>
</div>

</div>
</div>


@endsection


@section('contact.js')

<script src="{{asset('front/')}}/js/contact.js"></script>

@endsection
