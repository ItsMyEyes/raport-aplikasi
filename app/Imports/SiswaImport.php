<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        \App\Models\MappingSiswaKelas::create([
            'id_siswa' => $row[0],
            'id_kelas' => request()->id_kelas,
            'ta' => request()->ta,
            'semester' => '1',
            'absen' => '1'
        ]);
        return new \App\Models\siswa([
            'nis' => $row[0],
            'password' => bcrypt($row[0]),
            'nisn' => $row[1],
            'nama' => $row[2],
            'kelamin' => $row[3],
            'tmp_lhr' => $row[4],
            'tgl_lhr' => $row[5],
            'agama' => $row[6],
            'alamat' => $row[7],
            'kelurahan' => $row[8],
            'kecamatan' => $row[9],
            'kabupaten' => $row[10],
            'kodepos' => $row[11],
            'nohp' => $row[12],
            'email' => $row[13],
            'keahlian' => 'Multimedia',
            
            'asal_sltp' => '-',
            'alamat_sltp' => '-',
            'thn_sttb' => '-',
            'no_sttb' => '-',
            'thn_skhun' => '-',
            'no_skhun' => '-',
            'diterima_kls' => '-',
            'diterima_tgl' => '-',

            'nama_ayah' => '-',
            'nama_ibu' => '-',
            'alamat_ortu' => '-',
            'kelurahan_ortu' => '-',
            'kecamatan_ortu' => '-',
            'kabupaten_ortu' => '-',
            'kodepos_ortu' => '-',
            'nohp_ortu' => '-',
            'pekerjaan_ortu' => '-',

            'nama_wali' => '-',
            'alamat_wali' => '-',
            'kecamatan_wali' => '-',
            'kabupaten_wali' => '-',
            'kodepos_wali' => '-',
            'nohp_wali' => '-',
            'pekerjaan_wali' => '-',

            'akses' => '0',
            'status' => '10',
        ]);
    }
}