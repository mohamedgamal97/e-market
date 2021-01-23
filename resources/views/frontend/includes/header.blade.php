<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

        <h3 class="masthead-heading text-uppercase mb-0">Select Your Category</h3><br>
        @php
             $categories = App\Models\Category::select('id','name')->get();
        @endphp
         @csrf
            <select class="form-control" id="category">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <div class="show-products" style="display: none">

            </div>


            <style>
                .show-products {
                    background: white;
                    border: 1px solid rgb(11, 51, 51);
                    padding: 10px;
                    color: rgb(9, 47, 47);
                    margin: 10px auto;
                    width: 100%;
                }
            </style>
    </div>


</header>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(document).ready(function(){
      $('#category').change(function(){
          var id = $(this).val();

          $.ajax({
            url:"{{ route('show.all.prodcuts') }}",
            method:'POST',
            data: {
                '_token' : "{{ csrf_token() }}",
                'catid': id
            },

            success:function (response){
                    $('.show-products').show();
                    $('.show-products').html(response);
            }
         });
      });
    });
</script>
