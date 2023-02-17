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
            <h3 class="mb-0">Productions </h3>
          </div>
          <div class="col-4 text-right">


              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form"><i class="ni ni-fat-add"></i> Add Productions</button>
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
        <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h3 class="mb-0">Add Productions</h3>
                </div>
                <form role="form" method="POST" action="{{ route('add.productions') }}">
                  @csrf

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Product Name</label>
                        <input type="text" name="product_name" id="input-first-name" class="form-control" placeholder="Product Name">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Product Code</label>
                        <input type="number" name="product_code" id="input-last-name" class="form-control" placeholder="Product Code">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Product Size</label>
                        <input type="number" name="product_size" id="input-last-name" class="form-control" placeholder="Product Size">
                      </div>
                    </div>
                  </div>
{{--  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Product Cost</label>
                        <input type="number" name="product_cost" id="input-first-name" class="form-control" placeholder="Product Cost">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Product Price</label>
                        <input type="number" name="product_price" id="input-last-name" class="form-control" placeholder="Product Price">
                      </div>
                    </div>
                  </div>  --}}

                  <input type="hidden" checked name="product_status" value="1">
                  {{--  <input type="hidden" checked name="product_price_status" value="1">  --}}
  


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
              <th scope="col" class="sort" data-sort="id">ID</th>
              <th scope="col" class="sort" data-sort="name">Name</th>
              <th scope="col" class="sort" data-sort="code">Code</th>
              <th scope="col" class="sort" data-sort="size">Size</th>
              {{--  <th scope="col" class="sort" data-sort="budget">Cost</th>
              <th scope="col" class="sort" data-sort="budget">Price</th>  --}}
              <th scope="col" class="sort" data-sort="status">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
           @foreach ($productions as $key=>$row)
             
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
                  <span class="font-weight-bold" style="color:#233dd2;" >{{ $row->product_name }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_code }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->product_size }}</span>
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
              </td>  --}}
              {{--  <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-success"></i>
                  <span class="status">{{ $row->product_status }}</span>
                </span>
              </td>  --}}

              <td scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">
                      @if ($row->product_status == 0)
                      <a href="{{ URL::to('/active/productions/'.$row->id) }}" type="button" title="Active"
                        class="btn-sm btn-outline-danger"><i class="ni ni-bold-down"></i></a>
                      @else
                      <a href="{{ URL::to('/deactive/productions/'.$row->id) }}" type="button" title="Deactive" 
                        class="btn-sm btn-outline-info"><i class="ni ni-like-2"></i></a>
                      @endif
                    </span>
                  </div>
                </div>
              </td>


              <td class="text-right">                
<a href="{{ URL::to('/admin/edit/productions/'.$row->id) }}" class="table-action"><i class="fas fa-user-edit"></i></a>
<a href="{{ URL::to('/admin/delete/productions/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->product_name }} Productions?')"  class="table-action table-action-delete" style="padding-left: 25%"><i class="fas fa-trash"></i></a>
              </td>
            </tr>

            @endforeach

           
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $productions->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>

  


    </html>  


@endsection