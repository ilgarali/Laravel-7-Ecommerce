@extends('back.layouts.master')
@section('content')


<div class="main-panel">
    <div class="content-wrapper">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<div class="card">
    <div class="card-body">
    
    <form class="forms-sample" enctype="multipart/form-data" method="POST"
    action="{{route('admin.post.update',$post->id)}}">
        @csrf
        @method('PUT')
         <div class="form-group">
          <label for="exampleInputName1">Title</label>
         <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{$post->title}}">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Price</label>
        <input name="price" value="{{$post->price}}" type="number" class="form-control" id="exampleInputName1" placeholder="Enter price of product">
        </div>
       
        <div class="form-group">
            <label for="exampleSelectGender">Select Category</label>
              <select name="category" class="form-control" id="exampleSelectGender">
                @foreach ($categories as $category)
                
                    
               
                  <option  value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
                                      
              
              </select>
            </div>

        <div class="form-group">
          <label for="exampleSelectGender">Select to use or Not use in slide</label>
            <select name="slide" class="form-control" id="exampleSelectGender">
              <option  value="1">Slide</option>
              <option value="0">Not Slide</option>
            </select>
          </div>
        <div class="form-group">
          <label>Image upload</label>
          @php
              $images = json_decode($post->images);
          @endphp
          
          <input type="file" name="images[]" class="form-control" multiple>
          @foreach ($images as $img)
          <img class="img-fluid mt-3" style="width:150px" src="{{asset('images/'.$img)}}" alt="">
          @endforeach
         
        </div>
       
        <div class="form-group">
          <label for="exampleTextarea1">Textarea</label>
        <textarea name="content" class="form-control" id="exampleTextarea1" rows="4">{{$post->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
       
      </form>
    </div>
  </div>
  @endsection