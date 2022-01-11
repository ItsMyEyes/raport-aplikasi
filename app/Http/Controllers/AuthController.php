<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = (request()->type != 'siswa') ? request(['kode_login', 'password']) : ['nis'=>request()->kode_login, 'password'=>request()->password];

        if (request()->type == 'siswa' && $toke = Auth::guard('siswa')->attempt($credentials)) {
            return $this->respondWithToken($toke);
        } elseif ($token = auth('api')->attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        return response()->json(['error' => 'Kode login dan password salah'], 401);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        if (request()->type == 'siswa') {
            $user = auth('siswa')->user();
        } else {
            $user = null;
            if (auth('api')->user()) {
                $akses2 = 'guru';
                switch (auth('api')->user()->akses) {
                    case 'tata_usaha':
                        $akses = 'Admin';
                        $akses2 = 'tata_usaha';
                        break;
                    case 'wakil_kurikulum':
                        $akses = 'Wakil Kurikulum';
                        $akses2 = 'wakil_kurikulum';
                        break;
                    default:
                        $akses = 'Anda tidak memiliki akses';
                        break;
                }

                if (auth('api')->user()->akses == 'guru' || auth('api')->user()->akses == 'wali_kelas') {
                    $wali = \App\Models\MappingKelas::where('wali_kelas',auth('api')->user()->kode_login)->where('ta',request()->ta)->first();
                    if ($wali) {
                        $akses = 'Wali Kelas '.$wali->kelas->kelas;
                        $akses2 = 'wali_kelas';
                    } else {
                        $akses = 'Guru';
                        $akses2 = 'guru';
                    }
                }
                $user = [
                    'nama' => auth('api')->user()->nama,
                    'kode_login' => auth('api')->user()->kode_login,
                    'email' => auth('api')->user()->email,
                    'nip' => isset(auth('api')->user()->guru) && !is_null(auth('api')->user()->guru) ? auth('api')->user()->guru->nip : '-',
                    'no_hp' => isset(auth('api')->user()->guru) && !is_null(auth('api')->user()->guru) ? auth('api')->user()->guru->no_hp : '-',
                    'akses' => $akses,
                    'akses2' => $akses2
                ];
            } else {
                return response()->json(null, 403);
            }
        }
        return response()->json($user);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        if (request()->type == 'siswa') {
            auth('siswa')->logout();
        } else {
            auth('api')->logout();
        }

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
