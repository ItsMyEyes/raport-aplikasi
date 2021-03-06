<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function countHome()
    {
        $matpel = \App\Models\matpel_guru_mapping::count();
        $guru = \App\Models\guru::count();
        $siswa = \App\Models\siswa::count();
        return response()->json([
            "message" => "success get data",
            "code" => 200,
            "data" => [
                "matpel" => $matpel,
                "guru" => $guru,
                "siswa" => $siswa,
            ]
        ]);
    }
}
