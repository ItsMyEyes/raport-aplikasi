<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class siswa extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'nis','nisn','keahlian','password','nama','kelamin','tmp_lhr','tgl_lhr','agama','alamat','kelurahan','kecamatan','kabupaten','kodepos','nohp','email','asal_sltp','alamat_sltp','thn_sttb','no_sttb','thn_skhun','no_skhun','diterima_kls','diterima_tgl','nama_ayah','nama_ibu','alamat_ortu','kelurahan_ortu','kecamatan_ortu','kabupaten_ortu','kodepos_ortu','nohp_ortu','pekerjaan_ortu','nama_wali','alamat_wali','kelurahan_wali','kecamatan_wali','kabupaten_wali','kodepos_wali','nohp_wali','pekerjaan_wali','akses','status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'nisn'
    ];
    

    public function nilai_perPerlajaran()
    {
        return $this->belongsTo('App\Models\NilaiIndividu','induk','nis');
    }
    public function nilai()
    {
        return $this->hasMany('App\Models\NilaiIndividu','induk','nis');
    }
    
    public function kelas()
    {
        return $this->hasOne('App\Models\MappingSiswaKelas','id_siswa','nis');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
