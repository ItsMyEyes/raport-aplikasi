<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingSiswaKelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa','id_kelas','semester','absen','ta'
    ];

    public function siswa()
    {
        return $this->hasOne('App\Models\siswa','nis','id_siswa');
    }
    public function kelas()
    {
        return $this->hasOne('App\Models\MappingKelas','id_kelas','id_kelas');
    }

    public function nilai()
    {
        return $this->hasMany('\App\Models\NilaiIndividu','induk','id_siswa');
    }
}
