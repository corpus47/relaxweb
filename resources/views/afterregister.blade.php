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
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="{{ route('/') }}"><b>RELAX</b>web</a>
  </div>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    @if (session('success'))

                {{ session('success') }}

    @endif
    </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2020 <b><a href="https://adminlte.io" class="text-black">AdminLTE.io</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<script src="{{ mix('js/app.js') }}" defer></script>

@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
