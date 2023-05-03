<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="{{ asset('img/Logo.png') }}"/>
  <title>@yield('title')</title>
  @include('admin.style')
  <style type="text/css">
    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
  @include('admin.header')
<div class="container-fluid">
  <div class="row">
  <!-- <div class="md:flex"> -->
    @include('admin.sidebar')
    @yield('content')
  </div>
</div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  @include('admin.footer')
<!-- </div> -->
</div>

@include('admin.script')
@yield('script')
</body>
</html>