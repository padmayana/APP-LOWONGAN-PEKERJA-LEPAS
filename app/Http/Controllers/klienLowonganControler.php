<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Daerah;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class klienLowonganControler extends Controller
{
    public function index(){
        $bidang = Bidang::all();
        $daerah = Daerah::all();
        $data = Lowongan::where('user_id','like', auth()->user()->id )->orderBy('created_at','desc')->paginate(4);
        // dd($data);
        return view('Klien.Lowongan', ['data'=> $data, 'bidang' => $bidang, 'daerah' => $daerah]);
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bidang'=>'required',
            'deskripsi'=>'required',
            'daerah'=>'required',
            'upah'=>'required',
            'jenis'=>'required',
            'kuota'=>'required',
        ]);
        $pembuat = Auth::user()->id;
        $awal = 0;
        $hasil = Lowongan::create([
            'nama' => $request->nama,
            'bidang_id' => $request->bidang,
            'daerah_id' => $request->daerah,
            'deskripsi' => $request->deskripsi,
            'upah' => $request->upah,
            'jenis_upah' => $request->jenis,
            'lahir' => $request->lahir,
            'kuota' => $request->kuota,
            'terima' => $awal,
            'user_id' => $pembuat,
            'status' => 'menunggu',

        ]);
        if ($hasil == '1') {
            return back()->with('pesan', 'gagal membuat lowongan');
        } else {
            return back()->with('pesan', 'sukses membuat lowongan');
        }
    }
    public function hapus($id){
        $id = Crypt::decrypt($id);
        $lowongan = Lowongan::find($id);
        $lowongan->delete();
        return back()->with('pesan', 'Proses delete sukses');
    }
    public function edit(Request $request,$id){
        $id = Crypt::decrypt($id);
        $request->validate([
            'nama' => 'required',
            'bidang'=>'required',
            'deskripsi'=>'required',
            'daerah'=>'required',
            'upah'=>'required',
            'jenis'=>'required',
            'kuota'=>'required',
        ]);
        $lowongan = Lowongan::find($id);
        if (isset($lowongan)) {
            $lowongan->bidang_id = $request->bidang;
            $lowongan->daerah_id = $request->daerah;
            $lowongan->nama = $request->nama;
            $lowongan->deskripsi = $request->deskripsi;
            $lowongan->upah = $request->upah;
            $lowongan->jenis_upah = $request->jenis;
            $lowongan->kuota = $request->kuota;
            $lowongan->save();
            return redirect('klien/lowongan')->with('aksi', 'Proses Edit sukses');
        } else {
            return redirect('klien/lowongan')->with('aksi', 'Proses Edit Gagal');
        }
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
