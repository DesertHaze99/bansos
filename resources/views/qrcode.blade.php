<!DOCTYPE html>
<html>
<head>
    {{-- <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <style type="text/css">
        body{
            margin-left: 10%;
            margin-right: 10%;
        }

        #barcode{
            float: right;
            padding: 0px;
        }

        table, th, td {
          border: 1px solid black;
          background-color: white;
        }
    </style>
    <title></title>
</head>
<body>
    <table style="width:50%">
      <tr>
        <th class="text-center">
            <h1 class="mb-0 font-weight-bold" style="font-size:40px;">APOTEK</h1>
            <h3 class="mb-0" style="font-size:30px">Laboratorium MFFM UGM</h3>
            <h6 class="mb-0" >Jl. Sekip Utara Jogjakarta </h6>
        </th>
      </tr>
      <tr>
        <td>
            <div class="row">
                <div class="col-md-8 text-center">
                    <table style="margin-top: 10px; border: none;">
                        @foreach ($resep->detail as $item)
                            <tr class="text-center" style="border: none;">
                                <td style="border: none;">{{$item->obat->name}} {{$item->jumlah_obat}} {{$item->detailObat->kesediaan}} {{$item->detailObat->satuan}} -- </td>
                                <td style="border: none;">{{$item->detailObat->pola_makan }} kali hari {{$item->takaran_minum}} {{$item->bentuk_obat}} -- </td>
                                <td style="border: none;">{{$item->waktu_minum}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-md-4">
                    <center>
                        {!! QrCode::size(150)->generate(
                            '<h1> PASIEN : {{ $resep->pasien->nama }} </h1> <h1>Link : http://localhost:8000/resep/13/qr </h1>'
                        ); !!}
                    </center>
                </div>
            </div>
        </td>
      </tr>
    </table>
</body>
</html>
