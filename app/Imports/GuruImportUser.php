<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'kode_login' => $row[0],
            'nama' => $row[2],
            'password' => bcrypt($row[0]),
            'email' => $row[3],
            'akses' => 'guru'
        ]);
    }
}
