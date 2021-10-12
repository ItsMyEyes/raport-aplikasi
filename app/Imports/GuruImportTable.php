<?php

namespace App\Imports;

use App\Models\guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImportTable implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new guru([
            'kode_guru' => $row[0],
            'nip' => $row[1],
            'nama' => $row[2],
            'no_hp' => $row[4],
        ]);
    }
}
