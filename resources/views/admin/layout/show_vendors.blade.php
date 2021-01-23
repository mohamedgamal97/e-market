@extends('admin.layout.master')
@section('title','create category')

@section('content')
{{-- <div class="panel panel-default">
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
</div> --}}


<div class="panel panel-default">
    <div class="panel-heading">
<form action="" method="">
    @csrf
    <div class="form-group">
      <label>Create New Vendor</label>
      <input type="text" name='name' class="form-control">


    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Vendors List:</h4>
        <div class="panel-body">

              <table id="vendors" class="table table-bordered">

                  <thead>
                      <tr>
                      <th>Vendor Name</th>
                      <th class="text-center">Operations</th>


                      </tr>
                  </thead>
                  <tbody>

                        @foreach ($vendors as $vendor)
                        <tr>
                          <td>
                            {{$vendor -> name}}
                          </td>
                          <td class="text-center">

                              <a href="{{route('show.vendors.products',$vendor->id)}}" class="btn btn-warning">Show Products</a>
                          </td>
                          @endforeach
                        </tr>
                  </tbody>
              </table>

        </div>
    </div>

</div>

@stop

