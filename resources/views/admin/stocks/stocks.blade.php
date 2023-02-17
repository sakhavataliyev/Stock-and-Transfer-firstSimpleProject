@extends('admin.admin_master')

@section('admin')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

{{--  @php
        $productions = DB::table('productions')->get();
        $stocks = DB::table('stocks')
        ->join('productions','stocks.product_id','productions.id')
        ->join('productions_prices','stocks.id','productions_prices.id')
        ->select('stocks.*','productions.product_name','productions_prices.product_cost','productions_prices.product_price')
        ->latest('id')
        ->paginate(10);
@endphp  --}}

{{--  <script type="text/javascript">
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
          $.each(data, function(key, value){
          
          $('select[name="product_cost"]').append('<option value="'+ value.id + '">' + value.product_cost + '</option>');

          });
          },
        });

      }else{
        alert('danger');
      }

        });
  });

</script>  --}}



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
          var d =$('select[name="stock_size"]').empty();
          var a =$('select[name="product_cost"]').empty();
          var c =$('select[name="product_price"]').empty();
          $.each(data, function(key, value){
          
          $('select[name="stock_size"]').append('<option value="'+ value.product_size + '">' + value.product_size + '</option>');
          
          $('select[name="product_cost"]').append('<option value="'+ value.product_cost + '">' + value.product_cost + '</option>');

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




{{-- <script type="text/javascript">
  $(document).ready(function(){
 $('select[name="product_cost"]').on('change',function(){
      var product_cost = $(this).val();
      if (product_cost) {
        
        $.ajax({
          url: "{{ url('/get/productpricecost/') }}/"+product_cost,
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

</script> --}}







<div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col-5">
            <h3 class="mb-0">Stocks </h3>
          </div>
          <div class="col-7 text-right">

            <button type="button" class="btn btn-sm btn-outline-default btn-sm">T.Cost: {{ $totalstocksvalue }} AZN</button>
            <button type="button" class="btn btn-sm btn-outline-primary btn-sm">T.Price: {{ $totalstocksvaluep }} AZN</button>
            <button type="button" class="btn btn-sm btn-outline-primary btn-sm">Income: {{ $income }} AZN</button>
              
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Add Stocks</button>
              
            
              
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
        <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h3 class="mb-0">Add Stocks</h3>
                </div>
                <form role="form" method="POST" action="{{ route('add.stocks') }}">
                  @csrf

                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Product Name</label>
                            
                            <select class="form-control" name="product_id">
                              <option>Choose Product Name</option>
                                @foreach ($productions as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                @endforeach 
                                </select>
                          </div>
                        </div>

                       

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Stock Quantity</label>
                              <input type="number" name="stock_quantity" id="input-first-name" class="form-control" placeholder="Stock quantity">
                            </div>
                          </div>
                      </div>


                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="id">Product Size</label>
                            <select class="form-control" name="stock_size">
                
                          </select>

                          {{-- <input type="number" name="stock_quantity" id="input-first-name" class="form-control" placeholder="Stock quantity"> --}}
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="id">Product Cost</label>
                            <select class="form-control" name="product_cost">
                
                          </select>
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="id">Product Price</label>
                            <select class="form-control" name="product_price">
                
                          </select>
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

            {{--  <a href="#!" class="btn btn-sm btn-primary">Add category</a>  --}}
          </div>
        </div>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              {{-- <th scope="col" class="sort" data-sort="name">Sort</th> --}}
              <th scope="col" class="sort" data-sort="name">ID</th>
              <th scope="col" class="sort" data-sort="budget">Name</th>
              <th scope="col" class="sort" data-sort="budget">Quantity</th>
              <th scope="col" class="sort" data-sort="budget">Size</th>
              <th scope="col" class="sort" data-sort="budget">Cost</th>
              <th scope="col" class="sort" data-sort="budget">Price</th>
              <th scope="col" class="sort" data-sort="budget">T. Cost</th>
              <th scope="col" class="sort" data-sort="budget">T. Price</th>
              <th scope="col"></th>
            </tr>
          </thead>
            {{-- @php
                $total = 0;
            @endphp --}}
          <tbody class="list">
           @foreach ($stocks as $key=>$row)
             
            <tr>
              {{-- <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $stocks->firstItem()+$loop->index }}</span>
                  </div>
                </div>
              </th> --}}
              <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $row->id }}</span>
                  </div>
                </div>
              </th>

              <td>
                <span class="badge badge-dot mr-4">
                  <span class="font-weight-bold" style="color:#233dd2;" >{{ $row->product_name }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->stock_quantity }} p</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->stock_size }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_cost }} AZN</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_price }} AZN</span>
                </span>
              </td>

              
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">
                    @php
                    $totalcs = $row->stock_quantity * $row->stock_size * $row->product_cost;
                    @endphp
                    {{ ($totalcs) }} AZN
                    {{--  {{ $row->total_cost }}  --}}
                  </span>
                </span>
              </td>

              <td>
                <span class="badge badge-dot mr-4">
                  {{--  <i class="bg-success"></i>  --}}
                  <span class="status">
                    @php
                    $totalprc = $row->stock_quantity * $row->stock_size * $row->product_price;
                    @endphp
                    {{ ($totalprc) }} AZN
                    {{--  {{ $row->total_cost }}  --}}
                  </span>
                </span>
              </td>
              

              

              <td class="text-right">                
{{--  <a href="{{ URL::to('/admin/edit/stocks/'.$row->id) }}"  type="button" class="btn-sm btn-warning">Edit</a>  --}}
{{--  <a href="{{ URL::to('/admin/edit/stocks/'.$row->id) }}" class="btn btn-sm btn-warning btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
  <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
  <span class="btn-inner--text">Edit</span>
</a>  --}}
{{--  <a href="{{ URL::to('/admin/delete/stocks/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->product_name }} stocks?')"  type="button" class="btn-sm btn-primary" style="color:white;">Delete</a>  --}}
{{--  <a href="{{ URL::to('/admin/delete/stocks/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->product_name }} stocks?')" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
  <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
  <span class="btn-inner--text">Delete</span>
</a>  --}}

<a href="{{ URL::to('/admin/edit/stocks/'.$row->id) }}"class="table-action" data-toggle="tooltip" data-original-title="Edit Stock"><i class="fas fa-user-edit"></i></a>
<a href="{{ URL::to('/admin/delete/stocks/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->product_name }} stock?')"   type="button" class="table-action table-action-delete"  style="padding-left: 25%" data-toggle="tooltip" data-original-title="Delete Stock"><i class="fas fa-trash"></i></a>
              </td>
            </tr>

            @endforeach

           
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $stocks->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>



    </html>  


@endsection