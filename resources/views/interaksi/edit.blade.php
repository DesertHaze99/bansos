@extends('layouts.app')

@section('content')
	{{-- start breadcrumb --}}
	<div class="card">
		<div class="card-header">
			<div class="page-header-content header-elements-md-inline">
				<div class="page-title d-flex">
					<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Interaksi</span> - Edit</h4>
				</div>
			</div>
			<div class="breadcrumb page-header-content">
				<a href="{{ URL::to('/interaksi') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Interaksi</a>
				<span class="breadcrumb-item active">Edit</span>
			</div>
		</div>
	</div>
	{{-- end breadcrumb --}}
	
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Interaksi</h5>
			<div class="header-elements">
				<div class="list-icons">
            		<a class="list-icons-item" data-action="collapse"></a>
            		<a class="list-icons-item" data-action="reload"></a>
            		<a class="list-icons-item" data-action="remove"></a>
            	</div>
        	</div>
		</div>

		<div class="card-body">
			<form action="{{ route('interaksi.update',$interaksi->interaksi_id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label>Interaksi name:</label>
					<input type="text" class="form-control" value="{{ $interaksi->interaksi_name }}" placeholder="Silahkan masukan interaksi yang dinginkan" name="interaksiName">
				</div>
				<div class="text-right">
					<button class="btn btn-warning" action="{{ URL::to('/interaksi') }}">Back</button>
					<button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
				</div>
			</form>
		</div>
	</div>
@endsection
