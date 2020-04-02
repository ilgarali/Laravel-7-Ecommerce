@extends('back.layouts.master')
@section('content')
    

      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 text-center">
            
                <h1>Welcome </h1>
              <h2>{{Auth::user()->name}}</h2>
              
            </div>
          </div>
     
    
   
        </div>
    
        @endsection