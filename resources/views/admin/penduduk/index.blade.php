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
		<h1><b>Data Penduduk</b></h1>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>

	<button type="button" class="btn rounded" data-toggle="modal" data-target="#tambah" style="max-width: 170px;margin-left:10px;background-color:#6059f6;color:white" >Input Data Baru <i class="icon-vcard ml-2"></i></button>

	<table id="tabelPenduduk" class="table datatable-basic table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>IDBDT</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>jenis Kelamin</th>
				<th>Alamat</th>
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
				<h6 class="mb-0">Tambahkan Data Penduduk Baru</h6>		
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form action="{{Route('tambahPenduduk')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

					<div class="form-group row">
						<div class="col-lg-6">
							<label>NO_KK :</label>
							<input type="text" class="form-control" placeholder="Masukkan No KK..." name="NO_KK">
						</div>
						<div class="col-lg-6">
							<label>NIK :</label>
							<input type="text" class="form-control" placeholder="Masukkan NIK..." name="nik">
						</div>
					</div>

					<div class="form-group">
						<label>Nama Lengkap :</label>
						<input type="text" class="form-control" placeholder="Masukkan nama..." name="nama">
					</div>

					<div class="form-group row">
						<div class="col-lg-4">
							<label>Tempat Lahir : </label>
							<select id="tempat_lahir" class="form-control input-sm" name="tempat_lahir">
								<option value="">--Pilih Tempat Kelahiran--</option>
								@foreach ($kabupaten as $row)
									<option value="{{$row->KDGabungan2}}">{{$row->NMKAB}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-8">
							<label>Tanggal Lahir :</label>
							<input type="date" class="form-control" placeholder="Masukkan tanggal lahir..." name="tanggal_lahir">
						</div>
					</div>

					<div class="form-group">
						<label>Alamat :</label>
						<input type="textarea" class="form-control" placeholder="Masukkan alamat..." name="alamat">
					</div>

					<div class="form-group row">
						<div class="col-lg-6">
							<label>Propinsi : </label>
							<select id="propinsi" class="form-control input-sm" name="KDPROP">
								<option value="">--Pilih Nama Propinsi--</option>
								@foreach ($propinsi as $row)
									<option value="{{$row->KDPROP}}">{{$row->NMPROP}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-6">
							<label>Kecamatan :</label>
							<img id="loaderKec" src="{{url('/asset/images/ajax-loader.gif')}}" alt="loader">
							<select id="kecamatan" class="form-control input-sm" name="KDKEC"></select>
						</div>

						
					</div>
	
					<div class="form-group row" style="position:relative">
						<div class="col-lg-6">
							<label>Kabupaten :</label>
							<img id="loaderKab" src="{{url('/asset/images/ajax-loader.gif')}}" alt="loader">
							<select id="kabupaten" class="form-control input-sm" name="KDKAB"></select>
						</div>
						<div class="col-lg-6">
							<label>Desa :</label>
							<img id="loaderDesa" src="{{url('/asset/images/ajax-loader.gif')}}" alt="loader">
							<select id="desa" class="form-control input-sm" name="KDDESA"></select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-4">
							<label>Jenis Kelamin : </label>
							<select class="form-control input-sm" name="jenis_kelamin">
								<option value="">--Pilih Jenis Kelamin--</option>
								@foreach ($jenis_kelamin as $row)
									<option value="{{$row->id_jk}}">{{$row->jenis_kelamin}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-4">
							<label>Status Perkawinan : </label>
							<select class="form-control input-sm" name="status">
								<option value="">--Pilih Status Perkawinan--</option>
								@foreach ($status_perkawinan as $row)
									<option value="{{$row->id_status}}">{{$row->status_perkawinan}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-4">
							<label>Agama: </label>
							<select class="form-control input-sm" name="agama">
								<option value="">--Pilih Agama--</option>
								@foreach ($agama as $row)
									<option value="{{$row->id_agama}}">{{$row->agama}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-sm btn-primary float-right">Simpan<i class="icon-paperplane ml-2"></i></button>
                </form>
            </div>
		</div>
	</div>
</div>

@foreach($penduduk as $data)
<div id="edit{{$data->IDBDT}}" class="modal fade" tabindex="-1">
	<div class="modal-dialog" style="border-radius: 10px">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="mb-0">Tambahkan Data Penduduk Baru</h6>		
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
                <form action="{{Route('tambahPenduduk', $data->IDBDT)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

					<div class="form-group row">
						<div class="col-lg-6">
							<label>NO_KK :</label>
							<input type="text" class="form-control" value="{{$data->NO_KK}}" name="NO_KK">
						</div>
						<div class="col-lg-6">
							<label>NIK :</label>
							<input type="text" class="form-control" value="{{$data->nik}}" name="nik">
						</div>
					</div>

					<div class="form-group">
						<label>Nama Lengkap :</label>
						<input type="text" class="form-control" value="{{$data->nama}}" name="nama">
					</div>

					<div class="form-group row">
						<div class="col-lg-4">
							<label>Tempat Lahir : </label>
							<select id="tempat_lahir" class="form-control input-sm" name="tempat_lahir">
								<option value="">--Pilih Tempat Kelahiran--</option>
								@foreach ($kabupaten as $row)
									<option value="{{$row->KDGabungan2}}">{{$row->NMKAB}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-8">
							<label>Tanggal Lahir :</label>
							<input type="date" class="form-control" value="{{$data->tanggal_lahir}}" name="tanggal_lahir">
						</div>
					</div>

					<div class="form-group">
						<label>Alamat :</label>
						<input type="textarea" class="form-control" value="{{$data->alamat}}" name="alamat">
					</div>

					<div class="form-group row">
						<div class="col-lg-6">
							<label>Propinsi : </label>
							<select id="propinsi" class="form-control input-sm" name="KDPROP">
								<option value="">--Pilih Nama Propinsi--</option>
								@foreach ($propinsi as $row)
									<option value="{{$row->KDPROP}}" @if($data->KDPROP == $row->KDPROP) selected @endif >{{$row->NMPROP}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-6">
							<label>Kecamatan :</label>
							<img id="loaderKec" src="{{url('/asset/images/ajax-loader.gif')}}" alt="loader">
							<select id="kecamatan" class="form-control input-sm" name="KDKEC"></select>
						</div>

						
					</div>
	
					<div class="form-group row" style="position:relative">
						<div class="col-lg-6">
							<label>Kabupaten :</label>
							<img id="loaderKab" src="{{url('/asset/images/ajax-loader.gif')}}" alt="loader">
							<select id="kabupaten" class="edit-kab form-control input-sm" name="KDKAB"></select>
						</div>
						<div class="col-lg-6">
							<label>Desa :</label>
							<img id="loaderDesa" src="{{url('/asset/images/ajax-loader.gif')}}" alt="loader">
							<select id="desa" class="form-control input-sm" name="KDDESA"></select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-4">
							<label>Jenis Kelamin : </label>
							<select class="form-control input-sm" name="jenis_kelamin">
								<option value="">--Pilih Jenis Kelamin--</option>
								@foreach ($jenis_kelamin as $row)
									<option value="{{$row->id_jk}}" @if($data->jenis_kelamin == $row->id_jk) selected @endif >{{$row->jenis_kelamin}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-4">
							<label>Status Perkawinan : </label>
							<select class="form-control input-sm" name="status">
								<option value="">--Pilih Status Perkawinan--</option>
								@foreach ($status_perkawinan as $row)
									<option value="{{$row->id_status}}" @if($data->status == $row->id_status) selected @endif >{{$row->status_perkawinan}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-4">
							<label>Agama: </label>
							<select class="form-control input-sm" name="agama">
								<option value="">--Pilih Agama--</option>
								@foreach ($agama as $row)
									<option value="{{$row->id_agama}}" @if($data->agama == $row->id_agama) selected @endif >{{$row->agama}}</option>
								@endforeach
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

			document.getElementById("penduduk").classList.add("nav-item-open");
			

            $("#tabelPenduduk").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
						'url':"{{ url('pendudukAJAX') }}",
                        'headers':"{{ csrf_token() }}"
						},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'IDBDT', name: 'IDBDT'},
					{data: 'nik', name: 'NIK'},
					{data: 'nama', name: 'Nama'},
					{data: 'jenis_kelamin', name: 'jenis_kelamin'},
					{data: 'alamat', name: 'alamat'},
					{data: 'IDBDT', 'targets' : [5], 'render': function(data){
						return '<button type="button" class="btn btn-sm rounded" data-toggle="modal" data-target="#edit'+data+'" ><b><i class="text-primary icon-arrow-right8"></i></b></button>'
					}},
                ],
                "fixedColumns": true,
			});


			$('#tempat_lahir').keyup(function(){ 
				var query = $(this).val();
				if(query != ''){
					var _token = $('input[name="_token"]').val();
					$.ajax({
						url:"{{ Route('fecthKabupaten') }}",
						type :'POST',
						method :'POST',
						headers: {
							'X-CSRF-Token': '{{ csrf_token() }}',
						},
						data:{query:query, _token:_token},
						success:function(data){
							$('#tempatLahirList').fadeIn();  
							$('#tempatLahirList').html(data);
						}
					});
				}
			});

			$(document).on('click', 'li', function(){  
				$('#tempat_lahir').val($(this).text());  
				$('#tempatLahirList').fadeOut();  
			});  
			

			var loaderKab = $('#loaderKab'),
				loaderKec = $('#loaderKec'),
				loaderDesa = $('#loaderDesa'),
                KDPROP = $('select[name="KDPROP"]'),
				KDKAB = $('select[name="KDKAB"]');
				KDKEC = $('select[name="KDKEC"]');
				KDDESA = $('select[name="KDDESA"]');

			loaderKab.hide();
			loaderKec.hide();
			loaderDesa.hide();
			KDKAB.attr('disabled','disabled');
			KDKEC.attr('disabled','disabled');
			KDDESA.attr('disabled','disabled');

            KDKAB.change(function(){
                var id = $(this).val();
                if(!id){
                    KDKAB.attr('disabled','disabled');
                }
			})

			KDKEC.change(function(){
                var id_kec = $(this).val();
                if(!id_kec){
                    KDKEC.attr('disabled','disabled');
                }
			})
			
			KDDESA.change(function(){
                var id_desa = $(this).val();
                if(!id_desa){
                    KDDESA.attr('disabled','disabled');
                }
            })

            KDPROP.change(function() {
                var id= $(this).val();
                if(id){
                    loaderKab.show();
                    KDKAB.attr('disabled','disabled');

                    $.get('{{url('/admin/penduduk-propinsi?KDPROP=')}}'+id)
                        .done(function(data){
                            var s='<option value="">---Pilih Nama Kabupaten--</option>';
                            data.data.forEach(function(row){
                                s +='<option value="'+row.KDKAB+'">'+row.NMKAB+'</option>'
                            });
                            KDKAB.removeAttr('disabled');
                            KDKAB.html(s);
                            loaderKab.hide();
                        })
                }

			})

			KDKAB.change(function() {
				var id= $("#propinsi :selected").val();
				var id_kab= $(this).val();
                if(id_kab){
					
                    loaderKec.show();
                    KDKEC.attr('disabled','disabled');

                    $.get('{{url('/admin/penduduk-kabupaten?KDKAB=')}}'+id+id_kab)
                        .done(function(data){
                            var s='<option value="">---Pilih Nama Kecamatan--</option>';
                            data.data.forEach(function(row){
								s +='<option value="'+row.KDKEC+'">'+row.NMKEC+'</option>'
								console.log(id+id_kab);
                            });
                            KDKEC.removeAttr('disabled');
                            KDKEC.html(s);
							loaderKec.hide();
                        })
                }

			})

			KDKEC.change(function() {
				var id= $("#propinsi :selected").val();
				var id_kab= $("#kabupaten :selected").val();
                var id_kec= $(this).val();
                if(id_kec){
                    loaderDesa.show();
                    KDDESA.attr('disabled','disabled');

                    $.get('{{url('/admin/penduduk-kecamatan?KDKEC=')}}'+id+id_kab+id_kec)
                        .done(function(data){
                            var s='<option value="">---Pilih Nama Desa--</option>';
                            data.data.forEach(function(row){
                                s +='<option value="'+row.KDDESA+'">'+row.NMDESA+'</option>'
                            });
                            KDDESA.removeAttr('disabled');
                            KDDESA.html(s);
                            loaderDesa.hide();
                        })
                }

			})

			

		});
		
	</script>
@endsection
