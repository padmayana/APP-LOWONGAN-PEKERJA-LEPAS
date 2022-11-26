<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class resetControler extends Controller
{
    public function index(){
       return view('resetEmail');
    }
    public function link(Request $request){
        $data = User::all();
        $data = $data->where('email','like', $request->email);
        $details = ['email' => Crypt::encrypt($request ->email)];

        if (count($data)==0) {
            return redirect('/login')->with('sukses', 'tautan reset sudah terkirim');
        }
        Mail::to( $request->email )->send(new ResetMail($details));
        return redirect('/login')->with('sukses', 'tautan reset sudah terkirim');
    }

    public function password($email){
        $data = User::where('email',Crypt::decrypt($email))->first();
        if ($data->password == 0) {
            return redirect('/login')->with('sukses', 'Anda terdaftar dengan google akun');
        }
        return view('resetPassword',['email' => $email]);
     }

     public function simpan (Request $request, $email){
        $request->validate([

            'password' => 'required',
            'konfirmasi' => 'required',

        ]);

        if ($request->password == $request->konfirmasi) {
            $email = Crypt::decrypt($email);

            $data = User::where('email','like', $email)
                        ->first(); // this point is the most important to change
            $data->password = bcrypt($request->password);
            $data->save();
            return redirect('/login')->with('sukses', 'password sudah di perbarui');

        }
        return back()->with('gagal', 'password tidak sama');
    }
}

