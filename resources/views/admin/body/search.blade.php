@extends('admin.admin_master')

@section('admin')
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}

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

  {{-- <div class="card bg-default">
    <div class="card-header bg-transparent">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
          <h5 class="h3 text-white mb-0">Sales value</h5>
        </div>
        <div class="col">
          <ul class="nav nav-pills justify-content-end">
            <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}" data-prefix="$" data-suffix="k">
              <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                <span class="d-none d-md-block">Month</span>
                <span class="d-md-none">M</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}" data-prefix="$" data-suffix="k">
              <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                <span class="d-none d-md-block">Week</span>
                <span class="d-md-none">W</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!-- Chart -->
      <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <!-- Chart wrapper -->
        <canvas id="chart-sales-dark" class="chart-canvas chartjs-render-monitor" style="display: block; height: 350px; width: 674px;" width="1516" height="787"></canvas>
      </div>
    </div>
  </div> --}}






    <div class="card">
      <!-- Card header -->

      {{-- <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form> --}}
      <!-- Card footer -->




      {{-- @foreach ($clients as $post)
      <div class="post-list">
          <p>id:{{ $post->id }} <br>product id:{{ $post->product_id }} 
            <br>Stock Qnt {{ $post->stock_quantity }} <br>Stock size:{{ $post->stock_size }}
            <br>Created at:{{ $post->created_at }}
          </p>
      </div>
  @endforeach --}}
{{-- 
      @if($clients->isNotEmpty())
    @foreach ($clients as $post)
        <div class="post-list">
            <p>{{ $post->client_name }} {{ $post->client_surname }} -  {{ $post->client_store }} {{ $post->client_phone }}</p>
        </div>
        
    @endforeach
@else 
    <div>
        <h2>No posts found</h2>
    </div>
@endif --}}
    </div>
  </div>


{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>


<div class="m-5 w-50">
    <h1 class="lead">Dependent dropdown example</h1>
    <div class="mb-3">
        <select class="form-select form-select-lg mb-3" id="country">
            <option selected disabled>Select country</option>
            @foreach ($productions as $country)
            <option value="{{ $country->id }}">{{ $country->product_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select form-select-lg mb-3" id="state"></select>
    </div>
    <div class="mb-3">
        <select class="form-select form-select-lg mb-3" id="city"></select>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryId = this.value;
            $('#state').html('');
            $.ajax({
                url: '{{ route('getStates') }}?product_id='+countryId,
                type: 'get',
                success: function (res) {
                    $('#state').html('<option value="">Select State</option>');
                    $.each(res, function (key, value) {
                        $('#state').append('<option value="' + value
                            .product_id + '">' + value.product_cost + '</option>');
                    });
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        });
        $('#country').on('change', function () {
            var countryId = this.value;
            $('#city').html('');
            $.ajax({
                url: '{{ route('getCities') }}?product_id='+countryId,
                type: 'get',
                success: function (res) {
                    $('#city').html('<option value="">Select City</option>');
                    $.each(res, function (key, value) {
                        $('#city').append('<option value="' + value
                            .product_id + '">' + value.product_price + '</option>');
                    });
                }
            });
        });
    });
</script>



@endsection