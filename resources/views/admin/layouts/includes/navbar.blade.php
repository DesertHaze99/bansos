<div class="navbar navbar-expand-md navbar-light">
	<div class="navbar-brand wmin-200" style="margin-left:3vw">
		<a href="{{URL::to('/')}}" class="d-inline-block d-flex align-items-center">
			<img src="{{url('/')}}/upload/image/logo.png" class="rounded-circle mr-2" height="45" style="width:35px; height:35px"  alt="">
			<h1 class="mb-0 font-weight-black" style="color:#6059f6">Dinas Sosial</h1>
		</a>
		
	</div>

	<div class="d-md-none py-2">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-user"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3" style="color:#6059f6"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">

		<span class=" badge bg-success-400 ml-md-auto mr-md-2">Active</span>

		<ul class=" navbar-nav">

			<li class="hover nav-item dropdown dropdown-user">
				<a id="hover" href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="{{url('/')}}/upload/image/admin.png" class="rounded-circle mr-2" height="45" alt="">
					<h6 id="adminName" class="mb-0 font-weight-semibold">{{Auth::user()->first_name }} {{ Auth::user()->last_name}}</h6>
				</a>
				
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
						<i class="icon-switch2"></i> {{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
		</ul>
	</div>
</div>