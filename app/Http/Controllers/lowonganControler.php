<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Collection;

class lowonganControler extends Controller
{
    public function index(){
        $menu = "lowongan";
        if (request('id')) {
            $data = Lowongan::where('id', 'like', request('id'))->paginate(4);
            
            return view('/dashboard/lowongan', ['menu' => $menu, 'data' => $data]); 

        } else {
            $data = Lowongan::where('status','like','menunggu')->paginate(7);
            return view('/dashboard/lowongan', ['menu' => $menu, 'data' => $data]);
        }
        
        
    }

    public function cek($id){
        $id=Crypt::decrypt($id);
        $data = Lowongan::find($id);
        $menu = "lowongan";
        return view('dashboard.lowonganview', ['menu' => $menu, 'data' => $data]);
    }
    public function iklan($id){
        $id=Crypt::decrypt($id);
        $data = Lowongan::find($id);
        if (isset($data)) {
            $data->status = 'iklan';
            $data->save();
        }
        return back()->with('pesan', 'Proses iklan sukses');
    }

    public function tolak($id){
        $id=Crypt::decrypt($id);
        $data = Lowongan::find($id);
        if (isset($data)) {
            $data->status = 'tolak';
            $data->save();
        }
        return back()->with('pesan', 'Proses tolak sukses');
    }
    public function tutup($id){
        $id=Crypt::decrypt($id);
        $data = Lowongan::find($id);
        if (isset($data)) {
            $data->status = 'tutup';
            Lamaran::where('lowongan_id','like',$id)->where('status','like','Menunggu')->update(['status' => 'Tolak']);
            $data->save();
        }
        return back()->with('pesan', 'Proses tutup sukses');
    }
}
