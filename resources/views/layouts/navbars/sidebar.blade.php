<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('PGSO') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <!-- <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }} -->
          <i class="material-icons">person</i>
          <p>{{ __('User') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <!-- <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li> -->
          </ul>
        </div>
      </li>
  
   
      <li class="nav-item{{ $activePage == 'AIP' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('AIP') }}">
          <i class="material-icons"></i>
            <p>{{ __('AIP') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Assets' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('Assets') }}">
          <i class="material-icons"></i>
            <p>{{ __('Assets') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'GPSS' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('GPSS') }}">
          <!-- <i class="material-icons">location_ons</i> -->
          <i class="material-icons"></i>
            <p>{{ __('GPSS') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'HDC' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('HDC') }}">
          <i class="material-icons"></i>
            <p>{{ __('HDC') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Health' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('Health') }}">
          <i class="material-icons"></i>
            <p>{{ __('Health') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'SSS' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('SSS') }}">
          <i class="material-icons"></i>
            <p>{{ __('SSS') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'SW' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('SW') }}">
          <i class="material-icons"></i>
            <p>{{ __('SW') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'ESS' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('ESS') }}">
          <i class="material-icons"></i>
            <p>{{ __('ESS') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Others' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('Others') }}">
          <i class="material-icons"></i>
            <p>{{ __('Others') }}</p>
        </a>
      </li>
    
     
      <li class="nav-item">
       
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="material-icons">logout</i>
          <p>{{ __('Logout') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
