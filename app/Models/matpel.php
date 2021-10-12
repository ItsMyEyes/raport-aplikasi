<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matpel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kelompok',
        'nama',
        'kompetensi',
        'semester',
        'kelas_ajar',
        'desc_peng',
        'desc_ket',
        'desc_sos',
    ];

    
}
