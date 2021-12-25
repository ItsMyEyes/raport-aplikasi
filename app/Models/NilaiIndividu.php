<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiIndividu extends Model
{
    protected $table = 'nilais';
    protected $fillable = [
        'induk','matpel','ta','semester','p1','p2','p3','k1','k2','k3','s1','s2','s3','s4','catatan','type'
    ];
    public function siswa()
    {
        return $this->hasOne('App\Models\siswa','nis','induk');
    }
    public function kelas()
    {
        return $this->hasOne('App\Models\MappingSiswaKelas','id_siswa','nis');
    }
    public function bSiswa()
    {
        return $this->belongsTo('App\Models\Siswa','nis','induk');
    }
    public function matpels()
    {
        return $this->hasOne('App\Models\matpel_guru_mapping','id_matpel','matpel');
    }

    public $timestamps = false;
}
