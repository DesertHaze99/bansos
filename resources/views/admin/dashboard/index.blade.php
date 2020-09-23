@extends('admin.layouts.app')


@section('content')
<div class="row margin">
	<div class="col-xl-12">
		<!-- Top Banner -->
		<div class="row">
			<a class="col-lg-3 col-md-6 col-sm-6 black" href="#">
				<div id="hover" class="card text-left " >
					<div  class="card-body hover">
						<div   class="mb-0">
							<span id="badgeIconSquare" class="badge badge-icon bg-pengguna" ><i id="badgeIcon" class="pengguna far fa-user"></i></span>
							<span class="px-1 font-weight-black margin d-block" style="font-size: 18px"><b>10</b></span>
							<span class="px-1 font-size-base d-block">Pengguna</span>
						</div>
					</div>
				</div>
			</a>

			<a class="col-lg-3 col-md-6 col-sm-6 black" href="#">
				<div id="hover" class="card text-left " >
					<div class="card-body hover">
						<div  class="mb-0">
							<span id="badgeIconSquare" class="badge badge-icon bg-group" ><i id="badgeIcon" class="group far fa-copy"></i></span>
							<span class="px-1 font-weight-black margin d-block" style="font-size: 18px"><b>20</b></span>
							<span class="px-1 font-size-base d-block">Group</span>
						</div>
					</div>
				</div>
			</a>

			<a class="col-lg-3 col-md-6 col-sm-6 black" href="#">
				<div id="hover" class="card text-left  " >
					<div class="card-body hover">
						<div  class="mb-0">
							<span id="badgeIconSquare" class="badge badge-icon bg-ide" ><i id="badgeIcon" class="ide far fa-lightbulb"></i></span>
							<span class="px-1 font-weight-black margin d-block" style="font-size: 18px"><b>30</b></span>
							<span class="px-1 font-size-base d-block">Ide</span>
						</div>
					</div>
				</div>
			</a>

			<a class="col-lg-3 col-md-6 col-sm-6 black" href="#">
				<div id="hover" class="card text-left " >
					<div class="card-body hover">
						<div  class="mb-0">
							<span id="badgeIconSquare" class="badge badge-icon bg-diskusi" ><i id="badgeIcon" class="diskusi far fa-comments "></i></span>
							<span class="px-1 font-weight-black margin d-block" style="font-size: 18px"><b>40</b></span>
							<span class="px-1 font-size-base d-block">Diskusi</span>
						</div>
					</div>
				</div>
			</a>
			
		</div>
		<!-- /Top Banner -->
	</div>
</div>
	<!-- Quick stats boxes -->
<div class="row">
	<div class="col-lg-3">
		<div class="card bg-teal-400">
			<div class="card-body">
				<div class="d-flex">
					<h3 class="font-weight-semibold mb-0">0</h3>
					<span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span>
            	</div>
            	<div>
					Resep Baru
				</div>
			</div>
			<div class="container-fluid">
				<div id="members-online"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card bg-pink-400">
			<div class="card-body">
				<div class="d-flex">
					<h3 class="font-weight-semibold mb-0">0</h3>
            	</div>
            	<div>
					Pasien Baru
				</div>
			</div>
			<div id="server-load"></div>
		</div>
	</div>
</div>
@endsection

@section('librariesJS')
<!-- Core JS files -->
<script src="{{ asset('template/limitless/Template/global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('template/limitless/Template/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/limitless/Template/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('template/limitless/Template/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('template/limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

<script src="{{ asset('template/limitless/Template/layout_1/LTR/default/full/assets/js/app.js') }}"></script>
<script src="{{ asset('template/limitless/Template/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
<!-- /theme JS files -->

@endsection

@section('head')
	
@endsection
