<!-- app-header---->
<div class="app-header1 header py-1 d-flex sticky">
  <div class="container-fluid">
    <div class="d-flex">
      <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0);"></a>
      <a class="logo-horizontal " href="{{route('admin.dashboard')}}">
        <img src="{{ asset('assets/images/brand/header-logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
        <img src="{{ asset('assets/images/brand/header-logo.png') }}" class="header-brand-img dark-logo" alt="AIIMS logo">
      </a>
      
      <div class="d-flex order-lg-2 ms-auto  header-right">
        <button class="navbar-toggler navresponsive-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
        </button>
        <div class="p-0 mb-0 navbar navbar-expand-lg  responsive-navbar navbar-dark  ">
          <div class="navbar-collapse collapse" id="navbarSupportedContent-4">
            <div class="d-flex">
              <div class="dropdown  d-flex">
                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                  <span class="dark-layout mt-0">
                    <i class="fe fe-moon"></i>
                  </span>
                  <span class="light-layout mt-0">
                    <i class="fe fe-sun"></i>
                  </span>
                </a>
              </div>
              <div class="header-navicon">
                <a href="javascript:void(0);" data-bs-toggle="search" class="nav-link d-lg-none navsearch-icon">
                  <i class="fe fe-search"></i>
                </a>
              </div>
              <!-- Theme-Layout -->
              <div class="dropdown d-md-flex">
                <a class="nav-link icon full-screen-link">
                  <i class="fe fe-maximize-2" id="fullscreen-button"></i>
                </a>
              </div>
              <div class="dropdown">
                <a href="javascript:void(0);" class="nav-link pe-0 leading-none user-img" data-bs-toggle="dropdown">
                  @php
                    $user = Auth::user();
                  @endphp

                  @if(isset($user->image) && file_exists(storage_path().'/app/public/admin/profile/'.$user->image))
                    <img class="avatar avatar-md brround" src="{{ route('image.displayImage',['p'=>'admin/profile/'.$user->image]) }}" alt="img">
                  @else
                    <img src="{{ asset('assets/images/users/male/25.jpg') }}" alt="profile-img" class="avatar avatar-md brround">
                  @endif
                  
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
                  <a class="dropdown-item" href="{{route('admin.user.profile')}}">
                    <i class="dropdown-icon icon icon-user"></i>
                    My Profile
                  </a>
                  <a class="dropdown-item" href="{{route('admin.user.logout')}}">
                    <i class="dropdown-icon icon icon-power"></i> 
                    Log out
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- app-header End---->
