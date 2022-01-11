<?php

namespace App\Http\Controllers;

use App\Models\matpel;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = User::count();
        $siswa = siswa::count();
        $matpel = matpel::count();
        return view('admin.dashboard.index',compact('guru','siswa','matpel'));
    }
}
