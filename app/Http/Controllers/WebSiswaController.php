<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class WebSiswaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = \App\Models\MappingKelas::with('guru')->with('kelas')->where('ta',Session::get('ta'))->get();
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
        $kelas = request()->kelas;
        $siswa = \App\Models\MappingSiswaKelas::with('siswa')->with('kelas')->where('id_kelas',$kelas)->where('ta',Session::get('ta')['ta'])->get();
        return view('admin.siswa.index', compact('data','siswa','kelas'));;
    }

    public function mapping(Request $request)
    {
        $this->validate($request,[
            'file' => 'max:5000|mimes:xlsx,xls'
        ]);
        $nis = $request->nis;
        $kelas = $request->kelas;
        $siswa = siswa::where('nis', $nis)->first();
        $mapping = \App\Models\MappingSiswaKelas::where('id_siswa', $nis)->where('id_kelas',$kelas)->where('ta',Session::get('ta')['ta'])->first();
        if (is_null($siswa) || is_null($mapping)) {
            return back()->withErrors(['msg' => 'Siswa tidak ditemukan / Siswa sudah dimapping']);
        }
        if (is_null($nis)) {
            \App\Models\MappingSiswaKelas::create([
                'id_siswa' => $nis,
                'id_kelas' => $kelas,
                'semester' => "1",
                'absen' => "1",
                'ta' => Session::get('ta')['ta'],
            ]);
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new \App\Imports\SiswaMapping,$file);
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = request()->kelas;
        return view('admin.siswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if (siswa::where('nis', $request->nis)->count() > 1) {
                return back()->withErrors(['msg' => "Data siswa dengan nis $request->nis sudah tercatat pada sistem"]);
            }
            $a = new siswa;
            $a->nis = $request->nis;
            $a->password = bcrypt($request->nis);
            $a->nisn = $request->nisn;
            $a->nama = $request->nama;
            $a->kelamin = $request->kelamin;
            $a->tmp_lhr = $request->tmp_lhr;
            $a->tgl_lhr = $request->tgl_lhr;
            $a->agama = "-";
            $a->alamat = "-";
            $a->kelurahan = "-";
            $a->kecamatan = "-";
            $a->kabupaten = "-";
            $a->kodepos = "-";
            $a->nohp = $request->nohp;
            $a->email = $request->email;
            $a->keahlian = 'Multimedia';
            $a->kelamin = $request->kelamin;

            $a->nama_ayah = "-";
            $a->nama_ibu = "-";
            $a->alamat_ortu = "-";
            $a->kecamatan_ortu = "-";
            $a->kabupaten_ortu = "-";
            $a->kodepos_ortu = "-";
            $a->nohp_ortu = "-";
            $a->pekerjaan_ortu = "-";

            $a->nama_wali = "-";
            $a->alamat_wali = "-";
            $a->kecamatan_wali = "-";
            $a->kabupaten_wali = "-";
            $a->kodepos_wali = "-";
            $a->nohp_wali = "-";
            $a->pekerjaan_wali = "-";

            $a->akses = '0';
            $a->status = '10';
            $a->save();

            \App\Models\MappingSiswaKelas::create([
                'id_siswa' => $request->nis,
                'id_kelas' => $request->kelas,
                'semester' => '1',
                'absen' => '1',
                'ta' => Session::get('ta')['ta']
            ]);

        return redirect()->route('siswa.index');
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
        return view('admin.siswa.edit', compact('a'));
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
        $a->siswa->save();
        return redirect()->route('siswa.index');
    }

    public function import(Request $request)
    {
        $this->validate($request,[
            'file' => 'max:5000|mimes:xlsx,xls'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            Excel::import(new \App\Imports\SiswaImport,$file);
            return back();
        }
        return back()->withErrors(['msg' => 'Gagal mengupload dikarenakan tidak ada file']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($up)
    {
        $a = \App\Models\MappingSiswaKelas::where('id_siswa',$up)->where('ta',Session::get('ta')['ta'])->first();
        $message = 'Anda Berhasil Delete Mapping Siswa';
        $a->delete();
        return redirect()->route('siswa.index');
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
