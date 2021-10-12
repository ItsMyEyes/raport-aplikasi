<?php

namespace App\Http\Controllers;

use App\Models\prakerin;
use Illuminate\Http\Request;

class PrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = prakerin::where('induk',request()->nis)->where('semester',request()->semester)->where('ta',request()->ta)->get();
        return response()->json([
            'data' => $data,
            'message' => 'Success',
            'code' => 200
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
        $rules = Array(
            'induk' => 'required',
            'ta' => 'required',
            'semester' => 'required',
            'nama_tempat' => 'required',
            'lokasi' => 'required',
            'lama' => 'required',
            'keterangan' => 'required',
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

        prakerin::create($request->all());
        return response()->json([
            'message' => 'Berhasil Menginput data',
            'code'=>200
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function show($prakerin)
    {
        $data = prakerin::where('id',$prakerin)->get();
        if ($data->count() > 0) {
           return response()->json([
               'data' => $data[0]
           ]);
        } else {
            return response()->json([
                'data' => null
            ],500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function edit(prakerin $prakerin)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $prakerin)
    {
        $rules = Array(
            'induk' => 'required',
            'ta' => 'required',
            'semester' => 'required',
            'nama_tempat' => 'required',
            'lokasi' => 'required',
            'lama' => 'required',
            'keterangan' => 'required',
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

        prakerin::where('induk',$prakerin)->where('semester',request()->semester)->where('ta',request()->ta)->update($request->all());
        return response()->json([
            'message' => 'Berhasil mengubah data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function destroy(prakerin $prakerin)
    {
        $prakerin->delete();
        return response()->json([
            'message'=>'berhasil menghapus data'
        ]);
    }
}
