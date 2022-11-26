<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class homeControler extends Controller
{
    public function index(){
        $bidang = Bidang::all();
        return view('home', ['bidang'=> $bidang]);
    }
}
