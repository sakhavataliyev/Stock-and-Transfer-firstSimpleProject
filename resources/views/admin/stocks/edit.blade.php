@extends('admin.admin_master')

@section('admin')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

{{-- @php
        $productions = DB::table('productions')->get();
@endphp --}}

{{-- 
<script type="text/javascript">
  $(document).ready(function(){
 $('select[name="product_id"]').on('change',function(){
      var product_id = $(this).val();
      if (product_id) {
        
        $.ajax({
          url: "{{ url('/get/productprice/') }}/"+product_id,
          type:"GET",
          dataType:"json",
          success:function(data) { 
          var d =$('select[name="product_cost"]').empty();
          var d =$('select[name="product_price"]').empty();
          // var d =$('select[name="total_cost"]').empty();
          $.each(data, function(key, value){
          
          $('select[name="product_cost"]').append('<option value="'+ value.product_cost + '">' + value.product_cost + '</option>');

          $('select[name="product_price"]').append('<option value="'+ value.product_price + '">' + value.product_price + '</option>');

          // $('select[name="total_cost"]').append('<option value="'+ value.product_cost*100 + '">' + value.product_cost*100 + '</option>');

          });
          },
        });

      }else{
        alert('danger');
      }

        });
  });

</script> --}}


@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
  <span class="alert-text"><strong>Success!</strong>   {{ session('success') }}</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
  <span class="alert-text"><strong>{{ $error }}</strong> </span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endforeach
@endif

<div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Edit Stocks ID Number:{{ $stocks->id }}</h3>
          </div>

        </div>
      </div>
      <!-- Light table -->
      <form action="{{ url('/admin/update/stocks/'.$stocks->id) }}" method="POST">
        @csrf

  <div class="row">
        <input type="hidden" name="product_id" class="form-control" value="{{ $stocks->product_id }}" placeholder="Stock Size">
        <input type="hidden" name="product_cost" class="form-control" value="{{ $stocks->product_cost }}" placeholder="Stock Size">
        <input type="hidden" name="product_price" class="form-control" value="{{ $stocks->product_price }}" placeholder="Stock Size">
        <input type="hidden" name="stock_size" class="form-control" value="{{ $stocks->stock_size }}" placeholder="Stock Size">

        <div class="col-lg-12 px-lg-5 py-lg-3">
          <div class="form-group">
              <label class="form-control-label" for="input-first-name">Stock Quantity</label>
              <input type="text" name="stock_quantity" class="form-control" value="{{ $stocks->stock_quantity }}" placeholder="Stock Quantity">
              <input type="hidden" name="old_stock_quantity" value="{{ $stocks->stock_quantity }}">
            </div>
        </div>
   </div>


 
    <div class="text-right">  
    <button type="submit" class="btn btn-primary" style="margin: 2%;">Update stocks</button>
    </div>
      </form>


      <!-- Card footer -->

    </div>
  </div>




@endsection