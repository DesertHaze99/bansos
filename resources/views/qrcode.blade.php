<!DOCTYPE html>
<html>
<head>  
    @include('layouts.includes.head')
    @include('layouts.includes.script')
	<title></title>
</head>
<body>

    
    
<div class="visible-print text-center">
        
    <!-- Multiple row inputs (horizontal) -->
<div class="card"></div>
<div class="content">
    <div class="card">
        <h1> INI PRINT ANJ </h1>
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

        <div class="card-body">
            <form action="#">
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">First form group</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First row, first input">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Second row, first input">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First row, second input">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Second row, second input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">First form group</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First row, first input">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Second row, first input">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First row, second input">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Second row, second input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /multiple row inputs (horizontal) -->
</div>

    <div> 

    </div>
    <h3>No : {{$resep->resep_id}} </h3> <h3>Tanggal : {{date('Y-m-d')}} </h3>
    <h2>Nama : {{ $resep->pasien->nama }} </h2>

    @foreach ($resep->detail as $item)
        <h2>{{$item->obat->name}} {{$item->jumlah_obat}} {{$item->detailObat->kesediaan}} {{$item->detailObat->satuan}}   </h2>
        <h3> {{$item->detailObat->pola_makan }} kali hari {{$item->takaran_minum}} {{$item->bentuk_obat}}</h3>
        <h2>{{$item->waktu_minum}}</h2>
         
    @endforeach
    
    


    {!! QrCode::size(250)->generate(
        '<h1> INI ADALAH QR CODE </h1>'
    ); !!}
</div>
    
</body>
</html>