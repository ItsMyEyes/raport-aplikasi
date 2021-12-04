<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = \App\Models\MappingKelas::with('guru')->with('kelas')->where('ta',request()->ta)->get();
        $data = Array();
        foreach ($kelas as $key => $value) {
            $data[$key]['id'] = (int)$value->id;
            $data[$key]['id_kelas'] = (int)$value->id_kelas;
            $data[$key]['wali_kelas'] = $value->wali_kelas;
            $data[$key]['guru']['nama'] = isset($value->guru) && !is_null($value->guru) ? $value->guru->nama : "Tidak ada wali kelas";
            $data[$key]['kelas']['id'] = (int)$value->id_kelas;;
            $data[$key]['kelas']['kelas'] = $value->kelas->kelas;
            $data[$key]['kelas']['tingkat'] = $value->kelas->tingkat;
            $data[$key]['kb_ket'] = (int)$value->kb_ket;
            $data[$key]['kb_peng'] = (int)$value->kb_peng;
        }
        return response()->json([
            'message'=>'Berhasil data kelas',
            'code' => 200,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function mappingStore(Request $request)
    {
        $condition = $request->id_kelas;
        if ($condition) {
            $same = \App\Models\MappingKelas::where('id_kelas',$condition)->where('ta',$request->ta)->get();
            if ($same->count() < 1) {
                $s = new \App\Models\MappingKelas;
                $s->id_kelas = $condition;
                $s->wali_kelas = $request->wali_kelas;
                $s->ta =$request->ta;
                $s->save();
            }else{
                $same[0]->id_kelas = $condition;
                $same[0]->wali_kelas = $request->wali_kelas;
                $same[0]->ta =$request->ta;
                $same[0]->save();
            }
        }
        return response()->json([
            'message' => 'Berhasil Mapping Kelas Dan Wali Kelas',
            'code' => 201
        ]);
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
            'tingkat' => 'required',
            'kelas' => 'required',
        );

        
        if (\App\Models\User::where('kode_login',$request->wali_kelas)->where('akses','guru')->get()->count() < 1) {
            return response()->json([
                'message' => 'Kode guru tidak ditemukan',
                'code' => 404,
                'data' => $request->wali_kelas
            ],404);
        }

        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json([
                'message' => 'something error',
                'code' => 500,
                'data' => $errors
            ],500);
        }

        $b = Kelas::create([
            'keahlian' => 'Multimedia',
            'tingkat' => $request->tingkat,
            'kelas' => $request->kelas,
            'jenis' => '0'
        ]);

        

        return response()->json([
            'message' => 'Berhasil merekam data kelas',
            'code' => 201,
            'data' => $b
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = \App\Models\MappingKelas::where('id_kelas',$id)->with('guru')->with('kelas')->where('ta',request()->ta)->get();
        return response()->json([
            'message'=>'Berhasil data kelas',
            'code' => 200,
            'data' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (\App\Models\User::where('kode_login',$request->wali_kelas)->where('akses','guru')->get()->count() < 1) {
            return response()->json([
                'message' => 'Kode guru tidak ditemukan',
                'code' => 404,
                'data' => $request->wali_kelas
            ],404);
        }
        $b = Kelas::find($id);
        $b->keahlian = 'Multimedia';
        $b->tingkat = $request->tingkat;
        $b->kelas = $request->kelas;
        $b->save();
        return response()->json([
            'message' => 'Berhasil merubah data kelas',
            'code' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Models\MappingKelas::where('id_kelas',$id)->where('ta',request()->ta)->delete();
        \App\Models\kelas::find($id)->delete();
        return response()->json([
            'message' => 'Berhasil menghapus data kelas',
            'code' => 200
        ]);
    }
}
