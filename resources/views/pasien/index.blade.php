@extends('layouts.app')

	@section('content')
	   {{-- start breadcrumb --}}
        <div class="card page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title">
                    <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Pasien</h2>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="{{ URL::to('/pasien')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Pasien</a>
                        <span class="breadcrumb-item active">Dashboard</span>
                    </div>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>
        {{-- end breadcrumb --}}
		
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
                "ajax": {'url':"{{ url('pasienAjax') }}",
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
        });
	</script>
@endsection
