<?php

namespace App\Http\Controllers;

use App\Models\cas;
use Illuminate\Http\Request;

class CasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cas.import');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b = Cas::create($request->all());
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cas  $cas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $nis)
    {
        $b = cas::where('induk',$nis)->where('semester',$request->semester)->where('ta',$request->ta)->get();
        if ($b->count() > 0) {
            return response()->json([
                'datas' => $b[0],
            ]);;
        } else {
            return response()->json([
                'data' => null
            ],500);
        }
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
        $a = Cas::where('induk',$request->id)->where('semester',$request->semester)->where('ta',$request->ta)->first();
        $a->sakit = $request->sakit;
        $a->ijin = $request->ijin;
        $a->alpa = $request->alpa;   
        $a->catatan = $request->catatan;
        $a->sikap = $request->sikap;
        $a->save();
        return response()->json([
            'datas' => $a,
        ]);;
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