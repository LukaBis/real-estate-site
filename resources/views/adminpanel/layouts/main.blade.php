<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/libs/css/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/home">Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Admin</h5>
                                </div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  <i class="fas fa-sign-out-alt"></i>
                                  Logout
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                      @csrf
                                  </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">{{ __('Dashboard') }}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                {{ __('Menu') }}
                            </li>
                            <li class="nav-item ">
                                <a
                                  class="nav-link @if(Request::is('home/properties') || Request::is('home/property/*')) active @endif"
                                  href="/home/properties">
                                  <i class="fa fa-home"></i>
                                  {{ __('Properties') }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a
                                  class="nav-link @if(Request::is('home/agents') || Request::is('home/agent/*')) active @endif"
                                  href="/home/agents">
                                  <i class="fa fa-user"></i>
                                  {{ __('Agents') }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a
                                  class="nav-link @if(Request::is('home/testemonials') || Request::is('home/testemonial/*')) active @endif"
                                  href="/home/testemonials">
                                  <i class="fa fa-child "></i>
                                  {{ __('Testemonials') }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a
                                  class="nav-link @if(Request::is('home/add-property')) active @endif"
                                  href="/home/add-property">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
                                  {{ __('Add Property') }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a
                                  class="nav-link @if(Request::is('home/add-agent')) active @endif"
                                  href="/home/add-agent">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
                                  {{ __('Add Agent') }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a
                                  class="nav-link @if(Request::is('home/add-testemonial')) active @endif"
                                  href="/home/add-testemonial">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
                                  {{ __('Add Testemonial') }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a
                                  class="nav-link @if(Request::is('home/about')) active @endif"
                                  href="/home/about">
                                  <i class="fa fa-edit" aria-hidden="true"></i>
                                  {{ __('About') }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a
                                  class="nav-link @if(Request::is('home/contact')) active @endif"
                                  href="/home/contact">
                                  <i class="fa fa-edit" aria-hidden="true"></i>
                                  {{ __('Contact') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end left sidebar -->
        <!-- wrapper  -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="/assets/libs/js/main-js.js"></script>
    <script type="text/javascript">
    // make textarea responsive to text inside
    $('textarea').each(function () {
      this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function () {
      this.style.height = 'auto';
      this.style.height = (this.scrollHeight) + 'px';
    });
    </script>
</body>

</html>
