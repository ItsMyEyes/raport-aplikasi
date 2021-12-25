<?php

namespace App\Http\Controllers;

use App\Models\matpel_guru_mapping;
use Illuminate\Http\Request;

class MatpelGuruMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = matpel_guru_mapping::where('ta',request()->ta)->with(['guru','matpel'])->get();
        $data = Array();
        foreach ($result as $key => $value) {
            $data[$key] = $value;
            $data[$key]['guru']['nama'] = (!is_null($value['guru'])) ? $value['guru']['nama'] : "Tidak ada Guru";
        }
        return response()->json([
            'message'=>'berhasil mengubah data master pelajaran',
            'code' => 200,
            'data' => $data
        ],200);
    }

    public function kelompok()
    {
        $result = matpel_guru_mapping::where('ta',request()->ta)->whereHas('matpel', function ($q)
        {
            $q->where('kelompok',request()->kelompok);
        })->with(['guru','matpel'])->get();
        return response()->json([
            'message'=>'berhasil mengubah data master pelajaran',
            'code' => 200,
            'data' => $result
        ],200);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=array(
            'id_guru' => 'required',
            'id_matpel' => 'required',
            'ta' => 'required',
            'semester' => 'required',
            'kb_peng' => 'required',
            'kb_ket' => 'required',
        );
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
        $result = matpel_guru_mapping::create($request->all());
        return response()->json([
            'message'=>'berhasil mengubah data master pelajaran',
            'code' => 201,
            'data' => $result
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\matpel_guru_mapping  $matpel_guru_mapping
     * @return \Illuminate\Http\Response
     */
    public function show($matpel_guru_mapping)
    {
        $result = matpel_guru_mapping::where('id_matpel',$matpel_guru_mapping)->where('ta',request()->ta)->with(['guru','matpel'])->first();
        $result['guru']['kode_guru'] = isset($result->guru) && !is_null($result->guru) ? $result->guru->kode_login : 0;
        return response()->json([
            'message'=>'berhasil mendapatkan data master pelajaran',
            'code' => 200,
            'data' => $result
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\matpel_guru_mapping  $matpel_guru_mapping
     * @return \Illuminate\Http\Response
     */
    public function edit(matpel_guru_mapping $matpel_guru_mapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\matpel_guru_mapping  $matpel_guru_mapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=array(
            'id_guru' => 'required',
            'id_matpel' => 'required',
            'ta' => 'required',
            'semester' => 'required',
            'kb_peng' => 'required',
            'kb_ket' => 'required',
        );
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
        $result = matpel_guru_mapping::where('id_matpel',$id)->update($request->all());
        return response()->json([
            'message'=>'berhasil mengubah data master pelajaran',
            'code' => 201,
            'data' => $result
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\matpel_guru_mapping  $matpel_guru_mapping
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matpel = matpel_guru_mapping::find($id);
        $message = "data dengan nama pelajaran ".$matpel->matpel->nama." sudah terhapus";
        $matpel->delete();
        return response()->json([
            'message' => $message,
            'code'=>200,
        ]);
    }
}
