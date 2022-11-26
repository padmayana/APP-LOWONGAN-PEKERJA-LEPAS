<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class klienProfilController extends Controller
{
    public function index(){
        return view('klien.Profile');
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
