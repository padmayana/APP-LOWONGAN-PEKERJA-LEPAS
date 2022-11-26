<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\GoogleMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Facades\Socialite;



class GoogleControler extends Controller
{
    
    
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(Request $request)
        {
                $user_google    = Socialite::driver('google')->user();
                $user           = User::where('email', $user_google->getEmail())->first();
    
                if($user != null){
                    \auth()->login($user, true);
                    return redirect('/');
                }else{
                        $details = ['nama' => Crypt::encrypt($user_google->getName()), 'email' => Crypt::encrypt($user_google->getEmail())];

                        Mail::to( $user_google->getEmail() )->send(new GoogleMail($details));
                        return redirect('/login')->with('sukses', 'Cek email anda untuk verifikasi');         
                }
    
        }

        public function daftar($nama,$email){
            $user = User::where('email', decrypt($email))->first();
            if (isset($user)) {
                return redirect('/login');
            }
            $create = User::Create([
                // 'email'             => $user_google->getEmail(),
                // 'name'              => $user_google->getName(),
                'email'             => decrypt($email),
                'name'              => decrypt($nama),
                'password'          => 0,
                'email_verified_at' => now(),
                'notlp'             => 'kosong',
                'lahir'             => date('Y-m-d'),
                'kelamin'           => 'kosong',
                'level'             => 'kosong',
                'image'             => 'profile-images/Master.png',
                'daerah'            => 'kosong',
            ]);

            auth()->login($create, true);
            return redirect('/auth/google/level');
        }

        public function level(){
            if (auth()->user()->level == "Klien" || auth()->user()->level == "Freelancer") {
                return redirect('/');
            }
            return view('googleLevel');
        }
        public function levelEdit($jenis){
            if (auth()->user()->level == "Klien" || auth()->user()->level == "Freelancer" ) {
                return redirect('/');
            }
            $pilihan = Crypt::decrypt($jenis);
            
            // dd(Crypt::encrypt('Admin'));
            if ($pilihan == "Admin" ) {
                return redirect('/');
            }else {
                if (auth()->user()->level !== "Klien" || auth()->user()->level !== "Freelancer") {
                    $data = User::find(auth()->user()->id);
                    $data->level = Crypt::decrypt($jenis);
                    $data->save();
                    return redirect('/');
                }
                $data = User::find(auth()->user()->id);
                $data->level = Crypt::decrypt($jenis);
                $data->save();
            }
            
            return redirect('/');
        }
}
