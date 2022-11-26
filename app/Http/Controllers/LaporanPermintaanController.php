<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;
use PDF;



class LaporanPermintaanController extends Controller
{
    public function index(){
        
        $permintaan = Permintaan::all()->where('klien_id','like', auth()->user()->id);
        $terima = $permintaan->where('status','like','diterima');
        $tolak = $permintaan->where('status','like','ditolak');
        $menunggu = $permintaan->where('status','like','menunggu');
  
       
             
            
        // dd($data);
        $pdf = PDF::loadView('Klien.PermintaanLaporan', ['terima' =>  $terima,'tolak' => $tolak,'menunggu' =>  $menunggu]);
     
        return $pdf->download('LaporanPermintaan.pdf');
    }
}
