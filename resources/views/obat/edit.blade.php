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
	                <h4><i class="icon fa fa-ban"></i> Success!</h4>
	                    {{ session('error') }}
	            </div>
	        </div>
	    @endif

		{{-- start breadcrumb --}}
		<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Edit obat</h2>
		            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/obat')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>obat</a>
			            <span class="breadcrumb-item active">Edit</span>
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
				<form action="{{ route('obat.update', $obat->obat_id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label>Nama Obat :</label>
						<input type="text" class="form-control" value="{{ $obat->name }}" placeholder="Silahkan masukan name obat" name="nama" required>
					</div>
					<div class="form-group">
						<label>Gambar Obat :</label>
						<div class="uniform-uploader">
							<input id="gambarObat" type="file" class="form-input-styled" data-fouc="" name="gambarObat">
						</div>
						<span class="form-text text-muted">Accepted formats:png, jpg. Max file size 2Mb</span>
						<img id="obatImg" src="{{ $obat->detailObat->obat_image }}" height="" width="" style="visibility: hidden;">
					</div>
					<div class="form-group">
						<label>Bentuk Obat :</label>
						<select class="form-control" placeholder="Silahkan pilih bentuk obat" name="bentuk" required>
							@for($i=0;$i < count($bentukObat); $i++)
								@if($obat->detailObat->bentuk_obat == $bentukObat[$i]->bentuk_obat_id)
									<option value="{{ $bentukObat[$i]->bentuk_obat_id }}" selected> {{ $bentukObat[$i]->bentuk }} </option>
								@else
									<option value="{{ $bentukObat[$i]->bentuk_obat_id }}"> {{ $bentukObat[$i]->bentuk }} </option>
								@endif
							@endfor
						</select>
					</div>
					<div class="form-group">
						<label>Kesediaan :</label>
						<input type="text" class="form-control" value="{{ $obat->detailObat->kesediaan }}" placeholder="Silahkan pilih bentuk obat" name="kesediaan" required>
					</div>
					<div class="form-group">
						<label>Satuan :</label>
						<select class="form-control" name="satuan" required>
							@for($i=0;$i < count($satuan);$i++)
								@if($satuan[$i] == $obat->detailObat->satuan)
									<option selected>{{ $satuan[$i] }}</option>
								@else
									<option>{{ $satuan[$i] }}</option>
								@endif
							@endfor
						</select>
					</div>
					<div class="form-group">
						<label>Kontraindikasi :</label>
						<select multiple="multiple" data-placeholder="Pilih kontraindikasi obat" class="form-control form-control-select2" data-fouc name="kontraindikasi[]" required>
							@for($i=0;$i < count($kontraindikasi);$i++)
								@if(in_array($kontraindikasi[$i]->kontraindikasi_id,$kontraindikasiMapping))
									<option value="{{ $kontraindikasi[$i]->kontraindikasi_id}}" selected>{{ $kontraindikasi[$i]->kontraindikasi }}</option>
								@else
									<option value="{{ $kontraindikasi[$i]->kontraindikasi_id}}">{{ $kontraindikasi[$i]->kontraindikasi }}</option>
								@endif
							@endfor
						</select>
					</div>
					<div class="form-group">
						<label>Interaksi :</label>
						<select multiple="multiple" data-placeholder="Pilih kontraindikasi obat" class="form-control form-control-select2" data-fouc name="interaksi[]" required>
							@for($i=0;$i < count($interaksi);$i++)
								@if(in_array($interaksi[$i]->interaksi_id,$interaksiMapping))
									<option value="{{ $interaksi[$i]->interaksi_id}}" selected>{{ $interaksi[$i]->interaksi_name }}</option>
								@else
									<option value="{{ $interaksi[$i]->interaksi_id}}">{{ $interaksi[$i]->interaksi_name }}</option>
								@endif
							@endfor
						</select>
					</div>
					<div class="form-group">
						<label>Efek Samping :</label>
						<input type="text" class="form-control" value="{{ $obat->detailObat->efek_samping }}" placeholder="Silahkan pilih bentuk obat" name="efekSamping" required>
					</div>
					<div class="form-group">
						<label>Petunjuk Penyimpanan :</label>
						<input type="text" class="form-control" value="{{ $obat->detailObat->penyimpanan }}" placeholder="Silahkan pilih bentuk obat" name="petunjukPenyimpanan" required>
					</div>
					<div class="form-group">
						<label>Pola Makan</label>
						<input type="text" class="form-control" value="{{ $obat->detailObat->pola_makan }}" placeholder="Silahkan pilih bentuk obat" name="polaMakan" required>
					</div>
					<div class="form-group">
						<label>Deskripsi :</label>
						<input type="text" class="form-control" value="{{ $obat->detailObat->obat_description }}" placeholder="Silahkan pilih bentuk obat" name="deskripsi" required>
					</div>
					<div class="text-right">
						<button class="btn btn-warning" action="{{ URL::to('/obat') }}">Back</button>
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