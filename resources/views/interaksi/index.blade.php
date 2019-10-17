@extends('layouts.app')
	@section('title')
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Interaksi</span> - Dashboard</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	@endsection

	@section('content')
		<div class="card">
	        <div class="card-header">
	        	<a class="btn btn-primary" href="{{URL::to('/interaksi')}}">Tambah interaksi baru</a>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-striped" id="table">
	                    <thead>
	                        <tr>
	                            <th class="text-center" width="10%">
	                                ID
	                            </th>
	                            <th>Nama Interaksi</th>
	                            <th>Ditambahkan oleh</th>
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
	@endsection
@section('librariesJS')
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
@endsection
@section('script')
	<script>
		$(document).ready(function() {
            console.log("cek ready");
            $("#table").DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {'url':"{{ url('interaksiAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'obat_id', name: 'obat_id'},
                    {data: 'name', name: 'name'},
                    {data: 'added_by',name:'added_by'},
                    {data: 'created_at',name:'created_at'},
                    {data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });
        });
	</script>
@endsection