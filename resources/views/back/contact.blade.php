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
        <h3 class="card-title text-center text-primary"><mark>{{$messages->count()}}</mark>  Messages Found</h3>
     
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Subject
                </th>
                <th>
                    Message
                </th>
                <th>
                    Action
                </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    
                
                <tr>
                <td>
               
              {{$message->name}}
                </td>
                <td>
                    {{$message->email}}
                </td>
                <td>
                    {{$message->subject}}
                </td>
                <td>
                    {{$message->content}}
                </td>
                <td>
        
                <form action="{{route('admin.messagedelete',$message->id)}}" method="post">
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

{{ $messages->links() }}

</div>

@endsection