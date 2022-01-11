<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\User::all();
        $show = new \App\Http\Resources\GuruResources($data);
        return view('admin.user.index', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'kode_guru' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        );

        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return back()->withErrors(['msg' => $errors]);
        }

        guru::create([
            'kode_guru'=>$request->kode_guru,
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'no_hp'=>$request->no_hp
        ]);

        switch ($request->akses) {
            case 'Admin':
                $akses = 'tata_usaha';
                break;
            case 'Wakil Kurikulum':
                $akses = 'wakil_kurikulum';
                break;
            default:
                $akses = 'guru';
                break;
        }
        
        $data = \App\Models\User::create([
            'nama' => $request->nama,
            'kode_login' => $request->kode_guru,
            'password' => bcrypt($request->kode_guru),
            'email' => $request->email,
            'akses' => $akses
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Models\User::where('kode_login',$id)->with('guru')->first();
        return view('admin.user.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=array(
            'kode_guru' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required'
        );

        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return back()->withErrors(['msg' => $errors]);
        }

        switch ($request->akses) {
            case 'Admin':
                $akses = 'tata_usaha';
                break;
            case 'Wakil Kurikulum':
                $akses = 'wakil_kurikulum';
                break;
            default:
                $akses = 'guru';
                break;
        }

        $data = guru::where('kode_guru',$id)->update([
            'kode_guru'=>$request->kode_guru,
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'no_hp'=>$request->no_hp,
        ]);
        $data = \App\Models\User::where('kode_login',$id)->first();
        if ($data->akses == 'wali_kelas') {
            if (\App\Models\MappingKelas::where('wali_kelas',$id)->where('ta',$request->ta)->get()->count() > 0) {
                $akses = 'guru';
            }
        }
        $password = $data->password;
        if (!is_null($request->password)) {
            $password = bcrypt($request->password);
        }
        $data->update([
            'nama' => $request->nama,
            'kode_login' => $request->kode_guru,
            'password' => $password,
            'email' => $request->email,
            'akses' => $akses
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        guru::where('kode_guru',$id)->delete();
        \App\Models\User::where('kode_login',$id)->delete();
        return back();
    }

    public function import(Request $request)
    {
        $this->validate($request,[
            'file' => 'max:5000|mimes:csv,xlsx,xls'
        ]);
        $file = $request->file('file');
        Excel::import(new \App\Imports\GuruImportUser,$file);
        Excel::import(new \App\Imports\GuruImportTable,$file);
        return response()->json([
            'message' => 'Berhasil mengupload dan merekam data guru',
            'code' => 200
        ]);
    }
}
