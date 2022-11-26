<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Daerah;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class pekerjaLowonganController extends Controller
{
    public function index(){
        $bidang = Bidang::all();
        $daerah = Daerah::all();
        $data = Lowongan::where('status','like','iklan')->inRandomOrder();
        if (request('bidang') && request('daerah')) {
            $data = $data->where('bidang_id', 'like', request('bidang'))->where('daerah_id', 'like', request('daerah'))->inRandomOrder();
        }elseif (request('bidang')){
            $data = $data->where('bidang_id', 'like', request('bidang'))->inRandomOrder();
        }elseif (request('daerah')) {
            $data = $data->where('daerah_id', 'like', request('daerah'))->inRandomOrder();
        }
        $data = $data->paginate(11);
        return view('Pekerja.Lowongan',  ['daerah' => $daerah, 'bidang' => $bidang,  'data' => $data]);
    }
    public function detail($id){
        $lamaran = Lamaran::where('user_id','like',auth()->user()->id)->where('lowongan_id','like',Crypt::decrypt($id))->first();
        $data = Lowongan::find(Crypt::decrypt($id));
        return view('Pekerja.fiturMelamar.detailLowongan',  ['data' => $data, 'lamaran'=> $lamaran]);
    }

}
