<?php

namespace App\Http\Controllers;

use App\Models\matpel;
use App\Models\matpel_guru_mapping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebMatpelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = matpel_guru_mapping::with(['guru', 'matpel'])->where('ta',Session::get('ta'))->get();
        return view('admin.matpel.index', compact('data'));

    }

    public function showByGuru($kode)
    {
        $data = matpel_guru_mapping::where('id_guru',$kode)->where('ta',request()->ta)->get();
        return response()->json([
            'message' => 'berhasil mendapatkan data matpel',
            'code' => 200,
            'data' => $data
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matpel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=array(
            'kelompok' => 'required',
            'nama' => 'required',
            'guru' => 'required',
            'kb_peng' => 'required',
            'kb_ket' => 'required',
        );

        $checkingGuru = User::where('kode_login', $request->guru)->first();
        if (!isset($checkingGuru) && is_null($checkingGuru)) {
            return back()->withErrors(['msg' => 'Guru tidak ditemukan']);
        }

        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return back()->withErrors(['msg' => $errors]);
        }

        $result = matpel::create([
            'kelompok' => $request->kelompok,
            'nama' => $request->nama,
            'kompetensi' => 'multimedia',
            'semester' => '1',
            'kelas_ajar' => '10',
            'desc_peng' => '-',
            'desc_ket' => '-',
            'desc_sos' => '-',
        ]);

        matpel_guru_mapping::create([
            'id_guru' => $request->guru,
            'id_matpel' => $result->id,
            'ta' => Session::get('ta')['ta'],
            'semester' => '1',
            'kb_peng' => $request->kb_peng,
            'kb_ket' => $request->kb_ket
        ]);

        return redirect()->route('matpel.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\matpel  $matpel
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\matpel  $matpel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matpel = matpel_guru_mapping::where('id_matpel',$id)->with(['matpel','guru'])->first();
        return view('admin.matpel.edit', compact('matpel'));
    }
    
    public function show($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\matpel  $matpel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=array(
            'kelompok' => 'required',
            'nama' => 'required',
            'guru' => 'required',
            'kb_peng' => 'required',
            'kb_ket' => 'required',
        );

        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return back()->withErrors(['msg' => $errors]);
        }
        
        $result = matpel::find($id)->update([
            'kelompok' => $request->kelompok,
            'nama' => $request->nama,
            'kompetensi' => 'multimedia',
            'semester' => '1',
            'kelas_ajar' => '10',
            'desc_peng' => '-',
            'desc_ket' => '-',
            'desc_sos' => '-',
        ]);

        matpel_guru_mapping::where('id_matpel', $id)->update([
            'id_guru' => $request->guru,
            'id_matpel' => $id,
            'ta' => Session::get('ta')['ta'],
            'semester' => '1',
            'kb_peng' => $request->kb_peng,
            'kb_ket' => $request->kb_ket
        ]);

        return redirect()->route('matpel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\matpel  $matpel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matpel = matpel::find($id);
        if (is_null($matpel)) {
            return back()->withErrors(['msg' => 'data tidak ditemukan']);
        }
        matpel_guru_mapping::where('id_matpel', $id)->first()->delete();
        $matpel->delete();
        return back();
    }
}
