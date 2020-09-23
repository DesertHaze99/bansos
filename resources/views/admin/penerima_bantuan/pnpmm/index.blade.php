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
		<h1><b>Data Penerima Bantuan PNPM Mandiri</b></h1>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>

	<button type="button" class="btn rounded" data-toggle="modal" data-target="#tambah" style="max-width: 170px;margin-left:10px;background-color:#6059f6;color:white" >Input Data Baru <i class="icon-users ml-2"></i></button>

	<table id="tabelPenerimaBantuan" class="table datatable-basic table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Nama Penerima</th>
				<th>Jenis Bantuan</th>
				<th>Tahun Penerimaan</th>
				<th>Status bantuan</th>
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
				<h4 class="mb-0">Tambahkan Data Penerima Bantuan PNPM Mandiri Baru, Langkah 1/2</h4> <br>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<form  autocomplete="off">
					<div class="form-group">
						<label>NIK :</label>
						<input id="nik" type="text" class="typeahead form-control" placeholder="Masukkan NIK..." name="nik">
						<div id="dataPenduduk"></div>    
					</div>

					<div id="group" >
						<div class="form-group row">
							<div class="col-lg-6">
								<label>NO KK :</label>
								<input id="no_kk" type="text" class="form-control" disabled name="NO_KK">
							</div>
							<div class="col-lg-6">
								<label>Nama Lengkap :</label>
								<input id="nama" type="text" class="form-control" disabled name="nama">
							</div>
						</div>
	
						<div class="form-group row">
							<div class="col-lg-4">
								<label>Tempat Lahir : </label>
								<input id="tempat_lahir" type="text" class="form-control" disabled name="tempat_lahir">
							</div>
							<div class="col-lg-8">
								<label>Tanggal Lahir :</label>
								<input id="tanggal_lahir" type="date" class="form-control" disabled name="tanggal_lahir">
							</div>
						</div>
	
						<div class="form-group">
							<label>Alamat :</label>
							<input id="alamat" type="textarea" class="form-control" disabled name="alamat">
						</div>
	
						<div class="form-group row">
							<div class="col-lg-6">
								<label>Propinsi : </label>
								<input id="propinsi" type="text" class="form-control" disabled name="propinsi">
							</div>
							<div class="col-lg-6">
								<label>Kecamatan :</label>
								<input id="kabupaten" type="text" class="form-control" disabled name="kabupaten">
							</div>
						</div>
	
						<div class="form-group row" style="position:relative">
							<div class="col-lg-6">
								<label>Kabupaten :</label>
								<input id="kecamatan" type="text" class="form-control" disabled name="kecamatan">
							</div>
							<div class="col-lg-6">
								<label>Desa :</label>
								<input id="desa" type="text" class="form-control" disabled name="desa">
							</div>
						</div>
	
						<div class="form-group row">
							<div class="col-lg-4">
								<label>Jenis Kelamin : </label>
								<select id="jenis_kelamin" class="form-control input-sm" name="jenis_kelamin" disabled>
									<option value="">--Pilih Jenis Kelamin--</option>
									@foreach ($jenis_kelamin as $row)
										<option value="{{$row->id_jk}}">{{$row->jenis_kelamin}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-4">
								<label>Status Perkawinan : </label>
								<select id="status" class="form-control input-sm" name="status" disabled>
									<option value="">--Pilih Status Perkawinan--</option>
									@foreach ($status_perkawinan as $row)
										<option value="{{$row->id_status}}">{{$row->status_perkawinan}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-4">
								<label>Agama: </label>
								<select id="agama" class="form-control input-sm" name="agama" disabled>
									<option value="">--Pilih Agama--</option>
									@foreach ($agama as $row)
										<option value="{{$row->id_agama}}">{{$row->agama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<h6 id="confirmationText" class="text-warning">Apakah data yang dimaksud sudah benar?</h6>
					</div>
					
					<button id="next" type="button" data-toggle="modal" data-target="#nextPageModal" class="btn btn-sm btn-primary float-right">Selanjutnya<i class="icon-paperplane ml-2"></i></button>
				</form>	
			</div>
		</div>
	</div>
</div>

<div id="nextPageModal" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="mb-0">Langkah 2/2</h6>		
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form action="{{Route('tambahPenerimaBantuan')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
					
					<div class="form-group">
						<input id="nik2" type="hidden" class="typeahead form-control" name="nik">
						<div id="dataPenduduk"></div>    
					</div>
	
					<div class="form-group row">
						<div class="col-lg-4">
							<label>Jenis Bantuan : </label>
							<select id="bantuan_id" class="form-control input-sm" name="bantuan_id">
								<option value="">--Pilih Jenis Bantuan yang diberikan--</option>
								@foreach ($jenis_bantuan as $row)
									<option value="{{$row->id_bantuan}}" @if($row->bantuan == 'PNPM Mandiri') selected @endif>{{$row->bantuan}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label>Tahun Bantuan :</label>
						<input id="tahun_penerimaan" type="text" class="form-control" placeholder="Masukkan Tahun penerimaan" name="tahun_penerimaan">
					</div>
					<input id="status" type="hidden" class="form-control"  name="status" value="2">
					<button type="submit" class="btn btn-sm btn-primary float-right">Simpan<i class="icon-paperplane ml-2"></i></button>
                </form>
            </div>
		</div>
	</div>
</div>

@foreach($penerima as $data)
<div id="edit{{$data->id_mapping}}" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="mb-0">Edit Penerima Bantuan</h4> <br>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<form action="{{Route('editBantuan', $data->id_mapping)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
					<div class="form-group row">
						<div class="col-lg-6">
							<label>NIK :</label>
							<input type="text" class="typeahead form-control" value="{{$data->nik}}" disabled name="nik">
						</div>
						<div class="col-lg-6">
							<label>NO KK :</label>
							<input type="text" value="{{$data->NO_KK}}" class="form-control" disabled name="NO_KK">
						</div>
						
					</div>
					<div class="form-group">
						<label>Nama Lengkap :</label>
						<input type="text" value="{{$data->nama}}" class="form-control" disabled name="nama">
					</div>

					<div class="form-group row">
						<div class="col-lg-4">
							<label>Jenis Bantuan : </label>
							<select id="bantuan_id" class="form-control input-sm" name="bantuan_id">
								<option value="">--Pilih Jenis Bantuan yang diberikan--</option>
								@foreach ($jenis_bantuan as $row)
									<option value="{{$row->id_bantuan}}" @if($data->bantuan_id == $row->id_bantuan) selected @endif>{{$row->bantuan}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label>Tahun Bantuan :</label>
						<input id="tahun_penerimaan" type="text" class="form-control" value="{{$data->tahun_penerimaan}}" name="tahun_penerimaan">
					</div>
					<input id="status" type="hidden" class="form-control"  name="status" value="2">
					
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
			document.getElementById("next").disabled = true;
			document.getElementById("penerimaBantuan").classList.add("nav-item-open");
			document.getElementById("subPenerimaBantuan").style.display = 'block';
			document.getElementById("pnpmm").classList.add("nav-item-open");

            $("#tabelPenerimaBantuan").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
						'url':"{{ url('penerimaPNPMMAJAX') }}",
                        'headers':"{{ csrf_token() }}"
						},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'id_mapping', name: 'id_mapping'},
					{data: 'nama', name: 'nama'},
					{data: 'bantuan', name: 'bantuan'},
					{data: 'tahun_penerimaan', name: 'tahun_penerimaan'},
					{data: 'status', 'targets' : [4], 'render': function(data){
						if(data == '1'){
							return '<span class="badge  bg-danger ml-md-auto mr-md-3" style="border-radius:5px;">Data Tidak Lengkap</span>'
						} else if(data == '2'){
							return '<span class="badge  bg-primary ml-md-auto mr-md-3" style="border-radius:5px;">Sedang Diproses</span>'
						}else if(data == '3'){
							return '<span class="badge  bg-success ml-md-auto mr-md-3" style="border-radius:5px;">Terverifikasi</span>'
						}else if(data == '4'){
							return '<span class="badge  bg-success ml-md-auto mr-md-3" style="border-radius:5px;">Bantuan Aktif</span>'
						} else {
							return '<span class="badge bg-danger ml-md-auto mr-md-3" style="border-radius:5px;">Bantuan Berakhir</span>'
						}
						
					}},
					{data: 'id_mapping', 'targets' : [5], 'render': function(data){
						return '<button type="button" class="btn btn-sm rounded" data-toggle="modal" data-target="#edit'+data+'" ><b><i class="text-primary icon-arrow-right8"></i></b></button>'
					}},
                ],
                "fixedColumns": true,
			});

			

			var x = document.getElementById("group");
			x.style.display = "none";

				
			$('#nik').on('keyup',function() {
				var query = $(this).val(); 
				$.ajax({
				
					url:"{{ route('search') }}",
			
					type:"GET",
				
					data:{'nik':query},
				
					success:function (data) {
					
						$('#dataPenduduk').html(data);
						
					}
				})
				// end of ajax call
			});

			
			$(document).on('click', 'li', function(){
				var value = $(this).text();
				$.ajax({
					url:"{{ route('dataAutosearch') }}",
			
					type:"GET",
				
					data:{'nik':value},
					
					success:function (data) {
						$('#nik').val(data[0].nik);
						$('#nama').val(data[0].nama);
						$('#no_kk').val(data[0].NO_KK);
						$('#tempat_lahir').val(data[2].NMKAB);
						$('#tanggal_lahir').val(data[0].tanggal_lahir);
						$('#alamat').val(data[0].alamat);
						$('#propinsi').val(data[1].NMPROP);
						$('#kabupaten').val(data[1].NMKAB);
						$('#kecamatan').val(data[1].NMKEC);
						$('#desa').val(data[1].NMDESA);
						$('#jenis_kelamin').val(data[0].jenis_kelamin);
						$('#status').val(data[0].status);
						$('#agama').val(data[0].agama);
						$('#nik2').val(data[0].nik);
						console.log(data);
						x.style.display = "block";
						document.getElementById("next").disabled = false;
					}
				})
				
				$('#dataPenduduk').html("");
			});

			setInterval(() => {
				if($('#nextPageModal').hasClass('show')){
					$('#tambah').modal('hide')
				}
			})

        });
	</script>
@endsection
