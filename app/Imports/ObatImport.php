<?php

namespace App\Imports;

use App\Obat;
use App\DetailObat;
use Maatwebsite\Excel\Concerns\ToModel;

class ObatImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        new Obat([
            'name' => $row[0],
        ]);

        new DetailObat([
            'bentuk_obat' => $row[1],
            'kesediaan'=>$row[2],
            'satuan'=> $row[3],
            'efek_samping' => $row[4],
            'pola_makan' => $row[5],
            'penyimpanan' => $row[6],
            'obat_description' => $row[7],
        ]);
    }
}
