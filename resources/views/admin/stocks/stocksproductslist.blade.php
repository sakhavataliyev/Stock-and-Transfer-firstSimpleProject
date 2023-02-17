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
@foreach ($errors->all() as $errors)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
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
          <div class="col-12">
            <h3 class="mb-0">Products Lists</h3>
          </div>
        </div>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              {{--  <th scope="col" class="sort" data-sort="name">Sort</th>  --}}
              <th scope="col" class="sort" data-sort="name">Name</th>
              <th scope="col" class="sort" data-sort="budget">Product Name</th>
              <th scope="col" class="sort" data-sort="budget">Client Store</th>
              <th scope="col" class="sort" data-sort="budget">Quantity</th>
              <th scope="col" class="sort" data-sort="budget">Size</th>
              <th scope="col" class="sort" data-sort="budget">Cost</th>
              <th scope="col" class="sort" data-sort="budget">Price</th>
              {{-- <th scope="col" class="sort" data-sort="budget">Time</th> --}}
              {{-- <th scope="col"></th> --}}
            </tr>
          </thead>

          <tbody class="list">
           @foreach ($stocksproductslist as $key=>$row)
            <tr>
              {{--  <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $stocksproductslist->firstItem()+$loop->index }}</span>
                  </div>
                </div>
              </th>  --}}

              <th scope="row">
                <div class="media align-items-center">
                    <div class="media-body">
                        <span class="name mb-0 text-sm" style="color:#131314;">{{ $row->transfer_name }}</span>
                        <p class="text-xs text-secondary mb-0 font-weight-light" style="color: #5e72e4 !important;">{{ $row->created_at }}</p>
                      </div>
                </div>
              </th>

              <td>
                <span class="badge badge-dot mr-4">
                  {{-- <span class="font-weight-bold" style="color:#5e72e4;" >{{ $row->product_name }}</span> --}}
                  <span class="font-weight-bold" style="color:#131314;">{{ $row->product_name }}</span>
                          <p class="text-xs text-secondary mb-0 font-weight-light" style="color: #5e72e4 !important;">{{ $row->product_cost }} - {{ $row->product_price }} ₼</p>
                          
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="font-weight-bold" style="color:#131314;" >{{ $row->client_store }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_quantity }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_size }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4" style="color: #5e72e4 !important;">
                    @php
                    $totalcost = $row->product_quantity * $row->product_size * $row->product_cost;
                    @endphp
                    {{ ($totalcost) }} ₼
                  {{-- <span class="status">{{ ($totalcost) }} ₼</span> --}}
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4" style="color: #5e72e4 !important;">
                    @php
                    $totalprice = $row->product_quantity * $row->product_size * $row->product_cost;
                    @endphp
                    {{-- {{ ($totalcs) }} AZN --}}
                  {{ ($totalprice) }} ₼
                </span>
              </td>
              {{-- <td class="text-right">
                      <a href="{{ URL::to('/admin/edit/stocksproductslist/'.$row->id) }}"   class="table-action" data-toggle="tooltip" data-original-title="Edit Transfer Products"><i class="fas fa-user-edit"></i></a>
                      <a href="{{ URL::to('/admin/delete/stocksproductslist/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->product_name }} Transfer Products?')" type="button" class="table-action table-action-delete"  style="padding-left: 25%" data-toggle="tooltip" data-original-title="Delete Transfer Products"><i class="fas fa-trash"></i></a>
              </td> --}}
            </tr>

            @endforeach

          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{-- {{ $stocksproductslist->links("pagination::bootstrap-4") }} --}}
        
      </div>
    </div>
  </div>



    </html>  


@endsection