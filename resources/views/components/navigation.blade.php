<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
  <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
      aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <a class="navbar-brand text-brand" href="/">Estate<span class="color-b">Agency</span></a>
    <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
      data-target="#navbarTogglerDemo01" aria-expanded="false">
      <span class="fa fa-search" aria-hidden="true"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a
            class="nav-link @if(Request::segment(2) == '') active @endif"
            href="/">
            {{ __('Home') }}
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link @if(Request::segment(2) == 'about') active @endif"
            href="/{{ app()->getLocale() }}/about">
            {{ __('About') }}
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link @if(Request::segment(2) == 'properties') active @endif"
            href="/{{ app()->getLocale() }}/properties">
            {{ __('Property') }}
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{ __('Languages') }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($languages as $language)
                <a class="dropdown-item" href="/{{ $language->iso }}">{{ $language->name }}</a>
            @endforeach
          </div>
        </li>
        <li class="nav-item">
          <a
          class="nav-link nav-link @if(Request::segment(2) == 'contact') active @endif" 
          href="/{{ app()->getLocale() }}/contact">
            {{ __('Contact') }}
          </a>
        </li>
      </ul>
    </div>
    <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
      data-target="#navbarTogglerDemo01" aria-expanded="false">
      <span class="fa fa-search" aria-hidden="true"></span>
    </button>
  </div>
</nav>
<!--/ Nav End /-->
