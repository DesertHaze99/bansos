@extends('admin.layouts.app')

@section('css')


@endsection


@section('content')

@if ($errors->any())
	<div class="box-body col-12 col-md-12 col-lg-12">
		<div class="alert alert-danger alert-dismissible">
			<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Error!</h4>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif

@if (session('success'))
	<div class="box-body">
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Success!</h4>
				{{ session('success') }}
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


<div class="card">
	<div class="card-header header-elements-inline">
		<h1><b>Data Pengaduan</b></h1>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>

	<table id="tabelPengaduan" class="table datatable-basic table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Email Pengirim</th>
				<th>Tanggal Pengaduan</th>
				<th>Status</th>
				<th class="text-center">Lihat</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>


@foreach($pengaduan as $data)
<div id="edit{{$data->id_pengaduan}}" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="mb-0">Verifikasi Pengaduan</h6>		
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form action="{{Route('verifikasiPengaduan', $data->id_pengaduan)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

					<div class="form-group row">
						<div class="col-lg-6">
							<label>Email Pengirim :</label>
							<input type="text" class="form-control" value="{{$data->email}}" readonly name="email">
						</div>
					</div>

					<div class="form-group">
						<label>Diskripsi Pengaduan :</label>
						<textarea class="form-control" value="{{$data->keterangan}}" readonly name="keterangan">{{$data->keterangan}}</textarea>
					</div>

					<div class="form-group">
						<label>Dokumen yang dilampirkan :</label><br>
						<a href="{{asset($data->attachment)}}" target="_blank"> Lihat dokumen terlampir </a>
					</div>

					<div class="form-group row">
						<div class="col-lg-4">
							<label>Ubah Status : </label>
							<select class="form-control input-sm" name="status_pengaduan">
								<option value="">--Pilih Status Saat Ini--</option>
								@if($data->status_pengaduan == 'diproses')
									<option value="diproses" selected >Sedang Diproses</option>
									<option value="solved" >Solved</option>
								@else
									<option value="diproses" >Sedang Diproses</option>
									<option value="solved" selected >Solved</option>
								@endif
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-sm btn-primary float-right">Simpan<i class="icon-paperplane ml-2"></i></button>
                </form>
            </div>
		</div>
	</div>
</div>
@endforeach


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

@section('script')
	<script>
		$(document).ready(function() {
			console.log("ready");
			$("#tabelPengaduan").DataTable({
				"destroy": true,
				"processing": true,
				"serverSide": true,
				"ajax": {
						'url':"{{ url('pengaduanAJAX') }}",
						'headers':"{{ csrf_token() }}"
						},
				"order": ['0', 'desc'],
				"dataSrc": "data",
				"columns": [
					{data: 'id_pengaduan', name: 'nomor'},
					{data: 'email', name: 'email'},
					{data: 'created_at', name: 'tanggal'},
					{data: 'status_pengaduan', 'targets' : [3], 'render': function(data){
						if(data == 'diproses'){
							return '<span class="badge  bg-primary ml-md-auto mr-md-3" style="border-radius:5px;">Sedang Diproses</span>'
						}  else {
							return '<span class="badge bg-success ml-md-auto mr-md-3" style="border-radius:5px;">Solved</span>'
						}
						
					}},
					{data: 'id_pengaduan', 'targets' : [4], 'render': function(data){
						return '<button type="button" class="btn btn-sm rounded" data-toggle="modal" data-target="#edit'+data+'" ><b><i class="text-primary icon-arrow-right8"></i></b></button>'
					}},
				],
				"fixedColumns": true,
			});

		});
	</script>
@endsection
