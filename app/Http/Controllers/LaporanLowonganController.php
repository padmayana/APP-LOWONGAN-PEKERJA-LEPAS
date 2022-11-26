<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use PDF;

class LaporanLowonganController extends Controller
{
    public function index($id){
        $lowongan = Lowongan::find(decrypt($id));
        $pelamar = Lamaran::all()->where('lowongan_id', 'like', decrypt($id)); 
        $terima = $pelamar->where('status','like','Diterima');
        $tolak = $pelamar->where('status','like','Tolak');
       
        // dd($data);
        $pdf = PDF::loadView('Klien.LowonganLaporan', ['terima' =>  $terima,'tolak' => $tolak,'lowongan' =>  $lowongan, 'pelamar' => $pelamar]);
     
        return $pdf->download('LowonganPermintaan.pdf');
    }
}
