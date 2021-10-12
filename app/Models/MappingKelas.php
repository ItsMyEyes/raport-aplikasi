<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'wali_kelas','id_kelas','ta'
    ];

    public function guru()
    {
        return $this->hasOne('App\Models\User','kode_login','wali_kelas');
    }
    public function kelas()
    {
        return $this->hasOne('App\Models\kelas','id','id_kelas');
    }
}
