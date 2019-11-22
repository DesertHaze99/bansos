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
        <div class="card page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title">
                    <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Resep</h2>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="{{ URL::to('/resep')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Resep</a>
                        <span class="breadcrumb-item active">Dashboard</span>
                    </div>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>
        {{-- end breadcrumb --}}
		
		<div class="card">
	        <div class="card-header">
	        	<a class="btn btn-primary" href="{{URL::to('/resep/create')}}"><i class="far fa-plus-square mr-2"></i>Tambah resep baru</a>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-striped" id="table">
	                    <thead>
	                        <tr>
	                            <th class="text-center" width="10%">
	                                ID Resep
	                            </th>
                                <th>ID pasien</th>
                                <th>nama pasien</th>
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
                "ajax": {'url':"{{ url('resepAjax') }}",
                        'headers':"{{ csrf_token() }}"},
                "order": ['0', 'desc'],
                "dataSrc": "data",
                "columns": [
                    {data: 'resep_id', name: 'resep_id'},
                    {data: 'pasien_id',name: 'pasien_id'},
                    {data: 'pasien', name: 'pasien'},
                    {data: 'action', name: 'action', "orderable": false, "searchable": false}
                ],
                "fixedColumns": true,
            });
        });
	</script>
@endsection
