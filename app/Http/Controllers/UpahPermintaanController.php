<?php

namespace App\Http\Controllers;

use App\Models\Upah;
use Illuminate\Http\Request;

class UpahPermintaanController extends Controller
{
    
    public function tambah(Request $request,$id){
        $upah = Upah::where('permintaan_id','like', decrypt($id))->first();
        if (isset($upah)) {
            return back();
        }
        $request->validate([
            'upah' => 'required',
            'jenis' => 'required',
        ]);
        Upah::create([
            'upah' => $request->upah,
            'jenis_upah' => $request->jenis,
            'permintaan_id' => decrypt($id),
            'status' => 'menunggu',
        ]);
        return back();
    }
    public function klienSetuju($id){
        $data = Upah::find(decrypt($id));
        if ($data) {
            $data->status = 'setuju';
            $data->save();
        }
        return back();
    }
    public function klienMenolak($id){
        $data = Upah::find(decrypt($id));
        if ($data) {
            $data->status = 'menolak';
            $data->save();
        }
        return back();
    }
    public function edit(Request $request, $id){
        $request->validate([
            'upah' => 'required',
            'jenis' => 'required',
        ]);

        $data = Upah::find(decrypt($id));
        $data->status = 'menunggu';
        $data->upah = $request->upah;
        $data->jenis_upah = $request->jenis;
        $data->save();
        return back();
    }
}
