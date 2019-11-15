@extends('layouts.app')

	@section('content')
		{{-- start breadcrumb --}}
		<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Detail Resep</h2>
		            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/resep')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>pasien</a>
			            <a href="{{ URL::to('/resep/create')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>create</a>
			            <span class="breadcrumb-item active">Detail resep</span>
			        </div>
			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>
			</div>
		</div>
		{{-- end breadcrumb --}}
		
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Detail Pasien</h5>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
                		<a class="list-icons-item" data-action="reload"></a>
                		<a class="list-icons-item" data-action="remove"></a>
                	</div>
            	</div>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-nowrap">
						<tbody>
							<tr class="table-active">
								<td colspan="3">Active tickets</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Nama</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $info->pasien->nama }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Jenis Kelamin</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $info->pasien->jenis_kelamin }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Tanggal Lahir</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $info->pasien->tanggal_lahir }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">No Telfon</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $info->pasien->no_telp }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Alamat</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $info->pasien->alamat }}</div>
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="card">
	        <div class="card-header">
	        	<div class="row">
	        		<div class="col-md-6">
	        			<div class="text-left">
			        		<button id="modal" class="btn btn-primary">Tambahkan obat</button>
			        	</div>
	        		</div>
	        		<div class="col-md-6">
	        			<div class="text-right">
							<form action="{{ URL::to('/resep/'.$info->resep_id.'/qr')}}">
								<input class="btn btn-success" type="submit" value="Print Resep" />
							</form>
			        	</div>
	        		</div>
	        	</div>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-striped" id="table">
	                    <thead>
	                        <tr>
	                            <th class="text-center" width="10%">
	                                No RM
	                            </th>
                                <th>Nama Obat</th>
                                <th>Aturan Pakai</th>
                                <th>Waktu Minum</th>
	                            <th width="30%">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>

	    <div id="modal_form_vertical" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambahkan obat ke resep</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<form action="{{ route('detailResep.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
							<input type="hidden" value="{{ $info->resep_id }}" name="resepId">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label>Nama Obat</label>
										<select id="namaObat" class="form-control" placeholder="silahkan pilih obat" name="namaObat">
											@for($i =0 ; $i < count($obat);$i++)
												<option value="{{ $obat[$i]->obat_id }}">{{ $obat[$i]->name }} {{ $obat[$i]->detailObat->kesediaan}} {{ $obat[$i]->detailObat->satuan }}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label>Dosis</label>
										<input id="dosis" type="number" placeholder="masukan dosis yang sesuai" class="form-control" name="dosis">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-sm-8">
										<label>Aturan pakai</label>
										<input type="text" placeholder="Munich" class="form-control" name="aturanPakai">
									</div>
									<div class="col-sm-4 mt-1 mt-sm-3 align-self-center">
										<span class="text-muted">Kali sehari</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
										<label>Takaran Minum</label>
										<input id="takaran" type="text" class="form-control" name="takaranMinum" readonly>
									</div>

									<div class="col-sm-6">
										<label>Bentuk obat</label>
										<input id="bentukObat" type="text" class="form-control" name="bentukObat" readonly>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label>Waktu Minum</label>
										<select class="form-control" placeholder="pilih waktu minum" name="waktuMinum">
											@for($i=0;$i<count($waktuMinum);$i++)
												<option value="{{ $waktuMinum[$i] }}">{{ $waktuMinum[$i] }}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label>Keterangan</label>
										<select class="form-control" placeholder="pilih waktu minum" name="keterangan">
											@for($i=0;$i<count($keterangan);$i++)
												<option value="{{ $keterangan[$i] }}">{{ $keterangan[$i] }}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label>Jumlah obat</label>
										<input id="jumlahObat" type="number" class="form-control" name="jumlahObat">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label>Jumlah kali minum</label>
										<input id="jumlahKaliMinum" type="text" class="form-control" name="jumlahKaliMinum" readonly>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							<button type="submit" class="btn bg-primary">Submit form</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /vertical form modal -->
	@endsection
@section('librariesJS')
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
@endsection
@section('script')
	<script>
		$(document).ready(function(){
			$("#modal").on('click',function(){
				console.log("hai");
				$('#modal_form_vertical').modal('show');	
			});

			$("#table").DataTable({
            	// "searching":false,
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('resep/'.$info->resep_id.'/detailResepAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'resep_id',name: 'resep_id'},
                    {data: 'obat_id', name: 'obat_id'},
                    {data: 'aturan_pakai', name: 'aturan_pakai'},
                    {data: 'waktu_minum', name: 'waktu_minum'},
                    {data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });

			var kesediaan = 0;
			$("#namaObat").on('change',function(){
				var id = $(this).val();
				console.log(id);
				if(id != ''){
					$.ajax({
						url: "{!! URL('detailObatAjax') !!}",
						method:"post",
						data: {id:id},
						success: function(data){
							var obat = data;
							kesediaan =  obat.detail_obat.kesediaan;
							$('#bentukObat').val(obat.detail_obat.bentuk_obat.bentuk);
							console.log(kesediaan);
						}
					});
				}
			});

			var takaran = 0;
			$('#dosis').on('keyup',function(){
				var dosis = $(this).val();
				takaran = dosis/kesediaan;
				$('#takaran').val(takaran);
			});

			$('#jumlahObat').on('keyup',function(){
				var jumlahObat = $(this).val();
				var jumlahKaliMinum = jumlahObat/takaran;
				$('#jumlahKaliMinum').val(jumlahKaliMinum);
			})
		})
	</script>
@endsection