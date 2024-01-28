<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="/viewdashboard">Home</a>
          <a class="sidebar-brand brand-logo-mini" href="/"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>

                <div class="dropdown-divider"></div>
                
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small ">
                       
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                    <a :href="route('logout')"
                       onclick="event.preventDefault();
                                this.closest('form').submit();" class="hover:no-underline hover:text-white bg-gray-900 text-center mx-10 rounded-[25px] text-gray-400 cursor-pointer" >
                       <h1 class=""> 
                        {{ __('Log Out') }}
                        </h1>
                    </a>
                   </form>
            
                    </p>
                  </div>
                

              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">

          <li class="nav-item menu-items">
            <a class="nav-link" href="/productspage">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item menu-items">

          <li class="nav-item menu-items">
            <a class="nav-link" href="/suppliers">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Manage Suppliers</span>
            </a>
          </li>
          <li class="nav-item menu-items">

          <li class="nav-item menu-items">
            <a class="nav-link" href="/customers">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Manage Customers</span>
            </a>
          </li>
          <li class="nav-item menu-items">

          <li class="nav-item menu-items">
            <a class="nav-link" href="/reports">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Reports</span>
            </a>
          </li>
          
           
</ul>
          <div class="flex">
          <a href="/registerdsuppliers" class="hover:no-underline bg-red-600 p-3  m-2 nav-item menu-items hover:text-white hover:bg-red-700">Buy</a>
          <a href="/registerdcustomers" class="hover:no-underline bg-green-600 p-3 m-2 nav-item menu-items hover:text-white hover:bg-green-700">Sell</a>
          </div>
          
          
  </nav>
  @include('admin.scripts')
  </body>
  </html>