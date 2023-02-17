@extends('admin.admin_master')

@section('admin')

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
            <h3 class="mb-0">Edit Productions ID Number:{{ $productions->id }}</h3>
          </div>
          <div class="col-4 text-right">


              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Add Productions</button>
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
        <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h3 class="mb-0">Add Category</h3>
                </div>
                <form role="form" method="POST" action="{{ route('add.productions') }}">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Product Name</label>
                        <input type="text" name="product_name" id="input-first-name" class="form-control" placeholder="Product Name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Product Code</label>
                        <input type="number" name="product_code" id="input-last-name" class="form-control" placeholder="Product Code">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Product Cost</label>
                        <input type="number" name="product_cost" id="input-first-name" class="form-control" placeholder="Product Cost">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Product Price</label>
                        <input type="number" name="product_price" id="input-last-name" class="form-control" placeholder="Product Price">
                      </div>
                    </div>
                  </div>

                  <input type="hidden" checked name="product_status" value="0">
  

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Add</button>
                    </div>
                </form>
            </div>
        </div>
        
     
                </div>
            </div>
        </div>
          </div>

            {{--  <a href="#!" class="btn btn-sm btn-primary">Add category</a>  --}}
          </div>
        </div>
      </div>
      <!-- Light table -->
      <form action="{{ url('/admin/update/productions/'.$productions->id) }}" method="POST">
        @csrf
   <div class="row">
      <div class="col-lg-6 px-lg-5 py-lg-3">
        <div class="form-group">
            <label class="form-control-label" for="input-first-name">Product Name</label>
        <input type="text" name="product_name" class="form-control" value="{{ $productions->product_name }}" placeholder="Productions Name">
        </div>
    </div>
    <div class="col-lg-3 px-lg-5 py-lg-3">
        <div class="form-group">
            <label class="form-control-label" for="input-first-name">Product Code</label>
      <input type="number" name="product_code" class="form-control" value="{{ $productions->product_code }}" placeholder="Productions Code">
        </div>
    </div>
    <div class="col-lg-3 px-lg-5 py-lg-3">
      <div class="form-group">
          <label class="form-control-label" for="input-first-name">Product Size</label>
      <input type="number" name="product_size" class="form-control" value="{{ $productions->product_size }}" placeholder="Productions Size">
      </div>
  </div>   
</div>


    <div class="text-right">  
    <button type="submit" class="btn btn-primary" style="margin: 2%;">Update Productions</button>
    </div>
      </form>


      <!-- Card footer -->

    </div>
  </div>




@endsection