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
		<h1><b>Data Golongan</b></h1>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>

	<button type="button" class="btn rounded" data-toggle="modal" data-target="#tambah" style="max-width: 170px;margin-left:10px;background-color:#6059f6;color:white" >Input Data Baru <i class="icon-list2"></i></button>

	<table id="tabelGolongan" class="table datatable-basic table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Golongan</th>
				<th class="text-center">Lihat</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
</div>


<div id="tambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="mb-0">Tambahkan Data Golongan Baru</h6>		
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form action="{{Route('tambahGolongan')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

					<div class="form-group">
						<div >
							<label>Nama Golongan :</label>
							<input type="text" class="form-control" placeholder="Masukkan nama golongan..." name="golongan">
						</div>
						<div>
							<label>Diskripsi :</label>
							<textarea name="keterangan" type="text" class="form-control" rows="6" placeholder="Masukkan Diskripsi..."></textarea>
						</div>
					</div>
					<button type="submit" class="btn btn-sm btn-primary float-right">Simpan<i class="icon-paperplane ml-2"></i></button>
                </form>
            </div>
		</div>
	</div>
</div>

@foreach($golongan as $data)
<div id="edit{{$data->id_golongan}}" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="mb-0">Ubah Data Golongan</h6>		
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form action="{{Route('editGolongan', $data->id_golongan)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

					<div class="form-group row">
						<div class="col-lg-6">
							<label>Jenis Golongan :</label>
							<input type="text" class="form-control" value="{{$data->golongan}}"  name="golongan">
						</div>
					</div>

					<div class="form-group">
						<label>diskripsi Golongan :</label>
						<textarea class="form-control" value="{{$data->keterangan}}"  name="keterangan">{{$data->keterangan}}</textarea>
					</div>

					<button type="submit" class="btn btn-sm btn-primary float-right">Simpan Perubahan<i class="icon-paperplane ml-2"></i></button>
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
			
			document.getElementById("parameter").classList.add("nav-item-open");
			document.getElementById("subParameter").style.display = 'block';
			document.getElementById("golongan").classList.add("nav-item-open");
			
            console.log("ready");
            $("#tabelGolongan").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
						'url':"{{ url('golonganAJAX') }}",
                        'headers':"{{ csrf_token() }}"
						},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'id_golongan', name: 'nomor'},
					{data: 'golongan', name: 'golongan'},
					{data: 'id_golongan', 'targets' : [2], 'render': function(data){
						return '<button type="button" class="btn btn-sm rounded" data-toggle="modal" data-target="#edit'+data+'" ><b><i class="text-primary icon-arrow-right8"></i></b></button>'
					}},
                ],
                "fixedColumns": true,
            });

        });
		
	</script>
@endsection
