@extends('layouts.app')

@section('content')
	{{-- start breadcrumb --}}
	<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Ubah obat pada resep</h2>
		            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/resep')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Resep</a>
			            <a href="{{ URL::to('/resep/'.$detailResep->resep_id.'/detailResep')}}" class="breadcrumb-item">Detail Resep</a>
			            <span class="breadcrumb-item active">Edit</span>
			        </div>
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
			<form action="{{ route('detailResep.update',$detailResep->detail_resep_id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label>Nama Obat :</label>
					<input type="hidden" name="namaObat" value="{{ $detailResep->obat_id }}">
					<input type="text" class="form-control" readonly value="{{$detailResep->obat->name}} {{$detailResep->detailObat->kesediaan}} {{$detailResep->detailObat->satuan}}">
					{{-- <select id="namaObat" class="form-control" name="namaObat" readonly>
						@for($i=0;$i <count($obat) ;$i++)
							@if($detailResep->obat_id == $obat[$i]->obat_id)
								<option value="{{ $obat[$i]->obat_id }}" selected>{{ $obat[$i]->name }} {{$obat[$i]->detailObat->kesediaan}} {{$obat[$i]->detailObat->satuan}}</option>
							@else
								<option value="{{ $obat[$i]->obat_id }}">{{ $obat[$i]->name }} {{$obat[$i]->detailObat->kesediaan}} {{$obat[$i]->detailObat->satuan}} </option>
							@endif
						@endfor
					</select> --}}
				</div>
				<div class="form-group">
					<label>Dosis :</label>
					<input id="dosis" type="number" class="form-control" placeholder="Silahkan masukan dosis" value="{{ $detailResep->dosis }}" name="dosis">
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-8">
							<label>Aturan pakai</label>
							<input type="number" class="form-control" placeholder="Masukan aturan pakai" value="{{ $detailResep->aturan_pakai }}" name="aturanPakai">
						</div>
						<div class="col-md-4 mt-1 mt-sm-3 align-self-center">
							<span class="text-muted">Kali sehari</span>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-9">
						<label>Takaran minum :</label>
						<input id="takaran" type="number" class="form-control" placeholder="Silahkan masukan nomor telepon pasien" value="{{ $detailResep->takaran_minum }}" name="takaranMinum" readonly>
					</div>
					<div class="col-md-3">
						<label>Bentuk Obat :</label>
						<input id="bentukObat" type="text" class="form-control" placeholder="Silahkan masukan alamat pasien" value="{{ $detailResep->bentuk_obat }}" name="bentukObat" readonly>	
					</div>
				</div>
				<div class="form-group">
					<label>Waktu Minum :</label>
					<select type="text" class="form-control" name="waktuMinum">
						@for($i=0;$i<count($waktuMinum);$i++)
							@if($detailResep->waktu_minum == $waktuMinum[$i])
								<option value="{{$waktuMinum[$i]}}" selected>{{$waktuMinum[$i]}}</option>
							@else
								<option value="{{$waktuMinum[$i]}}" >{{$waktuMinum[$i]}}</option>
							@endif
						@endfor
					</select>
				</div>
				<div class="form-group">
					<label>Keterangan :</label>
					<select type="text" class="form-control" name="keterangan">
						@for($i=0;$i<count($keterangan);$i++)
							@if($detailResep->keterangan == $keterangan[$i])
								<option value="{{$keterangan[$i]}}" selected>{{$keterangan[$i]}}</option>
							@else
								<option value="{{$keterangan[$i]}}" >{{$keterangan[$i]}}</option>
							@endif
						@endfor
					</select>
				</div>
				<div class="form-group">
					<label>Jumlah Obat :</label>
					<input id="jumlahObat" type="number" class="form-control" placeholder="Silahkan masukan alamat pasien" value="{{ $detailResep->jumlah_obat }}" name="jumlahObat">	
				</div>
				<div class="form-group">
					<label>Jumlah Kali Minum :</label>
					<input id="jumlahKaliMinum" type="number" class="form-control" placeholder="Silahkan masukan alamat pasien" value="{{ $detailResep->jumlah_kali_minum }}" name="jumlahKaliMinum" readonly>	
				</div>
				<div class="text-right">
					<button class="btn btn-warning" action="{{ URL::to('/pasien') }}">Back</button>
					<button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('script')
	<script>
		$(document).ready(function(){
			var kesediaan = {{ $detailResep->detailObat->kesediaan }};
			
			var takaran = 0;
			$('#dosis').on('keyup',function(){
				var dosis = $(this).val();
				takaran = kesediaan/dosis;
				$('#takaran').val(takaran);
			});

			$('#jumlahObat').on('keyup',function(){
				console.log('asu');
				var jumlahObat = $(this).val();
				var jumlahKaliMinum = jumlahObat/takaran;
				$('#jumlahKaliMinum').val(jumlahKaliMinum);
			})
		});
	</script>
@endsection
