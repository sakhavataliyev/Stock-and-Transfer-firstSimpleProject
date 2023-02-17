  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          {{--  <img src="{{ asset('adminbackend/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">  --}}
          <div><i class="ni ni-button-power" style="font-weight: 900;font-size: 140%;color: rgb(94 114 228 / 50%);"></i>
            <span class="float-right" style="font-weight: 800;color: #5e72e4;">Managment</span></div>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>

{{--         
          <li class="nav-item dropdown">
              <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ni ni-settings-gear-65"></i>
                 <span class="nav-link-text">Settings</span>
                 
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                <a class="dropdown-item" href="{{ route('admin.productions') }}">
                  <i class="ni ni-planet text-orange"></i>
                  <span class="nav-link-text">Category</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.productions') }}">
                  <i class="ni ni-planet text-orange"></i>
                  <span class="nav-link-text">Category</span>
                </a>
              </div>
          </li> --}}


            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.categories') }}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Category</span>
              </a>
            </li> --}}

          <li class="nav-item dropdown">
            <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Productions</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
              <a class="dropdown-item" href="{{ route('admin.productions') }}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Productions List</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('admin.productions.prices') }}">
                <i class="ni ni-planet text-green"></i>
                <span class="nav-link-text">Productions Price</span>
              </a>
            </div>
        </li>



          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.sellers') }}">
              <i class="ni ni-single-02 text-red"></i>
              <span class="nav-link-text">Sellers</span>
            </a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.clients') }}">
                <i class="ni ni-world-2 text-primary"></i>
                <span class="nav-link-text">Clients</span>
              </a>
          </li>

 

          <li class="nav-item dropdown">
            <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-spaceship text-yellow"></i>
               <span class="nav-link-text">Stocks</span>
                {{-- <span class="nav-link-inner--text d-lg-none">Settings</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
              <a class="dropdown-item" href="{{ route('admin.stocks') }}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Add Stocks</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('admin.stocksviews') }}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Stocks</span>
              </a>
            </div>
        </li>



          
          <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.transfers') }}">
                <i class="ni ni-vector text-green"></i>
                <span class="nav-link-text">Transfers</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.transfersproducts') }}">
                <i class="ni ni-bag-17 text-blue"></i>
                <span class="nav-link-text">Transfers Products</span>
              </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.refunds') }}">
              <i class="ni ni-world-2 text-red"></i>
              <span class="nav-link-text">Refunds</span>
            </a>
        </li>
            
    
         
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
        
          <!-- Navigation -->
       
        </div>
      </div>
    </div>
  </nav>