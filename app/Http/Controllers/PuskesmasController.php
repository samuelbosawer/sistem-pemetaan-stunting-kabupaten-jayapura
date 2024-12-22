<?php

namespace App\Http\Controllers;

use App\Models\Distrik;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    public function index(Request $request)
    {

        $datas = Puskesmas::where([
            ['nama_puskesmas', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('nama_puskesmas', 'LIKE', '%' . $s . '%')
                        ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);
        return view('admin.puskesmas.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $distrik = Distrik::get();
        return view('admin.puskesmas.create', compact('distrik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nama_puskesmas' => 'required',
                'distrik_id' => 'required',
            ],
            [
                'nama_puskesmas.required' => 'Tidak boleh kosong',
                'distrik_id.required' => 'Tidak boleh kosong',
            ]
        );
        $data = new Puskesmas();

        $data->nama_puskesmas   = $request->nama_puskesmas;
        $data->distrik_id   = $request->distrik_id;
        $data->keterangan   = $request->keterangan;

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('admin.puskesmas');

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
              Puskesmas::create([
                  'distrik_id' => $row[2],       // Kolom 1: nama item
                  'nama_puskesmas' => $row[3],       // Kolom 1: nama item
              ]);
          }
          fclose($file);
          alert()->success('Berhasil', 'Upload data berhasil')->autoclose(3000);
          return redirect()->route('admin.puskesmas');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $distrik = Distrik::get();
        $data = Puskesmas::where('id',$id)->first();
        $caption = 'Detail Data Puskesmas';

        return view('admin.puskesmas.create', compact('distrik','data','caption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $distrik = Distrik::get();
        $data = Puskesmas::where('id',$id)->first();
        $caption = 'Detail Data Puskesmas';

        return view('admin.puskesmas.create', compact('distrik','data','caption'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_puskesmas' => 'required',
                'distrik_id' => 'required',
            ],
            [
                'nama_puskesmas.required' => 'Tidak boleh kosong',
                'distrik_id.required' => 'Tidak boleh kosong',
            ]
        );
        $data = Puskesmas::find($id);

        $data->nama_puskesmas   = $request->nama_puskesmas;

        $kel = Kelurahan::find($request->distrik_id);

        // dd($kel);
        $data->distrik_id   = $kel->distrik_id;
        $data->distrik_id   = $request->distrik_id;
        $data->keterangan   = $request->keterangan;

        $data->update();
        alert()->success('Berhasil', 'Ubah data berhasil')->autoclose(3000);
        return redirect()->route('admin.puskesmas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Puskesmas::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function excel(Request $request)
    {

    }
}
