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

        <h3>Vendor: {{$vendor->name}}</h3>
        <div class="panel-body">

              <table class="table table-bordered">

                  <thead>
                      <tr>
                      <th>Product Name</th>
                      <th class="text-center">Operations</th>


                      </tr>
                  </thead>
                  <tbody>

                        @foreach ($products as $product)
                        <tr>
                          <td>
                            {{$product -> name}}
                          </td>
                          <td class="text-center">


                          </td>
                          @endforeach
                        </tr>
                  </tbody>
              </table>

        </div>
    </div>

</div>


{{-- Add products to Vendor --}}
<div class="panel-default">
    <div class="panel-body">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Add Products
            </a>

                @if (Session()->has('success'))
                <div class="alert alert-success"> {{Session()->get('success')}}
                </div>

                @endif

          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="{{route('save.vendor.products')}}" method="POST">
                    @csrf
                    <input type="text" name="vendor_id" value="{{$vendor->id}}">
                    <select name="all_products[]" class="form-control" multiple style="width: 250px">
                        <option value="">Select Product</option>
                        @foreach ($all_products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select><br>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
          </div>
    </div>
</div>

@stop

