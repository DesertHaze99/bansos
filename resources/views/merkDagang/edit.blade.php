@extends('layouts.app')

@section('content')
	{{-- start breadcrumb --}}
	<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Ubah merk dagang</h2>
		            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/merkDagang')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Merk dagang</a>
			            <span class="breadcrumb-item active">Edit</span>
			        </div>
			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>
			</div>
		</div>
	{{-- end breadcrumb --}}
	
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Merk dagang</h5>
			<div class="header-elements">
				<div class="list-icons">
            		<a class="list-icons-item" data-action="collapse"></a>
            		<a class="list-icons-item" data-action="reload"></a>
            		<a class="list-icons-item" data-action="remove"></a>
            	</div>
        	</div>
		</div>

		<div class="card-body">
			<form action="{{ route('merkDagang.update',$merkDagang->id_merek_dagang) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label>Obat</label>
					<select class="form-control" name="obat">
						<option>1</option>
						<option>2</option>
					</select>
				</div>
				<div class="form-group">
					<label>Merk dagang name:</label>
					<input type="text" class="form-control" placeholder="Silahkan masukan nama mek dagang" value="{{ $merkDagang->merek_dagang_name }}" name="merkDagangName">
				</div>
				<div class="text-right">
					<button class="btn btn-warning" action="{{ URL::to('/merkDagang') }}">Back</button>
					<button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
				</div>
			</form>
		</div>
	</div>
@endsection
