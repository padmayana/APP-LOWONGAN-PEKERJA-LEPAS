<?php

namespace App\Http\Controllers;

use App\Models\Skil;
use App\Models\User;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Mail\LamaranDiterimaMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class klienPelamarController extends Controller
{
    public function index($id){
        $lowongan = Lowongan::find(Crypt::decrypt($id));
        $data = Lamaran::where('lowongan_id','like', Crypt::decrypt($id))->where('status','like','Menunggu')->paginate(4);
        $terima = Lamaran::where('lowongan_id','like', Crypt::decrypt($id))->where('status','like','Diterima')->paginate(4);
        return view('Klien.lowonganFitur.pelamar', ['data' => $data, 'id' => $id, 'terima' => $terima]);
    }
    public function profil($user,$lamaran,$pelamar){ 
        $userData = User::find(Crypt::decrypt($user));
        $pelamar = Lamaran::find(decrypt($pelamar));
        $skill = Skil::all()->where('user_id','like',Crypt::decrypt($user));
        return view('Klien.lowonganFitur.profilePelamar', ['user' => $userData, 'lamaran' => $lamaran, 'pelamar' => $pelamar,'skill' => $skill]);
    }
    public function view($cv){
        $cv = decrypt($cv);
        return response()->file('storage/'.$cv);
    }
    public function terima($pelamar,$lowongan){
        $pelamar = decrypt($pelamar);
        $lowongan = decrypt($lowongan);
        
        $dataPelamar = Lamaran::find($pelamar);
        $dataLowongan = Lowongan::find($lowongan); 

       
        if ($dataLowongan->terima >= $dataLowongan->kuota) {
            $dataLowongan->status = 'tutup';
            $dataLowongan->save();
            return back();
        }
    
        $dataPelamar->status = 'Diterima';
        $dataPelamar->save();

        $dataLowongan->terima = $dataLowongan->terima + 1 ;
        $dataLowongan->save();

        $details = [];
        Mail::to( $dataPelamar->user->email )->send(new LamaranDiterimaMail($details));

        $dataLowongan = Lowongan::find($lowongan); 

        if ($dataLowongan->terima >= $dataLowongan->kuota) {
            
            $dataLowongan->status = 'tutup';
            $dataLowongan->save();
            Lamaran::where('lowongan_id','like',$lowongan)->where('status','like','Menunggu')->update(['status' => 'Tolak']);
            return back();
        }

        return back();
    }
}
