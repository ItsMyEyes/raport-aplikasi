<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cas extends Model
{
    use HasFactory;
    protected $fillable = [
        'induk',
        'ta',
        'semester',
        'sakit',
        'ijin',
        'alpa',
        'catatan',
        'sikap',
    ];
}
