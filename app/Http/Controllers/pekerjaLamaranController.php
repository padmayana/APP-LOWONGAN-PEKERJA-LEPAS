<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class pekerjaLamaranController extends Controller
{
    public function serahkan($id){
        $data = Lamaran::where('user_id','like',auth()->user()->id)->where('lowongan_id','like',Crypt::decrypt($id))->first();
        if (isset($data)) {
            return back();
        }
        Lamaran::create([
            'status' => 'Menunggu',
            'user_id' => auth()->user()->id,
            'lowongan_id' => Crypt::decrypt($id),
        ]);
        return back();
    }
    public function batalkan($id){
        $data = Lamaran::where('user_id','like',auth()->user()->id)->where('lowongan_id','like',Crypt::decrypt($id))->first();
        if (isset($data)) {
            $data->delete();
            return back();
        }
        return back();
    }
    public function status(){
        $data = Lamaran::where('user_id','like',auth()->user()->id)->orderBy('created_at','desc')->paginate(7);
        return view('pekerja.fiturMelamar.LamaranPekerja', ['data' => $data]);
    }
}
