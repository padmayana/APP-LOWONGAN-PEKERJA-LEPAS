<?php

namespace App\Http\Controllers;

use App\Mail\RegistrasiMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\Daerah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class regisControler extends Controller
{
    public function index()
    {
        return view('regisLevel');
    }

    public function level($level)
    {

        $level =$level;

        return view('regisEmail',['level' => $level]);
    }

    public function konfirmasi(Request $request, $level)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $details = ['level' => $level, 'email' => Crypt::encrypt($request ->email)];

        $data = User::all();
        $data = $data->where('email','like', $request->email);
        if (count($data)==1) {
            return back()->with('pesan','email tidak bisa digunakan');
        }else{
            Mail::to( $request->email )->send(new RegistrasiMail($details));
            return redirect('/login')->with('sukses', 'email konfirmasi sudah terkirim');
        }
      

    }

    public function formulir($level,$email)
    {
        $data = User::all();
        $data = $data->where('email','like', Crypt::decrypt($email));
        if (count($data)==1) {
            return redirect('/login')->with('gagal','email tidak bisa digunakan');
        }
        $daerah = Daerah::all();
        return view('registrasi', ['daerah' => $daerah, 'level' =>$level, 'email'=>$email]);
    }

    public function simpan(Request $request,$level,$email)
    {

        $level = Crypt::decrypt($level);
        $email = Crypt::decrypt($email);
        $data = User::all();
        $data = $data->where('email','like', $email);
        if (count($data)==1) {
            return redirect('/login')->with('gagal','email tidak bisa digunakan');
        }

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'notlp' => 'required',
            'lahir' => 'required',
            'kelamin' => 'required',
            'image' => 'image|file|required|max:5120',
            'daerah' => 'required'
        ]);
        


        if ($request->file('image')) {
            $gambar = $request->file('image')->store('profile-images');
        }

        $hasil = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => bcrypt($request->password),
            'notlp' => $request->notlp,
            'lahir' => $request->lahir,
            'kelamin' => $request->kelamin,
            'level' => $level,
            'image' => $gambar,
            'daerah' => $request->daerah,

        ]);
        if ($hasil == '1') {
            return redirect('/login')->with('gagal', 'gagal');
        } else {
            return redirect('/login')->with('sukses', 'sukses');
        }
    }
}
