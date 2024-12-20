<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faktor;

class FaktorController extends Controller
{
    public function index(Request $request)
    {

        $datas = Faktor::where([
            ['faktor', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('faktor', 'LIKE', '%' . $s . '%')
                        ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);
        return view('admin.faktor.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faktor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'faktor' => 'required',
            ],
            [
                'faktor.required' => 'Tidak boleh kosong',
            ]
        );
        $data = new Faktor();

        $data->faktor   = $request->faktor;
        $data->keterangan   = $request->keterangan;

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('admin.faktor');
    }


    public function csv(Request $request)
    {
        $request->validate([
            'csv' => 'required|file|mimes:csv,txt|max:2048',
        ]);

          // Simpan file sementara
          $filePath = $request->file('csv')->getRealPath();

          // Baca CSV dan proses data
          $file = fopen($filePath, 'r');
          $header = fgetcsv($file); // Ambil header (jika ada)

          // Proses baris data
          while (($row = fgetcsv($file)) !== false) {
              Distrik::create([
                  'nama_distrik' => $row[2],       // Kolom 1: nama item
                  'latitude' => $row[3],   // Kolom 2: kuantitas
                  'longitude' => $row[4],      // Kolom 3: harga
              ]);
          }
          fclose($file);
          alert()->success('Berhasil', 'Upload data berhasil')->autoclose(3000);
          return redirect()->route('admin.distrik');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Faktor::where('id',$id)->first();
        $caption = 'Detail Data Distrik';
        return view('admin.faktor.create',compact('data','caption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Faktor::where('id',$id)->first();
        $caption = 'Ubah Data Distrik';
        return view('admin.faktor.create',compact('data','caption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'faktor' => 'required',
            ],
            [
                'faktor.required' => 'Tidak boleh kosong',
            ]
        );
        $data = Faktor::find($id);

        $data->faktor   = $request->faktor;
        $data->keterangan   = $request->keterangan;

        $data->update();
        alert()->success('Berhasil', 'Ubah data berhasil')->autoclose(3000);
        return redirect()->route('admin.faktor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Faktor::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function excel(Request $request)
    {

    }
}
