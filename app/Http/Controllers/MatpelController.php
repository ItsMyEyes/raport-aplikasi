<?php

namespace App\Http\Controllers;

use App\Models\matpel;
use App\Models\matpel_guru_mapping;
use Illuminate\Http\Request;

class MatpelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = matpel::all();
        return response()->json([
            'message' => 'berhasil mendapatkan data matpel',
            'code' => 200,
            'data' => $data
        ],200);
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
            'kelompok' => 'required',
            'nama' => 'required',
            'kompetensi' => 'required',
            'semester' => 'required',
            'kelas_ajar' => 'required',
            'desc_peng' => 'required',
            'desc_ket' => 'required',
            'desc_sos' => 'required',
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

        $result = matpel::create($request->all());
        return response()->json([
            'message'=>'berhasil merekam data master pelajaran',
            'code' => 201,
            'data' => $result
        ],201);

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
        $matpel = matpel::find($id);
        return response()->json([
            'message' => 'berhasil mendapatkan data matpel',
            'code'=>200,
            'data'=>$matpel
        ]);
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
            'kompetensi' => 'required',
            'semester' => 'required',
            'kelas_ajar' => 'required',
            'desc_peng' => 'required',
            'desc_ket' => 'required',
            'desc_sos' => 'required',
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

        $result = matpel::find($id)->update($request->all());
        return response()->json([
            'message'=>'berhasil mengubah data master pelajaran',
            'code' => 201,
            'data' => $result
        ],201);
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
        $message = "data dengan nama pelajaran $matpel->nama sudah terhapus";
        $matpel->delete();
        return response()->json([
            'message' => $message,
            'code'=>200,
        ]);
    }
}
