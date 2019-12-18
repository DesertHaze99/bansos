<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resep Apotik UGM</title>
    <style>
        /* @font-face {
            font-family: myFirstFont;
            src: url(Gidole-Regular.otf);
        } */
        *{
            margin:"0px";
            padding:"0px";
            font-family:"myFirstFont";
        }
    </style>
</head>
<body>
<div style="display:flex;">
    <div style="width:180px;padding-top:15px;padding-bottom:15px;margin-left:15px">
        <div style="font-size:12px">Nama Pasien</div>
        <div><strong>{{ $resep->pasien->nama }}</strong></div>
        <br>
        <div style="font-size:12px">Resep Obat</div>
        @foreach ($resep->detail as $item)
            <div>
                {{$item->obat->name}} {{$item->jumlah_obat}} {{$item->detailObat->kesediaan}} {{$item->detailObat->satuan}}
            </div>
            <div>{{$item->detailObat->pola_makan }} kali hari {{$item->takaran_minum}} {{$item->bentuk_obat}}</div>
            <div>{{$item->waktu_minum}}</div>
        @endforeach
    </div>
    <div style="float:right;padding-top:15px">
        <div>
            <img src="{{ public_path('/images/qrcode/'.$pdfname.'.png') }}" width="130px" height="130px">
        </div>
    </div>
</div>
    <hr>
    <P style="padding-top:5px;width:180px;margin-left:15px"><b>APOTECH.ID</b></p>
    <p style="width:180px;margin-left:15px">Laboratorium MFFM UGM</p>
    <p style="width:180px;margin-left:15px">Jl. Sekip Utara Yogyakarta</p>
</body>
</html>
