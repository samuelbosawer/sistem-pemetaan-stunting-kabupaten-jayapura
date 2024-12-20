<?php

namespace App\Http\Controllers;

use App\Models\Distrik;
use Illuminate\Http\Request;
use App\Models\Pemuda;
use App\Models\Wilayah;
use App\Models\Gereja;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use App\Models\Stunting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {


        $distrik = Distrik::get()->count();
        $kelurahan = Kelurahan::get()->count();
        $puskesmas = Puskesmas::get()->count();
        $stunting = Stunting::get()->count();
        $pengguna = User::get()->count();

        $pus = Puskesmas::with('distrik.stunting')->get();


        return view('admin.dashboard.index', compact('distrik','kelurahan','puskesmas','stunting','pengguna','pus'));
    }


}
