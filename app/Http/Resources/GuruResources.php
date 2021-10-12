<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GuruResources extends ResourceCollection
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
                $akses2 = 'guru';
                switch ($page->akses) {
                    case 'tata_usaha':
                        $akses = 'Tata usaha';
                        $akses2 = $page->akses;
                        break;
                    case 'wakil_kurikulum':
                        $akses = 'Wakil Kurikulum';
                        $akses2 = $page->akses;
                        break;
                    default:
                        $akses = 'Anda tidak memiliki akses';
                        break;
                }

                if ($page->akses == 'guru' | $page->akses == 'wali_kelas') {
                    $wali = \App\Models\MappingKelas::where('wali_kelas',$page->kode_login)->where('ta',request()->ta)->first();
                    if ($wali) {
                        $akses = 'Wali Kelas '.$wali->kelas->kelas;
                        $akses2 = 'wali_kelas';
                    } else {
                        $akses = 'Guru';
                        $akses2 = 'guru';
                    }
                }
                return [
                    'nama' => $page->nama,
                    'kode_login' => $page->kode_login,
                    'email' => $page->email,
                    'nip' => $page->guru->nip,
                    'no_hp' => $page->guru->no_hp,
                    'akses' => $akses,
                    'akses2' => $akses2
                ];
            }),
        ];
    }
}
