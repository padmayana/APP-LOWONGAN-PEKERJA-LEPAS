<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\Daerah;
use App\Models\User;
use Illuminate\Http\Request;


class userController extends Controller
{
    // view dashboard user
    public function index()
    {


        $data = User::latest();

        if (request('id')) {

            $data = $data->where('id', 'like', request('id'));
        }
        $data = $data->paginate(7);
        $daerah = Daerah::all();
        $menu = "pengguna";
        return view('dashboard.pengguna', ['menu' => $menu, 'data' => $data, 'daerah' => $daerah]);
    }
    // update data pengguna
    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        if (isset($user)) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->lahir = $request->lahir;
            $user->notlp = $request->notlp;
            $user->daerah = $request->daerah;
            $user->level = $request->level;
            $user->kelamin = $request->kelamin;
            $user->save();
            if ($request->level == 'admin') {
                return redirect('/admin/pengguna')->with('pesan', 'Proses Edit sukses');
            } else {
                return redirect('/admin/pengguna')->with('pesan', 'Proses Edit sukses');
            }
        } else {
            return redirect('/admin/pengguna')->with('pesan', 'Proses Edit Gagal');
        }
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/pengguna')->with('pesan', 'Proses delete sukses');
    }
}
