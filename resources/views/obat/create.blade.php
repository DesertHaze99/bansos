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

        @if (session('error'))
	        <div class="box-body">
	            <div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-ban"></i> Success!</h4>
	                    {{ session('error') }}
	            </div>
	        </div>
	    @endif

		{{-- start breadcrumb --}}
		<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Tambah obat baru</h2>
		            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/obat')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>obat</a>
			            <span class="breadcrumb-item active">Create</span>
			        </div>
			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>
			</div>
		</div>
		{{-- end breadcrumb --}}
		
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Obat</h5>
				<div class="header-elements">
					<div class="list-icons">
                		<a class="list-icons-item" data-action="collapse"></a>
                		<a class="list-icons-item" data-action="reload"></a>
                		<a class="list-icons-item" data-action="remove"></a>
                	</div>
            	</div>
			</div>

			<div class="card-body">
				<form action="{{ route('obat.store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Nama Obat :</label>
						<input type="text" class="form-control" placeholder="Silahkan masukan name obat" name="nama" required>
					</div>
					<div class="form-group">
						<label>Gambar Obat :</label>
						<div class="uniform-uploader">
							<input id="gambarObat" type="file" class="form-input-styled" data-fouc="" name="gambarObat">
						</div>
						<span class="form-text text-muted">Accepted formats:png, jpg. Max file size 2Mb</span>
						<img id="obatImg" src="#" height="" width="" style="visibility: hidden;">
					</div>
					<div class="form-group row">
						<div class="col-md-4">
							<label>Bentuk Obat :</label>
							<select class="form-control" placeholder="Silahkan pilih bentuk obat" name="bentuk" required>
								@for($i=0;$i < count($bentukObat); $i++)
									<option value="{{ $bentukObat[$i]->bentuk_obat_id }}"> {{ $bentukObat[$i]->bentuk }} </option>
								@endfor
							</select>
						</div>
						<div class="col-md-4">
							<label>Kesediaan :</label>
							<input type="text" class="form-control" placeholder="Silahkan masukan kesediaan obat" name="kesediaan" required>
						</div>
						<div class="col-md-4">
							<label>Satuan :</label>
							<select class="form-control" name="satuan" required>
								@for($i=0;$i < count($satuan);$i++)
									<option>{{ $satuan[$i] }}</option>
								@endfor
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label>Kontraindikasi :</label>
							<select multiple="multiple" data-placeholder="Pilih kontraindikasi obat" class="form-control form-control-select2" data-fouc name="kontraindikasi[]" required>
								@for($i=0;$i < count($kontraindikasi);$i++)
									<option value="{{ $kontraindikasi[$i]->kontraindikasi_id}}">{{ $kontraindikasi[$i]->kontraindikasi }}</option>
								@endfor
							</select>
						</div>
						<div class="col-md-6">
							<label>Interaksi :</label>
							<select multiple="multiple" data-placeholder="Pilih kontraindikasi obat" class="form-control form-control-select2" data-fouc name="interaksi[]" required>
								@for($i=0;$i < count($interaksi);$i++)
									<option value="{{ $interaksi[$i]->interaksi_id}}">{{ $interaksi[$i]->interaksi_name }}</option>
								@endfor
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label>Efek Samping :</label>
							<input type="text" class="form-control" placeholder="masukan efek samping obat" name="efekSamping" required>
						</div>
						<div class="col-md-6">
							<label>Petunjuk Penyimpanan :</label>
							<input type="text" class="form-control" placeholder="masukan metode penyimpanan" name="petunjukPenyimpanan" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-4">
							<div class="row">
								<div class="col-lg-6">
									<label>Pola Makan</label>
									<input type="text" class="form-control" placeholder="Silahkan masukan pola makan" name="polaMakan" required>
								</div>
								<div class="col-lg-6 mt-1 mt-lg-4 align-self-center">
									<span class="text-muted">X sehari</span>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<label>Deskripsi :</label>
							<input type="text" class="form-control" placeholder="Masukan deskripsi obat" name="deskripsi" required>
						</div>
					</div>
					<div class="text-right">
						<a class="btn btn-warning" href="{{ URL::to('/obat') }}"><i class="fas fa-long-arrow-alt-left mr-1"></i>Back</a>
						<button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
					</div>
				</form>
			</div>
		</div>
	@endsection
@section('librariesJS')
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/demo_pages/form_layouts.js') }}"></script>
@endsection
@section('script')
	<script>
		$(document).ready(function(){
	      console.log('hii');
	      function imgPreview(input){
	        if(input.files && input.files[0]){
	          var reader = new FileReader();

	          reader.onload = function (e) {
	            $('#obatImg').attr('src',e.target.result);
	            $('#obatImg').css('visibility','visible');
	            $('#obatImg').attr('width','150px');
	            $('#obatImg').attr('height','150px');
	          }

	          reader.readAsDataURL(input.files[0]);
	        }
	      }

	      $('#gambarObat').change(function(){
	        console.log('asu');
	        imgPreview(this);
	      });
	    });
    </script>
@endsection
