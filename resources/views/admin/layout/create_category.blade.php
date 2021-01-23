@extends('admin.layout.master')
@section('title','create category')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">

        <h4>create category</h4>
    </div>


    <div class="panel-body">
        @if (Session()->has('success'))
            <div class="alert alert-info">
                {{Session()->get('success')}}
            </div>
        @endif


        <form action="{{route('store.category')}}" method="POST">
            @csrf
            <div class="form-group">
              <label>Category</label>
              <input type="text" name='name' class="form-control">
              @error('name')
                  <span class="text-danger">{{$message}}</span>
              @enderror

            </div>

            <button type="submit" class="btn btn-primary">Create</button>
          </form>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Categories List:</h4>
        <div class="panel-body">

              <table class="table table-bordered">
                  @if (Session()->has('deleted'))
                    <div class="alert alert-danger">{{
                        Session->get('success')}}</div>
                    @endif
                  <thead>
                      <tr>
                      <th>Name</th>
                      <th class="text-center">Operations</th>


                      </tr>
                  </thead>
                  <tbody>

                        @foreach ($categories as $category)
                        <tr>
                          <td>
                            {{$category -> name}}
                          </td>
                          <td class="text-center">
                              <a href="{{route('edit.category',$category->id)}}" class="btn btn-primary">Edit</a>
                              <a href="{{route('delete.category',$category->id)}}" class="btn btn-danger">Delete</a>
                              <a href="{{route('products.category',$category->id)}}" class="btn btn-info">Show Products</a>
                          </td>
                          @endforeach
                        </tr>
                  </tbody>
              </table>

              {{$categories->links()}}

        </div>
    </div>

</div>

@stop

