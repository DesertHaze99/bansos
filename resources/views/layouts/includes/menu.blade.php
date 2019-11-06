<div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		<span class="font-weight-semibold">Main sidebar</span>
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">
		<div class="card card-sidebar-mobile">

			<!-- Header -->
			<div class="card-header header-elements-inline">
				<h6 class="card-title">Navigation</h6>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
					</div>
				</div>
			</div>
			
			<!-- User menu -->
			<div class="sidebar-user">
				<div class="card-body">
					<div class="media">
						<div class="mr-3">
							<a href="#"><img src="{{ asset('limitless/Template/global_assets/images/placeholders/placeholder.jpg') }}" width="38" height="38" class="rounded-circle" alt=""></a>
						</div>

						<div class="media-body">
							<div class="media-title font-weight-semibold">Victoria Baker</div>
							<div class="font-size-xs opacity-50">
								<i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
							</div>
						</div>

						<div class="ml-3 align-self-center">
							<a href="#" class="text-white"><i class="icon-cog3"></i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- /user menu -->

			
			<!-- Main navigation -->
			<div class="card-body p-0">
				<ul class="nav nav-sidebar" data-nav-type="accordion">

					<!-- Main -->
					<li class="nav-item-header mt-0"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
					<li class="nav-item">
						<a href="index.html" class="nav-link active">
							<i class="icon-home4"></i>
							<span>
								Dashboard
								<span class="d-block font-weight-normal opacity-50">No active orders</span>
							</span>
						</a>
					</li>
					<br>
					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="icon-eyedropper2"></i>
							<span>
								<span class="d-block font-weight-normal opacity-50">Menu infromasi obat</span>
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ URL::to('/obat') }}" class="nav-link"><span>Obat</span></a>
					</li>
					<li class="nav-item">
						<a href="{{ URL::to('/interaksi') }}" class="nav-link"><span>Interaksi</span></a>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="{{ URL::to('/bentukObat') }}" class="nav-link"><span>Bentuk Obat</span></a>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="{{ URL::to('/merkDagang') }}" class="nav-link"><span>Merk Dagang Obat</span></a>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="{{ URL::to('/dosis') }}" class="nav-link"><span>Dosis Obat</span></a>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="{{ URL::to('/kontraindikasi') }}" class="nav-link"><span>Kontraindikasi</span></a>
					</li>
					<br>
					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="icon-height"></i>
							<span>
								<span class="d-block font-weight-normal opacity-50">Menu pasien dan resep</span>
							</span>
						</a>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="{{ URL::to('/pasien') }}" class="nav-link"><span>Pasien</span></a>
					</li>
					<li class="nav-item nav-item-submenu">
						<a href="{{ URL::to('/resep') }}" class="nav-link"><span>Resep</span></a>
					</li>
					<!-- /main -->

					
						
				</ul>
			</div>
			<!-- /main navigation -->

		</div>
	</div>
	<!-- /sidebar content -->
	
</div>
<!-- /main sidebar -->
