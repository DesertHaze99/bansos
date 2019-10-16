<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.includes.head')
	@yield('header')

	@include('layouts.includes.script')
</head>

<body>

	<!-- Main navbar -->
	@include('layouts.includes.navbar')
	<!-- /main navbar -->


	<!-- Page header -->
	@include('layouts.includes.breadcrumb')
	<!-- /page header -->
		

	<!-- Page content -->
	<div class="page-content pt-0">

		<!-- Main sidebar -->
		@include('layouts.includes.menu')
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				@yield('content')
			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<!-- Footer -->
	@include('layouts.includes.footer')
	<!-- /footer -->
		
</body>
</html>
