<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        
        <!-- Title -->
        <title>@yield('title', 'EMS') | {{ config('app.name', 'EMS') }}</title>
        
        <!-- Fontawesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet">

        <!-- Select2 -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

        <!-- AdminLTE -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- Livewire -->
        <livewire:styles/>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-widget="pushmenu">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{url('logo.png')}}" class="brand-image">
                    <span class="brand-text">EMS</span>
                    <h6>Employee Management System</h6>
                </a>
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image my-auto">
                        @if(Auth::user()->pic === null)
                            <img src="{{url('avatar5.png')}}" class="img-circle elevation-2 ml-4" alt="User Image">
                        @endif
                        @if(Auth::user()->pic !== null)
                            <img src="{{ asset('storage/public/image/'.Auth::user()->pic) }}" class="img-circle elevation-2 ml-4" alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a class="d-block" style="color:white">{{ Auth::user()->name }}</a>
                        <a class="d-block" style="color:yellow">{{ Auth::user()->role }}</a>
                    </div>
                </div>
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Main Menu -->
                            <li class="{{ request()->routeIs(['home', 'divisions', 'positions', 'position-users', 'users']) ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                                <a href="#" class="{{ request()->routeIs(['home', 'divisions', 'positions', 'position-users', 'users']) ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Main Menu <i class="right fas fa-angle-left"></i></p>
                                </a>

                                 <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'nav-link active' : 'nav-link' }}">
                                            <i class="{{ request()->routeIs('home') ? 'fas fa-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                                            <p>Home</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('users') }}" class="{{ request()->routeIs('users') ? 'nav-link active' : 'nav-link' }}">
                                            <i class="{{ request()->routeIs('users') ? 'fas fa-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                                            <p>User</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('divisions') }}" class="{{ request()->routeIs('divisions') ? 'nav-link active' : 'nav-link' }}">
                                            <i class="{{ request()->routeIs('divisions') ? 'fas fa-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                                            <p>Division</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('positions') }}" class="{{ request()->routeIs('positions') ? 'nav-link active' : 'nav-link' }}">
                                            <i class="{{ request()->routeIs('positions') ? 'fas fa-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                                            <p>Position</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('position-users') }}" class="{{ request()->routeIs('position-users') ? 'nav-link active' : 'nav-link' }}">
                                            <i class="{{ request()->routeIs('position-users') ? 'fas fa-circle nav-icon' : 'far fa-circle nav-icon' }}"></i>
                                            <p>User Position</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <main role="main">
                <section class="content-wrapper">
                    <div class="content-header">
                        <div class="container-fluid">
                            <h1 class="m-0 text-dark">@yield('title')</h1>
                        </div>
                    </div>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <aside class="control-sidebar control-sidebar-dark d-none">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </aside>
            <footer class="main-footer">
                <strong>Copyright &copy; 2023.Semarang. All Rights Reserved.</strong>
                <div class="float-right d-none d-sm-inline">
                    <small>Built with <i class="fas fa-heart text-black"></i> <a href="">Destia Arti</a></small>
                </div>
            </footer>
        </div>
        <!-- Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

        <!-- AdminLTE -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>

        <!-- Livewire -->
        <livewire:scripts/>

        

        <!-- Turbolinks -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>