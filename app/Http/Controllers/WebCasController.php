<?php

namespace App\Http\Controllers;

use App\Models\cas;
use App\Models\MappingSiswaKelas;
use App\Models\matpel_guru_mapping;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebCasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = request()->kelas;
        $list_kelas = MappingSiswaKelas::where('id_kelas', $kelas)->with('siswa')->get();
        $matpel = matpel_guru_mapping::where('ta', Session::get('ta')['ta'])->with(['guru','matpel'])->get();
        $data = \App\Models\MappingKelas::where('ta',Session::get('ta')['ta'])->with('kelas')->get();
        return view('admin.cas.index',compact('list_kelas','matpel','data','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $matpel = matpel_guru_mapping::where('id_matpel', $request->matpel)->where('ta', Session::get('ta')['ta'])->with(['matpel','guru'])->first();
        $siswa = siswa::where('nis', $request->nis)->first();
        $type = $request->type;
        $semester = $request->semester;
        $b = cas::where('induk',$request->nis)->where('semester',$request->semester)->where('ta',Session::get('ta')['ta'])->first();
        if (!isset($siswa) && is_null($siswa) || is_null($type) || is_null($semester)) {
            return redirect()->route('cas.index')->withErrors(['msg' => 'Invalid parameter']);
        }
        return view('admin.cas.create', compact('type','siswa','matpel','semester','b'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $a = Cas::where('induk',$request->id_siswa)->where('semester',$request->semester)->where('ta',Session::get('ta')['ta'])->first();
        if (is_null($a)) {
            $a = new Cas;
        }
        $a->induk = $request->id_siswa;
        $a->semester = $request->semester;
        $a->sakit = $request->sakit;
        $a->ijin = $request->ijin;
        $a->alpa = $request->alpa;   
        $a->ta = Session::get('ta')['ta'];
        $a->catatan = $request->catatan;
        $a->sikap = $request->sikap;
        $a->save();
        return redirect()->route('cas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $nis)
    {
        $b = cas::where('induk',$nis)->where('semester',$request->semester)->where('ta',Session::get('ta')['ta'])->first();
        return view('admin.cas.edit', compact('b'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function edit(Cas $cas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cas $cas)
    {
        //
    }
}