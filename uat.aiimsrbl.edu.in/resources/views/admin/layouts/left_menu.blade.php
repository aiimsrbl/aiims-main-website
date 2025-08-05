@php
  $leftMenu = left_menue();
@endphp

<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar">
  <div class="side-header">
    <a class="header-brand " href="{{route('admin.dashboard')}}">
      <img src="{{ asset('assets/images/brand/header-logo.png') }}" class="header-brand-img light-logo" alt="Jobslist logo">
      <img src="{{ asset('assets/images/brand/header-logo.png') }}" class="header-brand-img dark-logo" alt="AIIMS logo">
      <img src="{{ asset('assets/images/brand/header-logo.png') }}" class="header-brand-img toggle-logo" alt="AIIMS logo">
    </a>
  </div>
  <div class="app-sidebar__user clearfix">
    <div class="dropdown user-pro-body">
      <div>

          @php
            $user = Auth::user();
          @endphp
        
        @if(isset($user->image) && file_exists(storage_path().'/app/public/admin/profile/'.$user->image))
          <img class="avatar avatar-md brround" src="{{ route('image.displayImage',['p'=>'admin/profile/'.$user->image]) }}" alt="img">
        @else
          <img src="{{ asset('assets/images/users/male/25.jpg') }}" alt="user-img" class="avatar avatar-lg brround">
        @endif

        <a href="{{route('admin.user.profile')}}" class="profile-img">
          <span class="fa fa-pencil" aria-hidden="true"></span>
        </a>
      </div>
      <div class="user-info">
        <h2>{{ Auth::user()->name }}</h2>
        <span>{{ Auth::user()->email }}</span>
      </div>
    </div>
  </div>
  <ul class="side-menu">
    @if(count($leftMenu) > 0)
      @foreach($leftMenu as $menu)
      <li class="slide">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{($menu['url']!='#')?url($menu['url']):'#'}}">
          <i class="side-menu__icon {{$menu['icon_class']}}"></i>
          <span class="side-menu__label">{{$menu['name']}}</span>
          @if($menu['sub_menue'])
            <i class="angle fa fa-angle-right"></i>
          @endif
        </a>
       @if($menu['sub_menue'])
        <ul class="slide-menu">
          @foreach($menu['sub_menue'] as $sub)
            <li>
            
              <a class="slide-item" href="{{url($sub['url'])}}"><i class="side-menu__icon fa fa-list-ul"></i>{{$sub['name']}}</a>
            </li>
          @endforeach
        </ul>
        @endif
      </li>
      @endforeach
    @endif
  </ul>
</aside>