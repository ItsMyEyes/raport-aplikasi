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
        $checking = \App\Models\siswa::where('nis',$row[1])->first();
        if (!isset($checking) && is_null($checking)) {
            return;
            // throw new Exception("Error Processing Request", 1);
        }
        return new \App\Models\MappingSiswaKelas([
            'id_siswa' => $row[1],
            'id_kelas' => request()->id_kelas,
            'semester' => '1',
            'absen' => $row[0],
            'ta' => request()->ta
        ]);
    }
}