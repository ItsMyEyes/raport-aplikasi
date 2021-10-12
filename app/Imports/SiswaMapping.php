<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;

class SiswaMapping implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new \App\Models\MappingSiswaKelas([
            'id_siswa' => $row[1],
            'id_kelas' => request()->id_kelas,
            'semester' => '1',
            'absen' => $row[0],
            'ta' => request()->ta
        ]);
    }
}