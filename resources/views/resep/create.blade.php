@extends('layouts.app')
@section('librariesCSS')
	<link href="{{ asset('limitless/Template/global_assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
@endsection
	@section('content')
		{{-- start breadcrumb --}}
		<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Tambah resep baru</h2>
		            <a href="#" class="header-elements-toggle text-default d-md-none"></a>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/pasien')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>pasien</a>
			            <span class="breadcrumb-item active">Create</span>
			        </div>
			        <a href="#" class="header-elements-toggle text-default d-md-none"></i></a>
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
				<form action="{{ route('pasienForResep') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group row">
						<label class="col-form-label col-lg-2">Cari Pasien</label>
						<div class="col-lg-10">
							<div class="input-group">
								<input id="noRm" type="text" class="form-control" placeholder="Masukan No RM Pasien" name="no">
								<span class="input-group-append">
									<button id="search" class="btn bg-primary" type="button"><i class="fas fa-search"></i></button>
								</span>
							</div>
						</div>
					</div>
				</form>

				{{-- <ul id="info" class="media-list">
					
				</ul> --}}
			</div>
		</div>

		<div class="card">
	        <div class="card-header">
	        	<a class="btn btn-primary" href="{{URL::to('/pasien/create')}}">Tambah pasien baru</a>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-striped" id="table">
	                    <thead>
	                        <tr>
	                            <th class="text-center" width="10%">
	                                No RM
	                            </th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
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
						<h5 class="modal-title">Vertical form</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<form action="{{ route('resep.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div id="result" class="modal-body">
							
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							<button type="submit" class="btn bg-success">Lanjut</button>
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
	<script type="text/javascript">
		// $(document).ready(function(){
		// 	$('#search').on('click',function(){
		// 		var id = $('#noRm').val();
		// 		console.log(id);
		// 		$.ajax({
		// 			type:"POST"
		// 			data: {id,id},
		// 			success : function(data){
		// 				$('#info').html(data);
		// 			}
		// 		})
		// 	});
		// });

		$(document).ready(function() {
            console.log("cek ready");
            $("#table").DataTable({
            	// "searching":false,
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('pasienResepAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'no_rm',name: 'no_rm'},
                    {data: 'nama', name: 'nama'},
                    {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                    {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                    {data: 'no_telp', name: 'no_telp'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });

            var table = $("#table").DataTable();
	        $('#search').on('click',function(){
	        	var id = $('#noRm').val();
	        	table.search(id).draw();
	        })
        });

        function modal(code)
        {
        	var id = code;
        	console.log(id);
        	$.ajax({
                url : "{!! url('resep/show')!!}",
                method : "POST",
                data : {id:id},
                success : function(data){
                    $('#result').html(data);
                    $('#modal_form_vertical').modal('show');
                }
            });
        }
	</script>
@endsection