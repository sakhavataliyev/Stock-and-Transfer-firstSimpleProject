@extends('admin.admin_master')

@section('admin')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

@php
    $transfers = DB::table('transfers')->where('transfer_status',1)->get();
    $clients = DB::table('clients')->where('client_status',1)->get();
    $productions = DB::table('productions')->where('product_status',1)->get();
@endphp


<script type="text/javascript">
  $(document).ready(function(){
 $('select[name="product_id"]').on('change',function(){
      var product_id = $(this).val();
      if (product_id) {
        
        $.ajax({
          url: "{{ url('/get/transfersproductsprice/') }}/"+product_id,
          type:"GET",
          dataType:"json",
          success:function(data) { 
          var d =$('select[name="product_price"]').empty();
          $.each(data, function(key, value){
          
          $('select[name="product_price"]').append('<option value="'+ value.product_price + '">' + value.product_price + '</option>');

          });
          },
        });

      }else{
        alert('danger');
      }

        });
  });

</script>



@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
  <span class="alert-text"><strong>Success!</strong>   {{ session('success') }}</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('error'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
    <span class="alert-text"><strong>{{ session('error') }}</strong> </span>
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
            <h3 class="mb-0">Edit Transfers ID Number:{{ $transfersproducts->id }}</h3>
          </div>

        </div>
      </div>
      <!-- Light table -->
      <form action="{{ url('/admin/update/transfersproducts/'.$transfersproducts->id) }}" method="POST">
        @csrf
          <div class="row">
            <div class="col-lg-4 px-lg-5 py-lg-3">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">Transfer Name</label>
                <select class="form-control" name="transfer_id">
                    @foreach ($transfers as $transfer)
                        <option value="{{ $transfer->id }}" <?php if ($transfer->id == $transfersproducts->transfer_id) {
                          echo "selected"; } ?>  >{{ $transfer->transfer_name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-4 px-lg-5 py-lg-3">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Client Store</label>
                  <select class="form-control" name="client_id">
                      @foreach ($clients as $client)
                          <option value="{{ $client->id }}" <?php if ($client->id == $transfersproducts->client_id) {
                            echo "selected"; } ?> >{{ $client->client_store }}</option>
                      @endforeach
                  </select>
                </div>
              </div>


              <div class="col-lg-4 px-lg-5 py-lg-3">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Product Quantity</label>
                  <input type="text" name="product_quantity" value="{{ $transfersproducts->product_quantity }}" id="input-first-name" class="form-control" placeholder="Transfer Name">
                  <input type="hidden" name="old_product_quantity" value="{{ $transfersproducts->product_quantity }}">
                  <input type="hidden" name="product_cost" value="{{ $transfersproducts->product_cost }}">
                  <input type="hidden" name="product_price" value="{{ $transfersproducts->product_price }}">
                </div>
              </div>
              
              <select class="form-control"  name="product_id" hidden>
                @foreach ($productions as $production)
                <option readonly value="{{ $production->id }}" <?php if ($production->id == $transfersproducts->product_id) {
                  echo "selected"; } ?> >{{ $production->product_name }}</option>
                @endforeach 
            </select>


          </div>




 
    <div class="text-right">  
    <button type="submit" class="btn btn-primary" style="margin: 2%;">Update</button>
    </div>
      </form>


      <!-- Card footer -->

    </div>
  </div>




@endsection