<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<link rel="icon" href=""/>
  	@include('general.style')
  	@yield('style')
  	
	<title>@yield('title')</title>
</head>
<body>
	@include('general.header')
	@yield('content')
	@include('general.footer')
	@include('general.script')
	@yield('script')
</body>
</html>