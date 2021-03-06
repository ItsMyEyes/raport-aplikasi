<?php

namespace App\Http\Controllers;


use App\Imports\NilaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class NilaiIndividuController extends Controller
{
    public function index()
    {
        $kelas = \App\Models\MappingKelas::where('ta',request()->ta)->get();
        return view('nilai.index',compact('kelas'));
    }
    
    public function store(Request $request)
    {
        $dataNilai = \App\Models\NilaiIndividu::where('induk',$request->id_siswa)->where('matpel',$request->id_matpel)->where('ta',$request->ta)->where('semester',$request->semester)->first();
        if ($dataNilai) {
            $dataNilai->ta = request()->ta;
            $data->type = request()->type;
            $dataNilai->semester = $request->semester;
            $dataNilai->p1 = $request->p1;
            $dataNilai->p2 = $request->p2;
            $dataNilai->p3 = $request->p3;
            $dataNilai->k1 = $request->k1;
            $dataNilai->k2 = $request->k2;
            $dataNilai->k3 = $request->k3;
            $dataNilai->catatan = $request->catatan;
            $dataNilai->save();
        }else{
            $a = new \App\Models\NilaiIndividu;
            $a->type = request()->type;
            $a->induk = $request->id_siswa;
            $a->matpel = $request->id_matpel;
            $a->ta = request()->ta;
            $a->semester = $request->semester;
            $a->p1 = $request->p1;
            $a->p2 = $request->p2;
            $a->p3 = $request->p3;
            $a->k1 = $request->k1;
            $a->k2 = $request->k2;
            $a->k3 = $request->k3;
            $a->catatan = $request->catatan;
            $a->save();
        }
        return response()->json([
            'message' => 'Anda Berhasil Input/Mengubah Nilai',
            'code' => 200
        ],200);
    }

    public function show($id,$dua)
    {
        $a = \App\Models\NilaiIndividu::where('induk',$id)->where('matpel',$dua)->where('semester',request()->semester)->where('type', request()->type)->where('ta',request()->ta)->first();
        return response()->json([
            'message' => 'Anda Berhasil Mendapatkan Nilai',
            'code' => 200,
            'data' => $a
        ],200);
    }

    public function destroy($id)
    {
        
    }

    
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $data = Excel::toArray(new NilaiImport, request()->file('file')); 

        collect(head($data))
            ->each(function ($row, $key) {
                $checking = \App\Models\NilaiIndividu::where('induk',$row[0])
                    ->where('matpel',request()->id_matpel)
                    ->where('type', request()->type)
                    ->where('ta',request()->ta)
                    ->where('semester',request()->semester)
                    ->first();
                if (isset($checking) && !is_null($checking)) {
                    $checking->update([
                        'induk' => $row[0],
                        'matpel' => request()->id_matpel, 
                        'type' => request()->type, 
                        'ta' => request()->ta,
                        'semester' => request()->semester,
                        'p1' => $row[1],
                        'p2' => $row[2],
                        'p3' => $row[3],
                        'k1' => $row[4],
                        'k2' => $row[5],
                        'k3' => $row[6],
                    ]);
                } else {
                    \App\Models\NilaiIndividu::create([
                        'induk' => $row[0],
                        'matpel' => request()->id_matpel, 
                        'ta' => request()->ta,
                        'semester' => request()->semester,
                        'type' => request()->type, 
                        'p1' => $row[1],
                        'p2' => $row[2],
                        'p3' => $row[3],
                        'k1' => $row[4],
                        'k2' => $row[5],
                        'k3' => $row[6],
                    ]);
                }
                    
            });
        return response()->json([
            'message' => 'Data Nilai Berhasil Diimport!',
            'code' => 201
        ],201);
    }

    public function generate_pdf()
	{
        $r = request()->semester;
        $a = \App\Models\siswa::where('nis',request()->nis)->whereHas('nilai',function(Builder $query) use($r){
            $query->where('ta',request()->ta);
            $query->where('semester',request()->semester);
        })->with('nilai')->first();
        $nilai = \App\Models\NilaiIndividu::where('induk',request()->nis)->where('ta',request()->ta)->where('semester',request()->semester)->where('type', request()->type)->get();
        $cas = \App\Models\cas::where('induk',request()->nis)->where('ta',request()->ta)->where('semester',request()->semester)->first();
        $prakerin = \App\Models\prakerin::where('induk',request()->nis)->where('ta',request()->ta)->where('semester',request()->semester)->get();
        $tahun_pelajaran = request()->ta;
        if ($nilai->count() < 1) {
            return response()->json([
                'message' => 'gagal generate pdf',
                'code' => 400,
            ],400);
        }
        $data['nilai'] = $nilai;
        $data['a'] = $a;
        $data['r'] = $r;
        $data['cas'] = $cas;
        $data['prakerin'] = $prakerin;
        $data['semester'] = request()->semester;
        $data['tengah_semester'] = request()->type == "tengah" ? true : false;
        $data['ta'] = request()->ta;
        $data['nama'] = $a->nama;
        $data['nis'] = $a->nisn;
        $nis = request()->nis;
        $wali_kelas = \App\Models\MappingSiswaKelas::where('id_siswa',$a->nis)->first();
        $data['wali_kelas'] = $wali_kelas->kelas->guru->nama;
        $ta = str_replace('/','-',request()->ta);
        $data['tahun_pelajaran'] = $tahun_pelajaran;
        $pdf = \PDF::loadView('cetak.blank');
		$pdf->getMpdf()->defaultfooterfontsize=7;
		$pdf->getMpdf()->defaultfooterline=0;
        $rapor_cover = view('cetak.cover', $data);
        $pdf->getMpdf()->WriteHTML($rapor_cover);
        $pdf->getMpdf()->AddPage('P','','','','',5,5,5,5,5,5,'', 'A4');
        $rapor_nilai = view('cetak.document', $data);
        $pdf->getMpdf()->WriteHTML($rapor_nilai);
        $pdf->save(public_path("pdf/raport-$nis"."-$ta.pdf"), 'A4');
        return response()->json([
            'message' => 'Berhasil generate pdf',
            'code' => 200,
            'link' => "https://raport.random.my.id/pdf/raport-$nis-".str_replace('/','-',$ta).".pdf"
        ],200);
	}
    
    public function lagger()
    {
        $a = \App\Models\NilaiIndividu::where('matpel',request()->matpel)->where('semester',request()->semester)->where('type', request()->type)->where('ta',request()->ta)->get();
        $c = \App\Models\MappingSiswaKelas::where('id_kelas',request()->id_kelas)->where('ta',request()->ta)->get();
        if (empty($a)) {
            return response()->json([
                'message' => 'Matpel tidak ditemukan pada semester ini',
                'code' => 400,
            ],400);
        }
        $data['a'] = $a;
        $data['c'] = $c; 
        $data['pelajaran'] = $a[0]->matpels->matpel->nama;
        $data['kelas'] = $a[0]->siswa->kelas->kelas->kelas->kelas;
        $ta = request()->ta;
        $matpel = request()->matpel;
        $pdf = \PDF::loadView('cetak.blank');
        $rapor_nilai = view('cetak.lagger', $data);
        $pdf->getMpdf()->WriteHTML($rapor_nilai);
        $pdf->save(public_path("pdf/lagger-$matpel-".str_replace('/','-',$ta).".pdf"), 'A4');
        return response()->json([
            'message' => 'Berhasil generate pdf',
            'code' => 200,
            'link' => "https://raport.random.my.id/pdf/lagger-$matpel-".str_replace('/','-',$ta).".pdf"
        ]);
    }

    public function rangking()
    {
        $c = \App\Models\MappingSiswaKelas::where('id_kelas',request()->kelas)->where('ta',request()->ta)->orderBy('id_siswa', 'ASC')->get();
        $kelas = \App\Models\kelas::find(request()->kelas);
        if ($c->count() < 1) {
            return response()->json([
                'message' => 'gagal generate pdf',
                'code' => 400,
                'data' => $c->count()
            ],400);
        }
        $kelas = $kelas->kelas;
        $ta = request()->ta;
        $data = Array();
        foreach ($c as $key => $page) {
            $nilai = \App\Models\NilaiIndividu::where('induk',$page->id_siswa)->where('ta',request()->ta)->where('type', request()->type)->where('semester',request()->semester)->get();
            $semua = 0;
            $rata = 0;
            
            foreach ($nilai as $key => $value) {
                $semua += $value->p1 + $value->p2 + $value->p3 + $value->k1 + $value->k2 + $value->k3;
                $rata = $semua / 6;
            }

            $data[] =  [
                'kode_login' => $page->siswa->nis,
                'nama' => $page->siswa->nama,
                'total' => $semua,
                'rata' => ceil($rata),
            ];
        }
        $columns = array_column($data, 'total');
        array_multisort($columns, SORT_DESC, $data);
        $fix = Array();
        $i = 1;
        foreach ($data as $key => $z) {
            $fix[] =  [
                'kode_login' => $z['kode_login'],
                'nama' => $z['nama'],
                'total' => $z['total'],
                'rata' => $z['rata'],
                'rangking' => $i++
            ];
        }
        $columnz = array_column($fix, 'nama');
        array_multisort($columnz, SORT_ASC, $fix);
        $pdf = \PDF::loadView('cetak.blank');
        $rapor_nilai = view('cetak.rangking',compact('fix','kelas','ta'));
        $pdf->getMpdf()->WriteHTML($rapor_nilai);
        $pdf->save(public_path("pdf/rangking-".str_replace(' ','-',$kelas)."-".str_replace('/','-',$ta).".pdf"), 'A4');
        return response()->json([
            'message' => 'Berhasil generate pdf',
            'code' => 200,
            'link' => "https://raport.random.my.id/pdf/rangking-".str_replace(' ','-',$kelas)."-".str_replace('/','-',$ta).".pdf"
        ]);
    }
}