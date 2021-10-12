<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = \App\Models\MappingSiswaKelas::with('siswa')->with('kelas')->where('id_kelas',request()->kelas)->where('ta',request()->ta)->get();
        return response()->json([
            'message' => 'Berhasil mendapatkan data siswa',
            'code' => 200,
            'data' => new \App\Http\Resources\SiswaResources($a)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $a = new siswa;
            $a->nis = $request->nis;
            $a->password = bcrypt($request->nis);
            $a->nisn = $request->nisn;
            $a->nama = $request->nama;
            $a->kelamin = $request->kelamin;
            $a->tmp_lhr = $request->tmp_lhr;
            $a->tgl_lhr = $request->tgl_lhr;
            $a->agama = $request->agama;
            $a->alamat = $request->alamat;
            $a->kelurahan = $request->kelurahan;
            $a->kecamatan = $request->kecamatan;
            $a->kabupaten = $request->kabupaten;
            $a->kodepos = $request->kodepos;
            $a->nohp = $request->nohp;
            $a->email = $request->email;
            $a->keahlian = 'Multimedia';
            $a->kelamin = $request->kelamin;

            $a->nama_ayah = $request->nama_ayah;
            $a->nama_ibu = $request->nama_ibu;
            $a->alamat_ortu = $request->alamat_ortu;
            $a->kecamatan_ortu = $request->kecamatan_ortu;
            $a->kabupaten_ortu = $request->kabupaten_ortu;
            $a->kodepos_ortu = $request->kodepos_ortu;
            $a->nohp_ortu = $request->nohp_ortu;
            $a->pekerjaan_ortu = $request->pekerjaan_ortu;

            $a->nama_wali = $request->nama_wali;
            $a->alamat_wali = $request->alamat_wali;
            $a->kecamatan_wali = $request->kecamatan_wali;
            $a->kabupaten_wali = $request->kabupaten_wali;
            $a->kodepos_wali = $request->kodepos_wali;
            $a->nohp_wali = $request->nohp_wali;
            $a->pekerjaan_wali = $request->pekerjaan_wali;

            $a->akses = '0';
            $a->status = '10';
            $a->save();

            \App\Models\MappingSiswaKelas::create([
                'id_siswa' => $request->nis,
                'id_kelas' => $request->id_kelas,
                'semester' => '1',
                'absen' => '1',
                'ta' => $request->ta
            ]);

        return response()->json([
            'message' => 'Berhasil merekam data dan menyimpannya',
            'code' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = \App\Models\MappingSiswaKelas::where('id_siswa',$id)->with('kelas')->with('siswa')->first();
        return response()->json([
            'message' => 'Berhasil mendapatkan data siswa',
            'code' => 200,
            'data' => $a
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $up)
    {
        $a = \App\Models\MappingSiswaKelas::where('id_siswa',$up)->with('siswa')->first();
        $a->siswa->nis = $request->nis;
        $a->siswa->password = bcrypt($request->nis);
        $a->siswa->nisn = $request->nisn;
        $a->siswa->nama = $request->nama;
        $a->siswa->kelamin = $request->kelamin;
        $a->siswa->tmp_lhr = $request->tmp_lhr;
        $a->siswa->tgl_lhr = $request->tgl_lhr;
        $a->siswa->agama = $request->agama;
        $a->siswa->alamat = $request->alamat;
        $a->siswa->kelurahan = $request->kelurahan;
        $a->siswa->kecamatan = $request->kecamatan;
        $a->siswa->kabupaten = $request->kabupaten;
        $a->siswa->kodepos = $request->kodepos;
        $a->siswa->nohp = $request->nohp;
        $a->siswa->email = $request->email;
        $a->siswa->keahlian = 'Multimedia';
        $a->siswa->kelamin = $request->kelamin;

        $a->siswa->nama_ayah = $request->nama_ayah;
        $a->siswa->nama_ibu = $request->nama_ibu;
        $a->siswa->alamat_ortu = $request->alamat_ortu;
        $a->siswa->kecamatan_ortu = $request->kecamatan_ortu;
        $a->siswa->kabupaten_ortu = $request->kabupaten_ortu;
        $a->siswa->kodepos_ortu = $request->kodepos_ortu;
        $a->siswa->nohp_ortu = $request->nohp_ortu;
        $a->siswa->pekerjaan_ortu = $request->pekerjaan_ortu;

        $a->siswa->akses = '0';
        $a->siswa->status = '10';
        
        
        $d = \App\Models\MappingSiswaKelas::where('id_siswa',$request->nis)->first();
        $d->id_siswa = $request->nis;
        $d->id_kelas = $request->id_kelas;
        $d->semester = '1';
        $d->absen = '1';
        $d->ta = $request->ta;
        $d->save();
        $a->siswa->save();

        return response()->json([
            'message'=>'Berhasil merubah data siswa',
            'code' => 200
        ]);
    }

    public function import(Request $request)
    {
        $this->validate($request,[
            'file' => 'max:5000|mimes:xlsx,xls'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new \App\Imports\SiswaImport,$file);
           return response()->json([
               'message' => 'Berhasil mengupload dan merekam data siswa didalam database',
               'code' => 200
           ]);
        }
        return response()->json([
            'message' => 'Gagal mengupload dan merekam data siswa didalam database',
            'code' => 200
        ]);
    }

    public function importMapping(Request $request)
    {
        $this->validate($request,[
            'file' => 'max:5000|mimes:xlsx,xls'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new \App\Imports\SiswaMapping,$file);
           return response()->json([
               'message' => 'Berhasil mengupload dan merekam data siswa didalam database',
               'code' => 200
           ]);
        }
        return response()->json([
            'message' => 'Gagal mengupload dan merekam data siswa didalam database',
            'code' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($up)
    {
        $a = \App\Models\MappingSiswaKelas::where('id_siswa',$up)->where('ta',request()->ta)->with('siswa')->first();
        $message = 'Anda Berhasil Delete Mapping Siswa';
        $a->delete();
        return response()->json([
            'message' => $message,
            'code' => 200
        ]);
    }

    public function destroySiswa($up)
    {
        $a = \App\Models\siswa::where('nis',$up)->first();
        \App\Models\MappingSiswaKelas::where('id_siswa',$up)->where('ta',request()->ta)->delete();
        $message = 'Anda Berhasil Delete Mapping Siswa '.$a->nama;
        $a->delete();
        return response()->json([
            'message' => $message,
            'code' => 200
        ]);
    }
}
