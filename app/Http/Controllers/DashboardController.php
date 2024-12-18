<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemuda;
use App\Models\Wilayah;
use App\Models\Gereja;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {




        return view('admin.dashboard.index');
    }


}
