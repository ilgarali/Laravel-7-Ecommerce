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
    action="{{route('admin.post.store')}}">
        @csrf
         <div class="form-group">
          <label for="exampleInputName1">Title</label>
          <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Price</label>
          <input name="price" type="number" class="form-control" id="exampleInputName1" placeholder="Enter price of product">
        </div>
       
        <div class="form-group">
            <label for="exampleSelectGender">Select Category</label>
              <select name="category" class="form-control" id="exampleSelectGender">
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
                                      
              
              </select>
            </div>

        <div class="form-group">
          <label for="exampleSelectGender">Select to use or Not use in slide</label>
            <select name="slide" class="form-control" id="exampleSelectGender">
              <option selected="" value="1">Slide</option>
              <option value="0">Not Slide</option>
            </select>
          </div>
        <div class="form-group">
          <label>Image upload</label>
          <input type="file" name="images[]" class="form-control" multiple>
          
        </div>
       
        <div class="form-group">
          <label for="exampleTextarea1">Textarea</label>
          <textarea name="content" class="form-control" id="exampleTextarea1" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
       
      </form>
    </div>
  </div>
  @endsection