<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Daerah;
use App\Models\Skil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class pekerjaProfilController extends Controller
{
    public function index(){
        $daerah = Daerah::all();
        $bidang = Bidang::all();
        $skill = Skil::all()->where('user_id','like',auth()->user()->id);
        return view('pekerja.Profile', ['daerah'=>$daerah, 'bidang'=>$bidang, 'skill' => $skill]);
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
    public function cv(Request $request){
        $request->validate([
            'cv' => 'required|mimes:pdf|max:5120',
        ]);
        // dd($request->cv);
        $data = User::find(auth()->user()->id);
        if (isset($data)) {
            if ($request->file('cv')) {
                if (auth()->user()->cv) {
                    Storage::delete(auth()->user()->cv);
                }
                $cv = $request->file('cv')->store('profile-cv');
                $data->cv = $cv;
                $data->save();
            }
            return back();
        }
        return back();
    }
    public function view(){
        return response()->file('storage/'.auth()->user()->cv);
    }
    public function skill(Request $request){
        $request->validate([
            'bidang' => 'required',
            'deskripsi' => 'required',
            'upah' => 'required',
            'jenis' => 'required',
        ]);
        $id = auth()->user()->id;
        Skil::create([
            'deskripsi' => $request->deskripsi,
            'upah' => $request->upah,
            'jenis_upah' => $request->jenis,
            'user_id' => $id,
            'bidang_id' => $request->bidang,
        ]);
        return back()->with('sukses', 'sukses');
    }

    public function hapus($id){
        $data = Skil::find(Crypt::decrypt($id));
        $data->delete();
        return back()->with('sukses', 'sukses');
    }
}
