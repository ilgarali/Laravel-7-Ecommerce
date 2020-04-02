@extends('back.layouts.master')
@section('content')


<div class="main-panel">
<div class="content-wrapper">

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
 
  
    <div class="card">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">
                <h3>{{session('success')}}</h3>
            </div>
            @endif
        <h3 class="card-title text-center text-primary"><mark>{{$posts->count()}}</mark>  Products Found</h3>
        <a href="{{route('admin.post.create')}}" class="btn btn-outline-info btn-fw my-2 btn-block"><i class="mdi mdi-plus-box

            "></i> Add New Product</a> 
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Description
                </th>
                <th>
                    Category
                </th>
                <th>
                    Action
                </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    
                
                <tr>
                <td>
                    @php
                        $img = json_decode($post->images);
                        
                    @endphp
                <img class="img-fluid" src="{{asset('images/'.$img[0])}}
                    " alt="">
                </td>
                <td>
                    {{$post->title}}
                </td>
                <td>
                    {{Str::words($post->description,55)}}
                </td>
                <td>
                    {{$post->category->category}}
                </td>
                <td>
                <a class="btn btn-primary my-2 " href="{{route('admin.post.edit',$post->id)}}">
                        <i class="mdi mdi-table-edit "></i>
                    </a>
                <form action="{{route('admin.post.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="mdi mdi-delete
                            "></i></button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>

{{ $posts->links() }}

</div>

@endsection