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
                <h3 class="mb-0">Edit profile </h3>
              </div>
              <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.profile.save') }}" enctype="multipart/form-data">
                @csrf
              <h6 class="heading-small text-muted mb-4">Admin information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Admin name</label>
                      <input type="text" id="input-username" name="name" class="form-control" placeholder="Admin name" value="{{ $editAdminProfile->name }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email address</label>
                      <input type="email" id="input-email" name="email" class="form-control" placeholder="test@example.com" value="{{ $editAdminProfile->email }}">
                    </div>
                  </div>
                </div>
              
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12 text-center">
                    
                          <img id="showpic" src="{{ (!empty($editAdminProfile->profile_photo_path)) ? url('upload/admin_images/'.$editAdminProfile->profile_photo_path):url('upload/no_image.jpg') }}" width=150px; height=150px; class="rounded-circle">                

                    <div class="form-group">
                        <label class="form-control-label" for="input-picture">Profil Photo</label>
                      <input type="file" name="profile_photo_path" id="inpic" class="form-control">
                    </div>


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