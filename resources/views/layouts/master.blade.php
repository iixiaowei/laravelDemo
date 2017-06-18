<!DOCTYPE html>
<html>
<head>
	<title>App Name - @yield('title')</title>
</head>
<body>
	@section('sidebar')
		This is the master sidebar
	@show

	<div class="contains">
		@yield('content')	
	</div>

</body>
</html>