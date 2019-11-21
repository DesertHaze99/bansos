@extends('layouts.app')

	@section('content')
		{{-- start breadcrumb --}}
		<div class="card page-header page-header-light">
		    <div class="page-header-content header-elements-md-inline">
		        <div class="page-title">
		            <h2><span class="font-weight-semibold mx-2">APOTECH</span> - Detail Obat Resep</h2>
		            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		        </div>
		    </div>
		    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ URL::to('/resep')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Resep</a>
			            <a href="{{ URL::to('/resep/'.$resep->resep_id.'/detailResep')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Detail Resep</a>
			            <span class="breadcrumb-item active">Detail Obat Resep</span>
			        </div>
			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>
			</div>
		</div>
		{{-- end breadcrumb --}}
		
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Detail Obat Resep</h5>
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
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Nama Obat</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->obat->name }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Dosis</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->dosis }} {{ $resep->detail[0]->detailObat->satuan }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Aturan Pakai</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->aturan_pakai }}x sehari,{{$resep->detail[0]->takaran_minum }} {{$resep->detail[0]->bentuk_obat }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Waktu Minum</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->waktu_minum }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Keterangan</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->keterangan }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Jumlah Kali Minum</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->jumlah_kali_minum }} Kali</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Jumlah Obat</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->jumlah_obat }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Efek samping</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->detailObat->efek_samping }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Kontraindikasi</p>
										</div>
									</div>
								</td>
								<td>
									<ul>
										@for($i=0;$i < count($resep->detail[0]->obat->kontraindikasiMapping);$i++)
										<li>
											<p class="text-default">
												<div class="font-weight-semibold">{{ $resep->detail[0]->obat->kontraindikasiMapping[$i]->kontraindikasi->kontraindikasi }}</div>
											</p>
										</li>
										@endfor
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Interaksi</p>
										</div>
									</div>
								</td>
								<td>
									<ul>
										@for($i=0;$i < count($resep->detail[0]->obat->interaksiMapping);$i++)
										<li>
											<p class="text-default">
												<div class="font-weight-semibold">{{ $resep->detail[0]->obat->interaksiMapping[$i]->interaksi->interaksi_name }}</div>
											</p>
										</li>
										@endfor
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Petunjuk penyimpanan</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->obat->detailObat->penyimpanan }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Pola makann</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->obat->detailObat->pola_makan }}</div>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div>
											<p class="text-default font-weight-semibold letter-icon-title">Deskripsi</p>
										</div>
									</div>
								</td>
								<td>
									<p class="text-default">
										<div class="font-weight-semibold">{{ $resep->detail[0]->obat->detailObat->obat_description }}</div>
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer text-left">
				<a href="{{ URL::to('/resep/'.$resep->resep_id.'/detailResep')}}" type="button" class="btn btn-primary">Back</a>				
			</div>
		</div>
	@endsection
@section('librariesJS')
	<script type="text/javascript" src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
@endsection
