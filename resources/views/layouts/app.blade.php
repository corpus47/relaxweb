<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('img/AdminLTELogo.png')}}"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="{{asset('img/AdminLTELogo.png')}}"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        @if( Auth::user()->is_good() )
                            <a href="{{ route('good.profile') }}" class="btn btn-default btn-flat">Profil</a>
                        @elseif( Auth::user()->is_superadmin() )
                            <a href="{{ route('superadmin.profile') }}" class="btn btn-default btn-flat">Profil</a>
                        @elseif( Auth::user()->is_admin() )
                            <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">Profil</a>
                        @elseif( Auth::user()->is_user() )
                            <a href="{{ route('user.profile') }}" class="btn btn-default btn-flat">Profil</a>
                        @endif
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Kilépés
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @isset($title)
                        <h1>{{ $title }}</h1>
                    @endisset
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Kezdőlap</a></li>
                    <li class="breadcrumb-item active">@isset($title){{$title}}@endisset</li>
                </ol>
                </div>
            </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <!--<b>Version</b> 3.0.5-->
        </div>
        <strong>Copyright &copy; 2022 <a href="https://relaxkonyveloprogram.hu">relaxkonyveloprogram.hu</a>.</strong> Minden jog fenntartva!
    </footer>
</div>

<!-- Success Modal alert -->
<div class="modal fade" id="SuccessModal" tabindex="-1" role="dialog" aria-labelledby="AlertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="exampleModalLabel">Figyelmeztetés</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezárás</button>
        </div>
      </div>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>

@yield('third_party_scripts')

@stack('page_scripts')

@if (Session::has('success'))
<script>
$(document).ready(function(){
    $('#SuccessModal').find('.modal-body').html('{!! Session::get('success') !!}');
    $('#SuccessModal').modal('show');
})
</script>
@endif

</body>
</html>
