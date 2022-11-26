<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class bidangControler extends Controller
{
    public function index()
    {
        $data = Bidang::latest();

        if (request('kata')) {

            $data = $data->where('nama', 'like', '%'.request('kata').'%')->orWhere('id', 'like', '%'.request('kata').'%');
        }
        $data = $data->paginate(7);
        $menu = "bidang";
        return view('/dashboard/bidang', ['menu' => $menu, 'data' => $data]);
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',

        ]);

        $hasil = Bidang::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
        if ($hasil == '1') {
            return redirect('/admin/bidang')->with('gagal', 'gagal');
        } else {
            return redirect('/admin/bidang')->with('sukses', 'sukses');
        }
    }

    public function update(Request $request, $id){
        $id = Crypt::decrypt($id);
        $data = Bidang::find($id);
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if (isset($data)) {
            $data->nama = $request->nama;
            $data->deskripsi = $request->deskripsi;
            $data->save();
            return redirect('/admin/bidang')->with('pesan', 'Proses Edit sukses');
        } else {
            return redirect('/admin/bidang')->with('pesan', 'Proses Edit Gagal');
        }
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $bidang = Bidang::find($id);
        $bidang->delete();
        return redirect('/admin/bidang')->with('pesan', 'Proses delete sukses');
    }

}
