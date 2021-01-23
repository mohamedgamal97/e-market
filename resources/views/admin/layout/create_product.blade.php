@extends('admin.layout.master')
@section('title','create product')
@section('content')



<div class="panel panel-default">
    <div class="panel-heading">

        <h3>Create New Product</h3>
    </div>


    <div class="panel-body">
        @if (Session()->has('success'))

            <div class="alert alert-info">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{Session()->get('success')}}
            </div>
        @endif
        <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Name</label>
              @error('name')
                    <br><span class="text-danger">{{$message}} </span>
                @enderror
              <input type="text" value="{{old('name')}}" name='name' class="form-control">

            </div>

            <div class="form-group">
                <label>Category</label>
               <select class="form-control" name="category" id="">
                <option value="">Select Category</option>

                   @foreach ($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach

               </select>

              </div>

            <div class="form-group">

                <label>Price</label>
                @error('price')
                    <br><span class="text-danger">{{$message}} </span>
                @enderror
                <input value="{{old('name')}}" type="text" name='price' class="form-control">

              </div>

              <div class="form-group">
                <label>Details</label>
                <input type="text" name='details' class="form-control">

              </div>

              <div class="form-group">
                <label>Photo</label>
                <input type="file" name='photo' class="form-control">

              </div>

            <button type="submit" class="btn btn-primary">Create</button>
          </form>
    </div>
</div>



@stop
