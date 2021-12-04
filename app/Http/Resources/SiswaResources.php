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
                    'kode_login' => isset($page->siswa) && !is_null($page->siswa) ? $page->siswa->nis : "0",
                    'email' => isset($page->siswa) && !is_null($page->siswa) ? $page->siswa->email : "0",
                    'nama' => isset($page->siswa) && !is_null($page->siswa) ? $page->siswa->nama : "0",
                    'nilai' => ($page->nilai->count() > 0) ? true : false
                ];
            }),
        ];
    }
}
