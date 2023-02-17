@extends('admin.admin_master')

@section('admin')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

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
            <h3 class="mb-0">{{ $refundsedit->transfer_name }} - {{ $refundsedit->client_store }} - {{ $refundsedit->product_name }}</h3>
          </div>
        </div>
      </div>
      <!-- Light table -->
      <form action="{{ url('/admin/update/refunds/'.$refundsedit->id) }}" method="POST">
        @csrf
          <div class="row">
                <div class="col-lg-12 px-lg-5 py-lg-3">
                  <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Refunds Quantity</label>
                      <input type="text" name="product_quantity" class="form-control" value="{{ $refundsedit->product_quantity }}" placeholder="Product Quantity">
                      <input type="hidden" name="transfer_id" value="{{ $refundsedit->transfer_id }}">
                      <input type="hidden" name="old_product_quantity" value="{{ $refundsedit->product_quantity }}">
                      <input type="hidden" name="product_id" value="{{ $refundsedit->product_id }}">
                      <input type="hidden" name="product_cost" value="{{ $refundsedit->product_cost }}">
                      <input type="hidden" name="product_price" value="{{ $refundsedit->product_price }}">
                      <input type="hidden" name="client_id" value="{{ $refundsedit->client_id }}">
                      
                    </div>
                </div>
          </div>
          <div class="text-right">  
          <button type="submit" class="btn btn-primary" style="margin: 2%;">Update refunds</button>
          </div>
      </form>
      <!-- Card footer -->
    </div>
  </div>

@endsection