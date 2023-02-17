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
                <h3 class="mb-0">{{$backtransfers->transfer_name}} - {{$backtransfers->created_at}} </h3>
              </div>
              <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Download Pdf</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            {{-- <form> --}}

              <h6 class="heading-small text-muted mb-4">Short Transfer information</h6>
              <div class="pl-lg-4">
               
 

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Transfer Name</label>
                      {{--  <input type="text" id="input-username" class="form-control" placeholder="Seller name" value="{{ $transferseller->seller_name }}">  --}}
                      <span class="description form-control">{{ $transfer->transfer_name }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Seller Name</label>
                      <span class="description form-control">{{ $transfer->seller_name }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Seller Surname</label>
                      <span class="description form-control">{{ $transfer->seller_surname }}</span>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Seller City</label>
                        <span class="description form-control">{{ $transfer->seller_city }}</span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Seller Phone</label>
                        <span class="description form-control">{{ $transfer->seller_phone }}</span>
                      </div>
                    </div>

                  </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Clients</label>
                        @foreach ($clients as $client)
                              <span class="description form-control">{{ $client->client_name }} {{ $client->client_surname }} - <b>
                                {{--  <a href="{{ URL::to('/admin/transfers/'.$transfer->id.'/'.$client->id ) }}">{{ $client->client_store }}</a>
                                <a href="{{ URL::to('/admin/view/transfers/'.$transferpro->id.'/'.$transferpro->client_id) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit seller">{{ $client->client_store }}</a>  --}}
                                {{ $client->client_store }}
                                {{-- <a href="{{route('clients.transfers',['id'=>$clients->id,'id'=>$clients->id])}}">View</a> --}}
                              </b> 
                                {{-- <a href="'/admin/transfers/' . {{ $cate->id }} . '/' . {{ $cate->slug }}" class="row author-content px-0">View</a> --}}
                                {{-- <a href="{{ URL::to('/admin/transfers/'.$transfer->id.'/'.$client->id ) }}"  type="button" class="btn-sm btn-success">{{ $client->client_store }}</a> --}}
                             
                                {{-- <a href="{{ URL::to('/admin/view/transfers/'.$transferpro->id.'/'.$transferpro->client_id) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit seller"><i class="fas fa-user-edit"></i></a> --}}
                              </span>
                              <br>
                        @endforeach    

                    </div>
                  </div>  
                </div>  


{{--  
         @foreach ($transferpro as $transferpro)
   
                <div class="row">

                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Client id</label>
                        <span class="description form-control">{{ $transferpro->client_id }}</span>
                      </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Product id</label>
                          <span class="description form-control">{{ $transferpro->product_id }}</span>
                        </div>
                      </div>

                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">product cost</label>
                          <span class="description form-control">{{ $transferpro->product_cost }}</span>
                        </div>
                      </div>

                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">product price</label>
                          <span class="description form-control">{{ $transferpro->product_price }}</span>
                        </div>
                      </div>

                      <div class="col-lg-2">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">product quantity</label>
                          <span class="description form-control">{{ $transferpro->product_quantity }}</span>
                        </div>
                      </div>

                  </div>
                  @endforeach  --}}
              </div>
           
     


              <h6 class="heading-small text-muted mb-4">Client and Product information</h6>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Sort</th>
                      <th scope="col" class="sort" data-sort="name">Client Store</th>
                      <th scope="col" class="sort" data-sort="budget">Product Name</th>
                      <th scope="col" class="sort" data-sort="budget">P.Cost</th>
                      {{-- <th scope="col" class="sort" data-sort="budget">P.Price</th> --}}
                      <th scope="col" class="sort" data-sort="budget">P.Quantity</th>
                      <th scope="col" class="sort" data-sort="budget">Total</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
        
                  <tbody class="list">
                    @foreach ($transferpros as $key=>$transferpro)
                
                    <tr>
                      
                      
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $transferpros->firstItem()+$loop->index }}</span>
                          </div>
                        </div>
                      </th>
        
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $transferpro->client_store }}</span>
                            <p class="text-xs text-secondary mb-0 font-weight-bold" style="color: #5e72e4 !important;">{{ $transferpro->client_name }} {{ $transferpro->client_surname }}</p>
                            
                          </div>
                        </div>
                      </th>
        
                      <td>
                        <span class="badge badge-dot mr-4">
                          
                          <span class="status">{{ $transferpro->product_name }}</span>
                          <p class="text-xs text-secondary mb-0 font-weight-bold" style="color: #5e72e4 !important;">{{ $transferpro->product_price }} ₼</p>
                            
                        </span>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <span class="status font-weight-bold">{{ $transferpro->product_cost }} ₼</span>
                        </span>
                      </td>
                      {{-- <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-success"></i>
                          <span class="status">{{ $transferpro->product_price }}</span>
                        </span>
                      </td> --}}
                      <td>
                        <span class="badge badge-dot mr-4">
                          <span class="status font-weight-bold">{{ $transferpro->product_quantity }}</span>
                        </span>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <span class="status font-weight-bold" style="color:#233dd2;">
                            @php
                            $totalprices = $transferpro->product_size * $transferpro->product_price * $transferpro->product_quantity;
                            @endphp
                            {{ ($totalprices) }} ₼

                          </span>
                        </span>
                      </td>

                      <td class="text-right">                
                        <a href="{{ URL::to('/admin/view/transfers/'.$transferpro->id.'/'.$transferpro->client_id) }}" class="table-action" data-toggle="tooltip" data-original-title="View Client Product" style="font-size: 120%;"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>        
                    @endforeach

                  </tbody>
                </table>
              </div>
              
              <div class="card-footer py-4 text-right">
                {{--  {{ $transferpros->links("pagination::bootstrap-4") }}  --}}
                <span class="status"><b>Total Price:</b> <b style="color:#5e72e4">{{ $alltot }} ₼ </b></span>
              </div>




              <hr class="my-4" />
              <!-- Address -->
       

                    <!-- Light table -->
    <h6 class="heading-small text-muted mb-4">Refunds information</h6>
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
      <div class="card-footer py-4 text-right">
        {{--  {{ $transferpros->links("pagination::bootstrap-4") }}  --}}
        <span class="status"><b>Total Price:</b> <b style="color:#5e72e4">{{ $alltotalrefunds }} ₼ </b></span>
      </div>

      <hr class="my-4" />
      <div class="card-footer py-4 text-center">
        {{--  {{ $transferpros->links("pagination::bootstrap-4") }}  --}}
        <span class="status"><b>All Total:</b> <b style="color:#5e72e4">{{ $alltotalselling }} ₼ </b></span>
      </div>
<hr class="my-4" />
            {{-- </form> --}}
          </div>
        </div>
      </div> 
    </div> 
    <!-- Footer -->



@endsection