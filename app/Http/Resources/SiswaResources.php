<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SiswaResources extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($page){
                return [
                    'kode_login' => $page->siswa->nis,
                    'email' => $page->siswa->email,
                    'nama' => $page->siswa->nama,
                    'nilai' => ($page->nilai->count() > 0) ? true : false
                ];
            }),
        ];
    }
}
