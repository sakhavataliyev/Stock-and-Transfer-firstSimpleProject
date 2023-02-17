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
            <h3 class="mb-0">Clients </h3>
          </div>
          <div class="col-4 text-right">
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Add Clients</button>
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
        <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h3 class="mb-0">Add Clients</h3>
                </div>
                <form role="form" method="POST" action="{{ route('add.clients') }}">
                  @csrf

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Client Name</label>
                        <input type="text" name="client_name" id="input-first-name" class="form-control" placeholder="Seller Name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Client Surname</label>
                          <input type="text" name="client_surname" id="input-first-name" class="form-control" placeholder="Seller Surname">
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Client City</label>
                        <input type="text" name="client_city" id="input-first-name" class="form-control" placeholder="Product Cost">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Client Phone</label>
                        <input type="tel" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits"  name="client_phone" id="input-last-name" class="form-control" placeholder="Seller Price">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Client Store</label>
                        <input type="text" name="client_store" id="input-first-name" class="form-control" placeholder="Product Cost">
                      </div>
                    </div>
                  </div>


                  <input type="hidden" checked name="client_status" value="0">
  


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



      {{--  @if($clients->isNotEmpty())
      @foreach ($clients as $post)
          <div class="post-list">
              <p>{{ $post->client_name }} {{ $post->client_surname }} -  {{ $post->client_store }} {{ $post->client_phone }}</p>
          </div>
      @endforeach
      @else 
          <div>
              <h2>No posts found</h2>
          </div>
      @endif  --}}




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
              <th scope="col" class="sort" data-sort="budget">Store</th>
              <th scope="col" class="sort" data-sort="budget">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
           @foreach ($clients as $key=>$row)
             
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
                  <span class="status">{{ $row->client_name }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_surname }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_city }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_phone }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_store }}</span>
                </span>
              </td>
              <td scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">
                      @if ($row->client_status == 0)
                      <a href="{{ URL::to('/active/clients/'.$row->id) }}" type="button" title="Active"
                        class="btn-sm btn-outline-danger"><i class="ni ni-bold-down"></i></a>
                      @else
                      <a href="{{ URL::to('/deactive/clients/'.$row->id) }}" type="button" title="Deactive" 
                        class="btn-sm btn-outline-info"><i class="ni ni-like-2"></i></a>
                      @endif
                    </span>
                  </div>
                </div>
              </td>


              <td class="text-right">                
{{--  <a href="{{ URL::to('/admin/edit/clients/'.$row->id) }}"  type="button" class="btn-sm btn-warning">Edit</a>
<a href="{{ URL::to('/admin/delete/clients/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->product_name }} clients?')"  type="button" class="btn-sm btn-primary" style="color:white;">Delete</a>  --}}

<a href="{{ URL::to('/admin/edit/clients/'.$row->id) }}"  class="table-action" data-toggle="tooltip" data-original-title="Edit Client"><i class="fas fa-user-edit"></i></a>
<a href="{{ URL::to('/admin/delete/clients/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->client_store }} client?')"   type="button" class="table-action table-action-delete"  style="padding-left: 25%" data-toggle="tooltip" data-original-title="Delete Client"><i class="fas fa-trash"></i></a>

</td>
            </tr>

            @endforeach

           
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $clients->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>



    </html>  


@endsection