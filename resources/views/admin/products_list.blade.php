 @extends('admin.layout.master')

 {{-- @title('','') --}}

 @section('content')

<div class="panel panel-default">

    <div class="panel-heading">


    </div>

    <div class="panel-body">
        @if (isset($products) && $products->count()>0)

        <table id="products" class="table table-bordered">
            @if(Session()->has('success'))
                <div class="alert alert-danger">
                    {{ Session()->get('success') }}
                    </div>
            @endif

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category id</th>
                    <th>Photo</th>
                    <th class="text-center">Operations</th>
                </tr>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>
                            @if ($product->photo == NULL)
                            {{'No photo avaliable'}}
                            @else


                           <img width="60" height="60" src="/images/products/{{$product->photo}}" alt="">
                           @endif
                        </td>
                        <td class="text-center">
                             <a href=""><button class="btn btn-primary">Edit</button></a>
                             <a href="{{route('delete.product',$product->id)}}"><button class="btn btn-danger">Delete</button></a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </thead>
            <tfoot>
                <tr>
                    <th>maximum price: {{$max}}</th>
                    <th>minimum price: {{$min}}</th>
                </tr>
            </tfoot>
        </table>
        @else
        <div class="alert alert-danger"><h3>there is no products</h3></div>

        @endif
    </div>


</div>


@stop
