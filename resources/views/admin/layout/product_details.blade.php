@extends('admin.layout.master')

{{-- @title('','') --}}

@section('content')

<div class="panel panel-default">

   <div class="panel-heading">
    <h3>Product Details</h3>

   </div>

   <div class="panel-body">

<table class="table table-bordered">
           <thead>
               <tr>
                   <th>Name</th>
                   <th>Price</th>
                   <th>Category id</th>
                   <th>Photo</th>
                   <th class="text-center">Operations</th>
               </tr>
               <tbody>
                   {{-- @foreach ($product as $product) --}}
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
                   {{-- @endforeach --}}
               </tbody>
           </thead>
       </table>

   </div>


</div>


@stop
