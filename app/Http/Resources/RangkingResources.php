<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RangkingResources extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $ini = $this->collection->transform(function($page){
            $nilai = \App\Models\NilaiIndividu::where('induk',$page->id_siswa)->where('ta',request()->ta)->where('semester',request()->semester)->get();
            $semua = 0;
            $rata = 0;
            
            foreach ($nilai as $key => $value) {
                $semua = $value->p1 + $value->p2 + $value->p3 + $value->k1 + $value->k2 + $value->k3;
                $rata = $semua / 6;
            }

            return [
                'kode_login' => $page->siswa->nis,
                'nama' => $page->siswa->nama,
                'total' => $semua,
                'rata' => $rata,
            ];
        });
        return $ini;
    }
}
