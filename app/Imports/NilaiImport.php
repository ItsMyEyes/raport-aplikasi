<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;

class NilaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new \App\Models\NilaiIndividu([
            'induk' => $row[0],
            'matpel' => request()->id_matpel, 
            'ta' => request()->ta,
            'semester' => request()->semester,
            'p1' => $row[1],
            'p2' => $row[2],
            'p3' => $row[3],
            'k1' => $row[4],
            'k2' => $row[5],
            'k3' => $row[6],
            'catatan' => '-' 
        ]);
    }
}
