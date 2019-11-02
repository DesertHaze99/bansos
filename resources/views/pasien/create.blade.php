@extends('layouts.app')

	@section('content')
		{{-- start breadcrumb --}}
		<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Tambah pasien baru</h2>
		            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/pasien')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>pasien</a>
			            <span class="breadcrumb-item active">Create</span>
			        </div>
			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>
			</div>
		</div>
		{{-- end breadcrumb --}}
		
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Pasien</h5>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
                		<a class="list-icons-item" data-action="reload"></a>
                		<a class="list-icons-item" data-action="remove"></a>
                	</div>
            	</div>
			</div>

			<div class="card-body">
				<form action="{{ route('pasien.store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Nama Pasien :</label>
						<input type="text" class="form-control" placeholder="Silahkan masukan nama pasien" name="nama">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin :</label>
						<input type="text" class="form-control" placeholder="Silahkan masukan jenis kelamin pasien" name="jenis_kelamin">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir :</label>
						<input type="date" class="form-control" placeholder="Silahkan masukan tanggal lahir pasien" name="tanggal_lahir">
					</div>
					<div class="form-group">
						<label>No Telepon :</label>
						<input type="text" class="form-control" placeholder="Silahkan masukan nomor telepon pasien" name="no_telp">
					</div>
					<div class="form-group">
						<label>Alamat :</label>
						<input type="text" class="form-control" placeholder="Silahkan masukan alamat pasien" name="alamat">
					</div>
					<div class="text-right">
						<button class="btn btn-warning" action="{{ URL::to('/pasien') }}">Back</button>
						<button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
					</div>
				</form>
			</div>
		</div>
	@endsection
@section('librariesJS')
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
@endsection
@section('script')
@endsection