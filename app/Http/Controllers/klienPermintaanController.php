<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Daerah;
use App\Models\Permintaan;
use App\Models\Skil;
use App\Models\Upah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class klienPermintaanController extends Controller
{
    public function index(){
        $bidang = Bidang::all();
        $data1 = Permintaan::where('klien_id','like',auth()->user()->id)->where('status','like','menunggu')->orderBy('created_at','desc')->paginate(4);
        $data2 = Permintaan::where('klien_id','like',auth()->user()->id)->where('status','like','diterima')->orderBy('created_at','desc')->paginate(4);
        $data3 = Permintaan::where('klien_id','like',auth()->user()->id)->where('status','like','ditolak')->orderBy('created_at','desc')->paginate(4);
        return view('klien.permintaanFitur.permintaan', ['bidang' =>$bidang,  'data1' => $data1, 'data2' => $data2, 'data3' => $data3]);
    }
    public function cari(){
        if (request('bidang')) {
            $data = Skil::where('bidang_id','like', request('bidang'))->inRandomOrder()->paginate(6);
            return view('klien.permintaanFitur.cariBidang', ['data' => $data]);
        }
    }
    public function permintaan(Request $request, $skill_id){
        $pekerja = Skil::find(decrypt($skill_id));
        $cek = Permintaan::where('klien_id','like',auth()->user()->id)->where('skil_id','like',decrypt($skill_id))->where('status','like','menunggu')->first();
        if (isset($cek)) {
            return back();
        }
        $request->validate([
            'deskripsi' => 'required'
        ]);

        Permintaan::create([
            'deskripsi' => $request->deskripsi,
            'status' => 'menunggu',
            'skil_id' => decrypt($skill_id),
            'klien_id' => auth()->user()->id,
            'pekerja_id' => $pekerja->user_id,

        ]);
        
        return redirect('/klien/permintaan');
    }
    public function profil($skil){
        $data = Skil::find(decrypt($skil));
        $cek = Permintaan::where('klien_id','like',auth()->user()->id)->where('skil_id','like',decrypt($skil))->where('status','like','menunggu')->first();
        $skill = Skil::where('user_id','like',$data->user->id)->paginate(6);
        return view('klien.permintaanFitur.detaiPenawaran', ['data' => $data, 'skill' => $skill, 'cek' => $cek]);
    }

    public function informasi($skil,$permintaan){
        $data = Skil::find(decrypt($skil));
        $cek = Permintaan::find(decrypt($permintaan));
        $upah = Upah::where('permintaan_id','like',decrypt($permintaan))->first();
        $total = 0;
        if (isset($upah)) {
            if (!$upah->selesai == null) {
                if ($upah->jenis_upah == 'Hari') {
                    $selisih = 1 + Carbon::parse($upah->mulai)->diffInDays($upah->selesai);
                    $total = $selisih * $upah->upah;
                }
                elseif ($upah->jenis_upah == 'Bulan') {
                    $selisih = 1 + Carbon::parse($upah->mulai)->diffInMonths($upah->selesai);
                    $total = $selisih * $upah->upah;
                }elseif ($upah->jenis_upah == 'Tahun') {
                    $selisih = 1 + Carbon::parse($upah->mulai)->diffInYears($upah->selesai);
                    $total = $selisih * $upah->upah;
                }
            }
        }
        $skill = Skil::where('user_id','like',$data->user->id)->paginate(6);
        return view('klien.permintaanFitur.detaiPenawaran', ['data' => $data, 'skill' => $skill, 'cek' => $cek, 'upah' => $upah, 'total' => $total]);
    }

    public function hapus($permintaan){
        $data = Permintaan::find(decrypt($permintaan));
        if (isset($data)) {
            $data->delete();
            return redirect('/klien/permintaan');
        }
        return back();
    }
}
