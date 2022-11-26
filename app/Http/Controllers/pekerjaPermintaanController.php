<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Permintaan;
use App\Models\Upah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class pekerjaPermintaanController extends Controller
{
    public function index(){
        $data1 = Permintaan::where('pekerja_id','like',auth()->user()->id)->where('status','like','menunggu')->paginate(5);
        $data2 = Permintaan::where('pekerja_id','like',auth()->user()->id)->where('status','like','diterima')->paginate(5);
        $data3 = Permintaan::where('pekerja_id','like',auth()->user()->id)->where('status','like','ditolak')->paginate(5);
        $bidang = Bidang::all();
        
        return view('pekerja.fiturPermintaan.permintaan', ['data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'bidang' => $bidang]);
    }
    public function detail($id){
        $data = Permintaan::find(decrypt($id));
        $upah = Upah::where('permintaan_id','like', decrypt($id))->first();
        $bidang = Bidang::all();
        $total = 0;
        if (isset($upah)) {
            if (!$upah->selesai == null) {
                if ($upah->jenis_upah == 'Hari') {
                    $selisih = 1 + Carbon::parse($upah->mulai)->diffInDays($upah->selesai);
                    $total = $selisih * $upah->upah;
                }elseif ($upah->jenis_upah == 'Bulan') {
                    $selisih = 1 + Carbon::parse($upah->mulai)->diffInMonths($upah->selesai);
                    $total = $selisih * $upah->upah;
                }elseif ($upah->jenis_upah == 'Tahun') {
                    $selisih = 1 + Carbon::parse($upah->mulai)->diffInYears($upah->selesai);
                    $total = $selisih * $upah->upah;
                }
            } 
        }
        
        $hariIni = date("Y-m-d");

        $selisih = Carbon::parse($data->created_at)->diffInDays($hariIni);
        if ($data->status == 'menunggu' ) {
            if ($selisih > 2) {
                $data->status = 'ditolak';
                $data->save();
            }
        }
        return view('pekerja.fiturPermintaan.detailPermintaan', ['data' => $data, 'bidang' => $bidang, 'upah' => $upah, 'total' => $total]);
    }
    public function terima($id){
        $data = Permintaan::find(decrypt($id));
            if ($data) {
                $data->status = 'diterima';
                $data->save();
            }
        return back();
    }

    public function tolak($id){
        $data = Permintaan::find(decrypt($id));
            if ($data) {
                $data->status = 'ditolak';
                $data->save();
            }
        return back();
    }

    public function kerja($permintaan, $upah){
        $data = Permintaan::find(decrypt($permintaan));
        $data1 = Upah::find(decrypt($upah));
            if ($data) {
                $data->status_pekerjaan = 'mengerjakan';
                $data->save();
                $data1->mulai = date("Y-m-d");
                $data1->save();
            }
        return back();
    }
    public function selesai($permintaan, $upah){
        $data = Permintaan::find(decrypt($permintaan));
        $data1 = Upah::find(decrypt($upah));
            if ($data) {
                $data->status_pekerjaan = 'selesai';
                $data->save();
                $data1->selesai = date("Y-m-d");
                $data1->save();
            }
        return back();
    }

}
