
@extends('admin.layout.master')
@section('title','Admin Dashboard')


@section('content')


<h2>Dashboard</h2>

    @csrf
<input  type="text" id="search" class="form-control" placeholder="Search Products here">
<div class="show-result">

</div>

@stop


<script src="{{asset('backend/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>

<script>
    $(document).ready(function(){
       $('#search').keyup(function(){
          var key= $(this).val();
            if(key != ''){
                //ajax
                $.ajax({
                    url:"{{route('search.product')}}", //action
                    method: 'POST',                 //method
                    data: {
                    '_token' : "{{ csrf_token() }}",
                    'K': key
                     },
                success: function(response){
                    $('.show-result').show();
                    $('.show-result').html(response);
                }
                });

            }else{
                $('.show-result').hide();
            }
       })
    })
</script>
