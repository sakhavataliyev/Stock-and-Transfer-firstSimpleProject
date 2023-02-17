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
            <h3 class="mb-0">Transfers </h3>
          </div>
          <div class="col-4 text-right">

    
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Add Transfers</button>
              
            
              
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
        <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h3 class="mb-0">Add Transfer</h3>
                </div>
                <form role="form" method="POST" action="{{ route('add.transfers') }}">
                  @csrf





                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Seller Name</label>
                            <select class="form-control" name="seller_id">
                                @foreach ($sellers as $seller)
                                    <option value="{{ $seller->id }}">{{ $seller->seller_name }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                       

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Transfer Name</label>
                              <input type="text" name="transfer_name" id="input-first-name" class="form-control" placeholder="Transfer Name">
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
              <th scope="col" class="sort" data-sort="name">Sort</th>
              {{--  <th scope="col" class="sort" data-sort="name">ID</th>  --}}
              <th scope="col" class="sort" data-sort="budget">Seller Name</th>
              <th scope="col" class="sort" data-sort="budget">Transfer Name</th>
              <th scope="col" class="sort" data-sort="budget">Created At</th>
              {{--  <th scope="col" class="sort" data-sort="budget">Updated At</th>  --}}
              <th scope="col" class="sort" data-sort="budget">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody class="list">
           @foreach ($transfers as $key=>$row)
        
            <tr>
              
              <th>
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $transfers->firstItem()+$loop->index }}</span>
                  </div>
                </div>
              </th>
{{--  
              <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $row->id }}</span>
                  </div>
                </div>
              </th>  --}}

              <td>
                <span class="badge badge-dot mr-3">
                  <span class="font-weight-bold" style="color:#233dd2;" >{{ $row->seller_name }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-3">
                  <span class="status">{{ $row->transfer_name }}</span>
                </span>
              </td>
              

              <td>
                <span class="badge badge-dot mr-3">
                      @if ($row->created_at == NULL)
                          <span class="warning">No Created data...</span>
                      @else
                      <span class="status">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                      @endif
                </span>
              </td>
{{--  
              <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-success"></i>
                      @if ($row->created_at == NULL)
                          <span class="warning">No Updated data...</span>
                      @else
                      <span class="status">{{ \Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</span>
                      @endif
                </span>
              </td>  --}}



            
              <td>
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">
                      @if ($row->transfer_status == 0)
                      {{--  <span class="badge badge-default" style="background-color:#f5365c">Deactive</span>  --}}
                      <a href="{{ URL::to('/active/transfers/'.$row->id) }}" type="button" title="Active"
                        class="btn-sm btn-outline-danger"><i class="ni ni-bold-down"></i></a>
                      @else
                      {{--  <span class="badge badge-default" style="background-color:#11cdef">Active</span>  --}}
                      <a href="{{ URL::to('/deactive/transfers/'.$row->id) }}" type="button" title="Deactive" 
                        class="btn-sm btn-outline-info"><i class="ni ni-like-2"></i></a>
                      @endif
                    </span>
                </div>
              </td>
              
              {{-- <td>
                <span class="badge badge-default" style="background-color:#f5365c">Hot</span>
                <span class="badge badge-default" style="background-color:#5e72e4">Trending</span>
                <span class="badge badge-default" style="background-color:#11cdef">New</span>
            </td> --}}
   

              <td class="text-right"> 
                    <a href="{{ URL::to('/admin/view/transfers/'.$row->id) }}" class="table-action" data-toggle="tooltip" data-original-title="View seller" type="button" class="btn-sm btn-primary" style="padding-right: 15%; font-size:120%;"><i class="ni ni-glasses-2"></i></a>    
                    {{--  <a href="{{ URL::to('/admin/view/transfers/'.$row->id) }}"  type="button" class="btn-sm btn-success">Show</a>             --}}
                    {{--  <a href="{{ URL::to('/admin/edit/transfers/'.$row->id) }}"  type="button" class="btn-sm btn-warning">Edit</a>  --}}
                    <a href="{{ URL::to('/admin/backid/transfers/'.$row->id) }}" class="table-action" data-toggle="tooltip" data-original-title="View Profucts" style="padding-right: 15%; font-size:120%;"><i class="fas fa-eye"></i></a>
                    <a href="{{ URL::to('/admin/backid/transfers/'.$row->id) }}" class="table-action" data-toggle="tooltip" data-original-title="Back transfer" style="padding-right: 15%; font-size:120%;"><i class="ni ni-ungroup"></i></a>
                    <a href="{{ URL::to('/admin/delete/transfers/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->transfer_name }} transfers?')" class="table-action table-action-delete" style="font-size:120%;" data-toggle="tooltip" data-original-title="Delete transfers"><i class="fas fa-trash"></i></a>

                  </td>
            </tr>

            @endforeach

           
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $transfers->links("pagination::bootstrap-4") }}
        
      </div>
    </div>
  </div>



    </html>  


@endsection