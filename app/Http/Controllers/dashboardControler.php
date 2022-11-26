<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Permintaan;
use App\Models\Skil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dashboardControler extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $lamaran = Lamaran::all()->count();
        $Bidang = Bidang::all()->count();
        $lowongan = Lowongan::all()->count();
        $permintaan = Permintaan::all()->count();
        $skil = Skil::all()->count();

        $menu = "dashboard";
        return view('dashboard.dashboard', ['menu' => $menu, 'user' => $user, 'lamaran' => $lamaran, 'Bidang' => $Bidang, 'lowongan' => $lowongan, 'permintaan' => $permintaan, 'skil' => $skil]);
    }

    public function edit(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'lahir' => 'required',
            'notlp' => 'required',
            'jenis' => 'required',
            'daerah' => 'required'
        ]);
        $data = User::find(auth()->user()->id);
        if (isset($data)) {
            $data->name = $request->nama;
            $data->email = $request->email;
            $data->lahir = $request->lahir;
            $data->notlp = $request->notlp;
            $data->daerah = $request->daerah;
            $data->kelamin = $request->jenis;
            $data->save();
            return back();
        }
        return back();
    }

    public function foto(Request $request){
        $request->validate([
            'image' => 'image|file|required|max:5120',
        ]);
        $data = User::find(auth()->user()->id);
        if (isset($data)) {
            if ($request->file('image')) {
                if (auth()->user()->image && auth()->user()->image !== "profile-images/Master.png") {
                    Storage::delete(auth()->user()->image);
                }
                $gambar = $request->file('image')->store('profile-images');
                $data->image = $gambar;
                $data->save();
            }
            return back();
        }
        return back();
    }
}
