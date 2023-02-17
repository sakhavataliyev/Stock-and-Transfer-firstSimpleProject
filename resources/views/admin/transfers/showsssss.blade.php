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
                <h3 class="mb-0">Transfer information </h3>
              </div>
              <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Download Pdf</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>

              <h6 class="heading-small text-muted mb-4">Short Transfer information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Transfer Name</label>
                      {{--  <input type="text" id="input-username" class="form-control" placeholder="Seller name" value="{{ $transferseller->seller_name }}">  --}}
                      <span class="description form-control">{{ $transferpro->transfer_name }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Seller Name</label>
                      <span class="description form-control">{{ $transferseller->seller_name }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Seller Surname</label>
                      <span class="description form-control">{{ $transferseller->seller_surname }}</span>
                      {{--  @foreach ($transferclients as $key=>$row)
                      <span class="description form-control">{{ $row->client_name }}</span>
                      @endforeach  --}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Client Name</label>
                      {{--  <span class="description form-control">{{ $transferclients->client_name }}</span>  --}}
                      <span class="description form-control">
                      {{--  @foreach ($transferclients as $key=>$row)
                      {{ $row->client_name }}, 
                      @endforeach  --}}
                    </span>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">City</label>
                      <span class="description form-control">{{ $transferseller->seller_city }}</span>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Phone</label>
                      <span class="description form-control">{{ $transferseller->seller_phone }}</span>
                    </div>
                  </div>
                </div>
              </div>



              <h6 class="heading-small text-muted mb-4">Client information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Store</label>
                      <span class="description form-control">{{ $transferclients->client_store }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Name</label>
                      {{--  <input type="text" id="input-username" class="form-control" placeholder="Seller name" value="{{ $transferseller->seller_name }}">  --}}
                      <span class="description form-control">{{ $transferclients->client_name }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Surname</label>
                      <span class="description form-control">{{ $transferclients->client_surname }}</span>
                    </div>
                  </div>
                {{--  </div>
                <div class="row">  --}}
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">City</label>
                      <span class="description form-control">{{ $transferclients->client_city }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Phone</label>
                      <span class="description form-control">{{ $transferclients->client_phone }}</span>
                    </div>
                  </div>
                </div>
              </div>


              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Contact information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Address</label>
                      <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-city">City</label>
                      <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Country</label>
                      <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Postal code</label>
                      <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code">
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <!-- Description -->
              <h6 class="heading-small text-muted mb-4">About me</h6>
              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">About Me</label>
                  <textarea rows="4" class="form-control" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> 
    </div> 
    <!-- Footer -->

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#inpic').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) 
            {
                $('#showpic').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>


@endsection