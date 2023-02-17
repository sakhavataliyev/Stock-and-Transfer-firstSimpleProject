@extends('admin.admin_master')

@section('admin')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

@php
    $transfers = DB::table('transfers')->where('transfer_status',1)->orderBy('id', 'DESC')->get();
    $clients = DB::table('clients')->where('client_status',1)->get();
    $productions = DB::table('productions')->where('product_status',1)->get();
    // $stocks = DB::table('stocks_views')->get();
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
            var d =$('select[name="product_cost"]').empty();
            $.each(data, function(key, value){
            
            $('select[name="product_price"]').append('<option value="'+ value.product_price + '">' + value.product_price + '</option>');
            $('select[name="product_cost"]').append('<option value="'+ value.product_cost + '">' + value.product_cost + '</option>');
  
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
          <div class="col-8">
            <h3 class="mb-0">Refunds </h3>
          </div>
          <div class="col-4 text-right">

              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Add Refunds</button>
              
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
        <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h3 class="mb-0">Add Refunds</h3>
                </div>
                <form role="form" method="POST" action="{{ route('add.refunds') }}">
                  @csrf
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Transfer Name</label>
                            <select class="form-control" name="transfer_id">
                              {{--  <option>Choose Transfer Name</option>  --}}
                                @foreach ($transfers as $transfer)
                                    <option value="{{ $transfer->id }}">{{ $transfer->transfer_name }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Client Store</label>
                              <select class="form-control" name="client_id">
                                <option>Choose Client Store</option>
                                  @foreach ($clients as $client)
                                      <option value="{{ $client->id }}">{{ $client->client_store }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                    </div>

                  <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Product Name</label>
                          <select class="form-control" name="product_id">
                            <option>Choose Product Name</option>
                              @foreach ($productions as $production)
                              <option value="{{ $production->id }}">{{ $production->product_name }}</option>
                              @endforeach 
                              </select>
                        </div>
                      </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-control-label" for="id">Product Cost</label>
                              <select class="form-control" name="product_cost">
                            </select>
                        </div>
                      </div>

                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-control-label" for="id">Product Price</label>
                              <select class="form-control" name="product_price">
                            </select>
                        </div>
                      </div>
                      </select>

                    <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Product Quantity</label>
                          <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="product_quantity" id="input-first-name" class="form-control" placeholder="Transfer Name">
                        </div>
                      </div>
                  </div>

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
    </div>
  </div>
</div>

      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              {{--  <th scope="col" class="sort" data-sort="name">Sort</th>  --}}
              <th scope="col" class="sort" data-sort="name">ID</th>
              <th scope="col" class="sort" data-sort="budget">Transfer Name</th>
              <th scope="col" class="sort" data-sort="budget">Client Store</th>
              <th scope="col" class="sort" data-sort="budget">Product Name</th>
              <th scope="col" class="sort" data-sort="budget">Quantity</th>
              <th scope="col" class="sort" data-sort="budget">Size</th>
              <th scope="col" class="sort" data-sort="budget">Cost</th>
              <th scope="col" class="sort" data-sort="budget">Price</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
           @foreach ($refunds as $key=>$row)
            <tr>
              {{--  <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $transfersproducts->firstItem()+$loop->index }}</span>
                  </div>
                </div>
              </th>  --}}

              <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $row->id }}</span>
                  </div>
                </div>
              </th>

              <td>
                <span class="badge badge-dot mr-4">
                  <span class="font-weight-bold" style="color:#5e72e4;" >{{ $row->transfer_name }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="font-weight-bold" style="color:#131314;" >{{ $row->client_store }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_name }}</span>
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
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_cost }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_price }}</span>
                </span>
              </td>
              <td class="text-right">
                      <a href="{{ URL::to('/admin/edit/refunds/'.$row->id) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit Refunds"><i class="fas fa-user-edit"></i></a>
                      <a href="{{ URL::to('/admin/delete/refunds/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->transfer_name }} transfers?')"  type="button" class="table-action table-action-delete"  style="padding-left: 25%" data-toggle="tooltip" data-original-title="Delete Refunds"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $refunds->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>
</html>  

@endsection