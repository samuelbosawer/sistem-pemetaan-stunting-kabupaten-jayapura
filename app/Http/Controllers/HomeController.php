<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\AgendaKegiatan as Agenda;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        return view('home.index',compact('pengumuman','agenda','galeri'));
    }
}
