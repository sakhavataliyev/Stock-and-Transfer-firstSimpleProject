@extends('user.user_master')

@section('user')


  <!-- Page content -->
    <div class="row">
       <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Change Password </h3>
              </div>
              <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('user.pass.update') }}">
                @csrf
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="current_password">Current Password</label>
                          <input type="password" id="current_password" name="oldpassword" class="form-control" placeholder="Old Password">
                        </div>
                      </div>
                    </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="password">New Password</label>
                      <input type="password" id="password" name="password" class="form-control" placeholder="New Password">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="password_confirmation">Confirm Password</label>
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Save</button>
                     </div>
                  </div>
                </div>
              </div> 
            </form>
          </div>
        </div>
      </div> 
    </div>
    <!-- Footer -->


@endsection