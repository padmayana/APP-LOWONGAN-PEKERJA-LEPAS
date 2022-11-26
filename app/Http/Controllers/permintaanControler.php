<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class permintaanControler extends Controller
{
    public function index(){
        $data = Permintaan::paginate(7);
        $menu = "permintaan";

        return view('dashboard.permintaan', ['menu' => $menu, 'data' => $data]);
    }

    public function update(){
        $hariIni = date("Y-m-d");
        $data = Permintaan::all();
        foreach ($data as $item) {
            if ($item->status == 'menunggu' ) {
                $selisih = Carbon::parse($item->tgl_dibuat)->diffInDays($hariIni);
                if ($selisih > 2) {
                    $data = Permintaan::find($item->id);
                    $data->status = 'ditolak';
                    $data->save();

                    }
                }
            }
        return redirect('/admin/permintaan')->with('pesan', 'Proses update sukses');
    }
}
