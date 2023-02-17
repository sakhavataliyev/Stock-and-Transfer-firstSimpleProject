@extends('admin.admin_master')

@section('admin')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

@php
     $sellers = DB::table('sellers')->get();
@endphp


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
            <h3 class="mb-0">Edit Transfers ID Number:{{ $transfers->id }}</h3>
          </div>

        </div>
      </div>
      <!-- Light table -->
      <form action="{{ url('/admin/update/transfers/'.$transfers->id) }}" method="POST">
        @csrf

  <div class="row">

        <div class="col-lg-6 px-lg-5 py-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-first-name">Seller Name</label>
                <select class="form-control" name="seller_id">

                    @foreach ($sellers as $seller)
                    <option value="{{ $seller->id }}"<?php if ($seller->id == $transfers->seller_id) {
                        echo "selected"; } ?> > {{ $seller->seller_name }}</option>
                    @endforeach


                </select>
            </div>
        </div>

        <div class="col-lg-6 px-lg-5 py-lg-3">
            <div class="form-group">
                <label class="form-control-label" for="input-first-name">Transfer Name</label>
                <input type="text" name="transfer_name" class="form-control" value="{{ $transfers->transfer_name }}" placeholder="Stock Size">
            </div>
        </div>

  </div>


 
    <div class="text-right">  
    <button type="submit" class="btn btn-primary" style="margin: 2%;">Update transfer</button>
    </div>
      </form>


      <!-- Card footer -->

    </div>
  </div>




@endsection