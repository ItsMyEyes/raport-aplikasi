<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prakerin extends Model
{
    use HasFactory;
    protected $fillable = [
        'induk','ta','semester','nama_tempat','lokasi','lama','keterangan'
    ];
}
