<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\AgendaKegiatan as Agenda;
use App\Models\Galeri;
use App\Models\Puskesmas;
use App\Models\Stunting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    public function index(Request $request)
    {


        $datas = Stunting::where([
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('pendek', 'LIKE', '%' . $s . '%')
                        ->orWhere('sangat_pendek', 'LIKE', '%' . $s . '%')
                        ->orWhere('jumlah_balita', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);

        $pus = Puskesmas::with('distrik.stunting')->get();

        return view('home.index',compact('datas','pus'))->with('i',(request()->input('page', 1) - 1) * 10);

    }
}
