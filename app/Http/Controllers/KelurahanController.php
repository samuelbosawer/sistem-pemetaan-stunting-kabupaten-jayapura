<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Distrik;


class KelurahanController extends Controller
{
    public function index(Request $request)
    {
        $datas = Kelurahan::where([
            ['nama_kelurahan', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('nama_kelurahan', 'LIKE', '%' . $s . '%')
                        ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);
        return view('admin.kelurahan.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $distrik = Distrik::get();
        return view('admin.kelurahan.create', compact('distrik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nama_kelurahan' => 'required',
                'distrik_id' => 'required',
            ],
            [
                'nama_kelurahan.required' => 'Tidak boleh kosong',
                'distrik_id.required' => 'Tidak boleh kosong',
            ]
        );
        $data = new Kelurahan();

        $data->nama_kelurahan   = $request->nama_kelurahan;
        $data->distrik_id   = $request->distrik_id;
        $data->latitude   = $request->latitude;
        $data->longitude   = $request->longitude;
        $data->keterangan   = $request->keterangan;

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('admin.kelurahan');


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
              Kelurahan::create([
                  'distrik_id' => $row[2],       // Kolom 1: nama item
                  'nama_kelurahan' => $row[3],       // Kolom 1: nama item
                  'latitude' => $row[4],   // Kolom 2: kuantitas
                  'longitude' => $row[5],      // Kolom 3: harga
              ]);
          }
          fclose($file);
          alert()->success('Berhasil', 'Upload data berhasil')->autoclose(3000);
          return redirect()->route('admin.kelurahan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Kelurahan::where('id',$id)->first();
        $distrik = Distrik::get();
        $caption = 'Detail Data Kelurahan';
        return view('admin.kelurahan.create',compact('data','caption','distrik'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kelurahan::where('id',$id)->first();
        $distrik = Distrik::get();
        $caption = 'Ubah Data Kelurahan';
        return view('admin.kelurahan.create',compact('data','caption','distrik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_kelurahan' => 'required',
                'distrik_id' => 'required',
            ],
            [
                'nama_kelurahan.required' => 'Tidak boleh kosong',
                'distrik_id.required' => 'Tidak boleh kosong',
            ]
        );
        $data = Kelurahan::find($id);
        $data->nama_kelurahan   = $request->nama_kelurahan;
        $data->distrik_id   = $request->distrik_id;
        $data->latitude   = $request->latitude;
        $data->longitude   = $request->longitude;
        $data->keterangan   = $request->keterangan;

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('admin.kelurahan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kelurahan::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function excel(Request $request)
    {

    }
}
