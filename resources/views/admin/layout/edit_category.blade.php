@extends('admin.layout.master')
@section('title','edit category')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">

        <h4>Edit category</h4>
    </div>


    <div class="panel-body">
        @if (Session()->has('success'))
            <div class="alert alert-info">
                {{Session()->get('success')}}
            </div>
        @endif


        <form action="{{route('update.category',$category->id)}}" method="POST">
            @csrf
            <div class="form-group">
              <label>Category</label>
              <input type="text" name='name' class="form-control" value="{{$category->name}}">


              @error('name')
                  <span class="text-danger">{{$message}}</span>
              @enderror

            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
          </form>
    </div>
</div>



@stop

