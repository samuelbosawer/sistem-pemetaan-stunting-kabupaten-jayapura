<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use App\Models\Stunting;
use Illuminate\Http\Request;

class StuntingController extends Controller
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
        return view('admin.stunting.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puskesmas = Puskesmas::get();
        return view('admin.stunting.create', compact('puskesmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'puskesmas_id' => 'required',

            ],
            [
                'puskesmas_id.required' => 'Tidak boleh kosong',
            ]
        );
        $data = new Stunting();

        $data->puskesmas_id   = $request->puskesmas_id;
        $data->pendek   = $request->pendek;
        $data->sangat_pendek   = $request->sangat_pendek;
        $data->jumlah_balita   = $request->jumlah_balita;

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('admin.stunting');

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
              Stunting::create([
                  'distrik_id' => $row[1],
                  'jumlah_balita' => $row[2],
                  'sangat_pendek' => $row[3],
                  'pendek' => $row[4],
              ]);
          }
          fclose($file);
          alert()->success('Berhasil', 'Upload data berhasil')->autoclose(3000);
          return redirect()->route('admin.stunting');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $puskesmas = Puskesmas::get();
        $data = Stunting::where('id',$id)->first();
        return view('admin.stunting.create', compact('puskesmas','data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $puskesmas = Puskesmas::get();
        $data = Stunting::where('id',$id)->first();
        return view('admin.stunting.create', compact('puskesmas','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'puskesmas_id' => 'required',

            ],
            [
                'puskesmas_id.required' => 'Tidak boleh kosong',
            ]
        );
        $data = Stunting::find($id);

        $data->puskesmas_id   = $request->puskesmas_id;
        $data->pendek   = $request->pendek;
        $data->sangat_pendek   = $request->sangat_pendek;
        $data->jumlah_balita   = $request->jumlah_balita;

        $data->update();
        alert()->success('Berhasil', 'Ubah data berhasil')->autoclose(3000);
        return redirect()->route('admin.stunting');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Stunting::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function excel(Request $request)
    {

    }
}
