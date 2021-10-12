<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matpel_guru_mapping extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_guru',
        'id_matpel',
        'ta',
        'semester',
        'kb_peng',
        'kb_ket',
    ];

    public function guru()
    {
        return $this->hasOne('\App\Models\guru','kode_guru','id_guru');
    }

    public function matpel()
    {
        return $this->hasOne('\App\Models\matpel','id','id_matpel');
    }
}
