@extends('admin.admin_master')

@section('admin')

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <!-- Page content -->
    <div class="row">
     
       <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">
                  {{-- @foreach ($clientstore as $key=>$clientstores)
                         {{ $clientstores->client_name }}
                  @endforeach --}}
                 {{$clientstore->client_store}} - {{$clientstore->client_name}}
                </h3>
               
              </div>
              <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Download Pdf</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4"> </h6>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Sort</th>
                      <th scope="col" class="sort" data-sort="name">Product Name</th>
                      <th scope="col" class="sort" data-sort="budget">Product Price</th>
                      <th scope="col" class="sort" data-sort="budget">P.Size</th>
                      <th scope="col" class="sort" data-sort="budget">P.Quantity</th>
                      <th scope="col" class="sort" data-sort="budget">Total</th>
                    </tr>
                  </thead>
        
                  <tbody class="list">
                    @foreach ($clientstransfers as $key=>$transferpro)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{++$key}}</span>
                          </div>
                        </div>
                      </th>
        
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $transferpro->product_name }}</span>
                          </div>
                        </div>
                      </th>
        
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $transferpro->product_price }} ₼</span>
                          </div>
                        </div>
                      </th>
                      
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $transferpro->product_size }}</span>
                          </div>
                        </div>
                      </th>

                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $transferpro->product_quantity }}</span>
                          </div>
                        </div>
                      </th>

                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-success"></i>
                          <span class="status">
                            @php
                            $totalprices = $transferpro->product_size * $transferpro->product_price * $transferpro->product_quantity;
                            @endphp
                            {{ ($totalprices) }} 
                            AZN
                          </span>
                        </span>
                      </td>
                    </tr>
        
                    @endforeach
        
                   
                  </tbody>
                </table>
              </div>
              
              <div class="card-footer py-4 text-right">
                {{--  {{ $transferpros->links("pagination::bootstrap-4") }}  --}}
                <span class="status"><b>Total Price:</b> <b style="color:#5e72e4">{{ $alltot }} AZN </b></span>
              </div>




              <hr class="my-4" />
              <!-- Address -->
       

            </form>
          </div>
        </div>
      </div> 
    </div> 
    <!-- Footer -->



@endsection