<?php

namespace App\Http\Controllers;

use App\Models\Stunting;
use Illuminate\Http\Request;


class ClusteringController extends Controller
{
    public function index(Request $request)
    {

        $stunting = Stunting::get();
        $i = 0;
        $c1 = null;

        if (is_array($request->centroid)) {
            $count = count($request->centroid);
        } elseif ($request->centroid instanceof \Illuminate\Support\Collection) {
            $count = $request->centroid->count();
        } else {
            $count = 0; // Jika bukan array atau koleksi
        }
        if($request->centroid)
        {
                if($count == 0 || $count > 3 || $count < 3)
                {
                    alert()->error('Gagal', 'Jumlah data yang harus dipilih adalah 3')->autoclose(3000);
                    return redirect()->route('admin.clustering');
                }
        }

        if($count == 3)
        {
            $centroid = $request->centroid;
            foreach($centroid as $c)
            {
                $c1[] = Stunting::where('id',$c)->get();
            }
        }



        return view('admin.perhitungan.index',compact('stunting','i','c1'));
    }
}
