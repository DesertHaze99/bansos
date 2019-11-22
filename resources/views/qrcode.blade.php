<!DOCTYPE html>
<html>
<head>  
    @include('layouts.includes.head')
    @include('layouts.includes.script')
    <style type="text/css">
        body{
            margin-left: 10%;
            margin-right: 10%;
        }

        #barcode{
            float: right;
            padding: 0px;
        }
    </style>
	<title></title>
</head>
<body>
    <div class="visible-print text-center">
        <div class="content">
            <div class="card">
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-sm-3" style="float:right; padding-top:0.5%">
                            <img src="https://image.freepik.com/free-vector/group-medical-staff-carrying-health-related-icons_53876-43071.jpg" width="70%; height:70%;">
                        </div>
                        <div class="col-sm-9">
                            <br>
                            <h1 class="mb-0 font-weight-bold" style="font-size:40px;">APOTEK</h1>
                            <h3 class="mb-0" style="font-size:30px">Laboratorium MFFM UGM</h3>
                            <h6 class="mb-0" >Jl. Sekip Utara Jogjakarta </h6>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Cetak Resep</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <!-- Traffic sources -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h1 class="font-weight-semibold"> No : {{$resep->resep_id}}</h1>
                </div>

                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                    <a href="#" class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon mr-3" >
                                        <i class="icon-people"></i>
                                        
                                    </a>
                                <div>
                                    <div class="font-weight-semibold"> <h1></h1><h2>{{ $resep->pasien->nama }}</h2></div>
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3">
                                    <i class="icon-watch2"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold"> <h1></h1><h2 class="text-muted">{{date('Y-m-d')}}</h2></div>
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="padding-right: 0px">
                        <div class="col-sm-6" >
                            <div class="align-items-center justify-content-center">
                                <br>
                                <br><br>
                                @foreach ($resep->detail as $item)
                                    <h2>{{$item->obat->name}} {{$item->jumlah_obat}} {{$item->detailObat->kesediaan}} {{$item->detailObat->satuan}}</h2> <br>
                                    <h3> {{$item->detailObat->pola_makan }} kali hari {{$item->takaran_minum}} {{$item->bentuk_obat}}</h3> <br>
                                    <h2>{{$item->waktu_minum}}</h2>
                                    
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-6" id="barcode" >
                            <div class="align-items-center justify-content-center"  >
                                <center>
                                {!! QrCode::size(250)->generate(
                                    '<h1> PASIEN : {{ $resep->pasien->nama }} </h1> <h1>Link : http://localhost:8000/resep/13/qr? </h1>'
                                ); !!}
                            </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /traffic sources -->
        </div>
        <!-- /multiple row inputs (horizontal) -->
    </div>
</div>
    
</body>
</html>
