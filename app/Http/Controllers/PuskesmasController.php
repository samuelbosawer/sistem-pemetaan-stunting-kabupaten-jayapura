<?php

namespace App\Http\Controllers;

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
        $kelurahan = Kelurahan::get();
        return view('admin.puskesmas.create', compact('kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_puskesmas' => 'required',
                'kelurahan_id' => 'required',
            ],
            [
                'nama_puskesmas.required' => 'Tidak boleh kosong',
                'kelurahan_id.required' => 'Tidak boleh kosong',
            ]
        );
        $data = new Puskesmas();

        $data->nama_puskesmas   = $request->nama_puskesmas;

        $kel = Kelurahan::find($request->kelurahan_id);

        // dd($kel);
        $data->distrik_id   = $kel->distrik_id;
        $data->kelurahan_id   = $request->kelurahan_id;
        $data->keterangan   = $request->keterangan;

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('admin.puskesmas');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelurahan = Kelurahan::get();
        $data = Puskesmas::where('id',$id)->first();
        $caption = 'Detail Data Puskesmas';

        return view('admin.puskesmas.create', compact('kelurahan','data','caption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelurahan = Kelurahan::get();
        $data = Puskesmas::where('id',$id)->first();
        $caption = 'Ubah Data Puskesmas';
        return view('admin.puskesmas.create', compact('kelurahan','data','caption'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_puskesmas' => 'required',
                'kelurahan_id' => 'required',
            ],
            [
                'nama_puskesmas.required' => 'Tidak boleh kosong',
                'kelurahan_id.required' => 'Tidak boleh kosong',
            ]
        );
        $data = Puskesmas::find($id);

        $data->nama_puskesmas   = $request->nama_puskesmas;

        $kel = Kelurahan::find($request->kelurahan_id);

        // dd($kel);
        $data->distrik_id   = $kel->distrik_id;
        $data->kelurahan_id   = $request->kelurahan_id;
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
