@extends('admin.admin_master')

@section('admin')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



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



<div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Stocks Views </h3>
          </div>
          <div class="col-4 text-right">
            <button type="button" class="btn btn-sm btn-outline-success">Total value: {{ $totalstocksviewvalue }} AZN</button>
          </div>
        </div>
      </div>


      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">ID</th>
              <th scope="col" class="sort" data-sort="budget">Name</th>
              <th scope="col" class="sort" data-sort="budget">Quantity</th>
              <th scope="col" class="sort" data-sort="budget">Size</th>
              {{--  <th scope="col" class="sort" data-sort="budget">Cost</th>
              <th scope="col" class="sort" data-sort="budget">Price</th>  --}}
              <th scope="col" class="sort" data-sort="budget">T. Cost</th>
              <th scope="col" class="sort" data-sort="budget">T. Price</th>
              <th scope="col"></th>
            </tr>
          </thead>
            {{-- @php
                $total = 0;
            @endphp --}}
          <tbody class="list">
           @foreach ($stocksviews as $key=>$row)
             
            <tr>
              <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $row->product_id }}</span>
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
                  <span class="status">{{ $row->product_size }} m</span>
                </span>
              </td>
              {{--  <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-success"></i>
                  <span class="status">{{ $row->product_cost }} AZN</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-success"></i>
                  <span class="status">{{ $row->product_price }} AZN</span>
                </span>
              </td>   --}}
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->total_cost }} ₼</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->total_price }} ₼</span>
                </span>
              </td> 

              {{--  <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-success"></i>
                  <span class="status">
                    @php
                    $totaln = $row->stock_quantity * $row->product_cost * $row->stock_size;
                    @endphp
                    {{ ($totaln) }} AZN
                    {{ $row->total_cost }}
                    {{ $productcost }}
                  </span>
                </span>
              </td>  --}}
              

   

              <td class="text-right">                
{{--  <a href="" type="button" class="btn-sm btn-warning">Show</a>  --}}
<a href="{{ URL::to('/admin/show/stocksproductslists/'.$row->product_id) }}" class="table-action" data-toggle="tooltip" data-original-title="View Products" style="padding-right: 15%; font-size:120%;"><i class="fas fa-eye"></i></a>
{{-- <a href=""class="table-action" data-toggle="tooltip" data-original-title="Show Stock"><i class="fas fa-user-edit"></i></a> --}}
           
</td>
            </tr>

            @endforeach

           
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{--  {{ $stocksviews->links("pagination::bootstrap-4") }}  --}}
      </div>
    </div>
  </div>


 </html>  


@endsection