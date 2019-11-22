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

		{{-- start breadcrumb --}}
		<div class="card">
			<div class="card-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Obat</span> - Dashboard</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
				<div class="breadcrumb page-header-content">
					<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item active">Dashboard</span>
				</div>
			</div>
		</div>
		{{-- end breadcrumb --}}

		<div class="card">
	        <div class="card-header">
	        	<div class="row">
	        		<div class="col-md-6">
	        			<div class="text-left">
							<a class="btn btn-primary" href="{{URL::to('/obat/create')}}"><i class="far fa-plus-square mr-2"></i>Tambah obat baru</a>
						</div>		
	        		</div>
	        		<div class="col-md-6">
	        			<div class="text-right">
							<button id="excel" class="btn btn-success"><i class="far fa-file-excel mr-2"></i>Input Obat dengan excel</button>
						</div>
	        		</div>
	        	</div>
	        	<div id="excelForm" class="card mt-3" style="display: none;">
	        		<!-- Single file upload -->
	        		<div class="card-header">
	        			<p class="font-weight-semibold">Single file upload example:</p>
	        		</div>
	        		<div class="card-body">
	        			<form id="formDropzone" action="{{ Route('storeExcel') }}" class="dropzone" id="dropzone_single">@csrf</form>
	        		</div>
					<!-- /single file upload -->
	        	</div>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-striped" id="table">
	                    <thead>
	                        <tr>
	                            <th class="text-center" width="10%">
	                                ID
	                            </th>
	                            <th>Nama Obat</th>
	                            <th>Ditambahkan pada</th>
	                            <th width="30%">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	    <div id="modal_form_horizontal" class="modal fade" tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Horizontal form</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div id="result">
							
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						<button type="submit" class="btn bg-primary">Submit form</button>
					</div>
				</div>
			</div>
		</div>
	@endsection
@section('librariesJS')
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/plugins/uploaders/dropzone.min.js') }}"></script>
	<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/uploader_dropzone.js') }}"></script>
@endsection
@section('script')
	<script>
		$(document).ready(function() {
            console.log("cek ready");
            $("#table").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('obatAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'obat_id', name: 'obat_id'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at',name:'created_at'},
                    {data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });

            $('#excel').on('click',function(){
            	$('#excelForm').toggle();
            });

            $('formDropzone').dropzone({
            	url : '{{ Route('storeExcel') }}',
            	autoProcessQueue : true
            })
        });

        function modal(code){
            var id = code;
            console.log(id);
            $.ajax({
                url : "{!! url('detailObat')!!}",
                method : "POST",
                data : {id:id},
                success : function(data){
                    $('#result').html(data);
                    $('#modal_form_horizontal').modal('show');
                }
            });
        }

	</script>
@endsection
