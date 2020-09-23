<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		::-webkit-scrollbar {
			width: 0px; 
			background: transparent;
		}

		.navbar{
			background-color: white !important;
		}

		body{
			background-color: #f3f6fc !important;
			font-family: 'Montserrat';font-size: 14px;
		}

		thead {
			background-color: #6059f6;
			color: white;
			border-radius: 10px;
		}

		.montserrat {
			font-family: "Montserrat";
		}

		.card .badge{
			border-radius: 10px;
			border: 1px solid white;
		}

		.myRounded{
			border-radius: 10px;
		}
		
		.myBorder{
			border-color: #2868e3 !important;
		}

		.pengguna{
			color: #f7a494;
		}

		.bg-pengguna{
			background-color: #ffdbd4;
			border: 1px solid #ffdbd4;
		}

		.group{
			color: #2868e3;
		}
		
		.bg-group{
			background-color: #b3cbf9;
			border: 1px solid #b3cbf9;
		}

		.ide{
			color: #4db6ac;
		}
		
		.bg-ide{
			background-color: #bceae5;
			border: 1px solid #bceae5;
		}

		.diskusi{
			color: #fbbb6a;
		}
		
		.bg-diskusi{
			background-color: #ffe6c7;
			border: 1px solid #ffe6c7;
		}

		#hover:hover #badgeIconSquare {
			background-color: white;
		}

		#hover:hover  #badgeIcon{
			color: #2868e3;
		}

		#hover:hover #badgeNew{
			color: white;
			border-color: white !important
		}

		#hover:hover #adminName{
			color: white;
		}

		.hover:hover {
			background-color: #2868e3;
			color: white;
			cursor: pointer;
		}

		.black{
			color: black;
		}

		.ui-autocomplete {
			position:absolute;
			cursor:default;
			z-index:1001 !important
		}
	</style>
	@include('admin.layouts.includes.head')

	@yield('css')

	@include('admin.layouts.includes.script')
</head>

<body>

	<!-- Main navbar -->
	@include('admin.layouts.includes.navbar')
	<!-- /main navbar -->

	<!-- Page header -->
	<div class="page-header">
		<div class="page-content  d-flex">
		</div>
	</div>
	<!-- /Page header -->


	<div class="page-content pt-0">

		<!-- Main sidebar -->
		@include('admin.layouts.includes.sidebar')
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
	@include('admin.layouts.includes.footer')
	<!-- /footer -->

	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
		
</body>
</html>
