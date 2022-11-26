<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigasiController extends Controller
{
    public function index()
    {
        $menu = "dashboard";
        return view('dashboard.dashboard', ['menu' => $menu]);
    }
    public function pengguna()
    {
        $menu = "pengguna";
        return view('dashboard.pengguna', ['menu' => $menu]);
    }
    public function bidang()
    {
        $menu = "bidang";
        return view('/dashboard/bidang', ['menu' => $menu]);
    }
    public function kemampuan()
    {
        $menu = "kemampuan";
        return view('.dashboard.kemampuan', ['menu' => $menu]);
    }

    public function permintaan()
    {
        $menu = "permintaan";
        return view('.dashboard.permintaan', ['menu' => $menu]);
    }
    public function upah()
    {
        $menu = "upah";
        return view('.dashboard.upah', ['menu' => $menu]);
    }

    public function lowongan()
    {
        $menu = "lowongan";
        return view('dashboard.lowongan', ['menu' => $menu]);
    }
    public function lamaran()
    {
        $menu = "lamaran";
        return view('dashboard.lamaran', ['menu' => $menu]);
    }
    public function home()
    {
        $menu = "permintaan";
        return view('home');
    }
}
