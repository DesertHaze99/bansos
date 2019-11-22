@extends('layouts.app')

@section('content')
	@if ($errors->any())
        <div class="box-body col-12 col-md-12 col-lg-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
	@if (session('error'))
        <div class="box-body">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    {{ session('error') }}
            </div>
        </div>
    @endif
	{{-- start breadcrumb --}}
	<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Ubah dosis</h2>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/dosis')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dosis</a>
			            <span class="breadcrumb-item active">Edit</span>
			        </div>
			    </div>
			</div>
		</div>
	{{-- end breadcrumb --}}
	
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Dosis</h5>
			<div class="header-elements">
				<div class="list-icons">
            		<a class="list-icons-item" data-action="collapse"></a>
            		<a class="list-icons-item" data-action="reload"></a>
            		<a class="list-icons-item" data-action="remove"></a>
            	</div>
        	</div>
		</div>

		<div class="card-body">
			<form action="{{ route('dosis.update',$dosis->dosis_id) }}" method="post" enctype="multipart/form-data">
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
					<label>Dosis name:</label>
					<input type="text" class="form-control" placeholder="Silahkan masukan nama mek dagang" value="{{ $dosis->dosis_value }}" name="dosisValue">
				</div>
				<div class="text-right">
					<a class="btn btn-warning" href="{{ URL::to('/dosis') }}"><i class="fas fa-long-arrow-alt-left mr-1"></i>Back</a>
					<button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
				</div>
			</form>
		</div>
	</div>
@endsection
