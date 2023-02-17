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
            <h3 class="mb-0">Sellers </h3>
          </div>
          <div class="col-4 text-right">


              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Add Sellers</button>
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
        <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h3 class="mb-0">Add Sellers</h3>
                </div>
                <form role="form" method="POST" action="{{ route('add.sellers') }}">
                  @csrf

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Seller Name</label>
                        <input type="text" name="seller_name" id="input-first-name" class="form-control" placeholder="Seller Name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Seller Surname</label>
                          <input type="text" name="seller_surname" id="input-first-name" class="form-control" placeholder="Seller Surname">
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Seller City</label>
                        <input type="text" name="seller_city" id="input-first-name" class="form-control" placeholder="Product Cost">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Seller Phone</label>
                        <input type="tel" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits"  name="seller_phone" id="input-last-name" class="form-control" placeholder="Seller Price">
                      </div>
                    </div>
                  </div>

                  <input type="hidden" checked name="seller_status" value="0">
  


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
              {{-- <th scope="col" class="sort" data-sort="name">Sort Number</th> --}}
              <th scope="col" class="sort" data-sort="name">ID</th>
              <th scope="col" class="sort" data-sort="budget">Name</th>
              <th scope="col" class="sort" data-sort="budget">Surname</th>
              <th scope="col" class="sort" data-sort="budget">City</th>
              <th scope="col" class="sort" data-sort="budget">Phone</th>
              <th scope="col" class="sort" data-sort="budget">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
           @foreach ($sellers as $key=>$row)
             
            <tr>
              {{-- <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $key +1 }}</span>
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
                  <span class="status">{{ $row->seller_name }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->seller_surname }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->seller_city }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->seller_phone }}</span>
                </span>
              </td>
              <td scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">
                      @if ($row->seller_status == 0)
                      <a href="{{ URL::to('/active/sellers/'.$row->id) }}" type="button" title="Active"
                        class="btn-sm btn-outline-danger"><i class="ni ni-bold-down"></i></a>
                      @else
                      <a href="{{ URL::to('/deactive/sellers/'.$row->id) }}" type="button" title="Deactive" 
                        class="btn-sm btn-outline-info"><i class="ni ni-like-2"></i></a>
                      @endif
                    </span>
                  </div>
                </div>
              </td>


              <td class="text-right">                
<a href="{{ URL::to('/admin/edit/sellers/'.$row->id) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit seller"><i class="fas fa-user-edit"></i></a>
<a href="{{ URL::to('/admin/delete/sellers/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->seller_name }} {{ $row->seller_surname }} Sellers?')" class="table-action table-action-delete" style="padding-left: 25%" data-toggle="tooltip" data-original-title="Delete seller"><i class="fas fa-trash"></i></a>
              </td>
            </tr>

            @endforeach

           
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $sellers->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>



    </html>  


@endsection