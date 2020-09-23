<!-- Main sidebar -->
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
				<h6 class="card-title"></h6>
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
							  
						</div>

						<div class="media-body">
							<div class="media-title font-weight-semibold" ><h1 class="mb-0 font-weight-black">{{Auth::user()->role }}</h1></div>
							<div class="font-size-xs opacity-50">
								<h3><i class="icon-magazine font-size-sm"></i> Admin</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /user menu -->

			
			<!-- Main navigation -->
			<div class="card-body p-0">
				<ul class="nav nav-sidebar" data-nav-type="accordion">
					<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Layout options"></i></li>
					<li class="nav-item"><a href="{{URL::to('/admin')}}" class="nav-link"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
					<li id="penduduk" class="nav-item"><a href="{{URL::to('/admin/penduduk')}}" class="nav-link"><i class="icon-vcard"></i> <span>Data Penduduk</span></a></li>
					<li id="penerimaBantuan" class="nav-item nav-item-submenu">
						<a class="nav-link"><i class="icon-users"></i> <span>Penerima Bantuan</span></a>
						<ul id="subPenerimaBantuan" class="nav nav-group-sub" data-submenu-title="Page layouts">
							<li id="semuaData" class="nav-item"><a href="{{URL::to('/admin/penerima')}}" class="nav-link">Semua Data</a></li>
							<li id="sembako" class="nav-item"><a href="{{URL::to('/admin/penerimaSembako')}}" class="nav-link">Bantuan Sembako </a></li>
							<li id="raskin" class="nav-item"><a href="{{URL::to('/admin/penerimaRaskin')}}" class="nav-link">Bantuan Raskin</a></li>
							<li id="blt" class="nav-item"><a href="{{URL::to('/admin/penerimaBLT')}}" class="nav-link">BLT</a></li>
							<li id="pnpmm" class="nav-item"><a href="{{URL::to('/admin/penerimaPNPMM')}}" class="nav-link">PNPM Mandiri</a></li>
							<li class="nav-item"><a href="#" class="nav-link">•••</a></li>
							<li id="verifikasi" class="nav-item"><a href="{{URL::to('/admin/verifikasi')}}" class="nav-link">Verifikasi</a></li>
						</ul>
					</li>
					<li class="nav-item"><a href="{{URL::to('/admin/pengaduan')}}" class="nav-link"><i class="icon-clipboard3"></i> <span>Pengaduan</span></a></li>
					<li id="parameter" class="nav-item nav-item-submenu">
						<a href="#" class="nav-link"><i class="icon-list2"></i> <span>Parameter</span></a>

						<ul id="subParameter" class="nav nav-group-sub" data-submenu-title="Page layouts">
							<li id="golongan" class="nav-item"><a href="{{URL::to('/admin/parameter/golongan')}}" class="nav-link">Golongan Penerima Bantuan</a></li>
							<li id="agama" class="nav-item"><a href="{{URL::to('/admin/parameter/agama')}}" class="nav-link">Agama</a></li>
							<li id="jenisBantuan" class="nav-item"><a href="{{URL::to('/admin/parameter/jenis_bantuan')}}" class="nav-link">Jenis Bantuan</a></li>
						</ul>
					</li>
					<li class="nav-item"><a href="{{URL::to('/admin/artikel')}}" class="nav-link"><i class="icon-newspaper"></i> <span>Artikel</span></a></li>
				</ul>
			</div>
			<!-- /main navigation -->

		</div>
	</div>
	<!-- /sidebar content -->
	
</div>
<!-- /main sidebar -->