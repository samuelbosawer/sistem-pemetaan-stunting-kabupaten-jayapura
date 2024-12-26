<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\AgendaKegiatan as Agenda;
use App\Models\Distrik;
use App\Models\Galeri;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use App\Models\Stunting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    public function index(Request $request)
    {


        $datas = Stunting::orderBy('id', 'desc')->get();

        $pus = Puskesmas::with('distrik.stunting')->get();

        return view('home.index',compact('datas','pus'));

    }

    public function peta($id)
    {
        $distrik = Distrik::where('id',$id)->first();
        $kelurahan = Kelurahan::where('distrik_id',$id)->get();
        return view('home.detail-peta',compact('distrik','kelurahan'));
    }
}
