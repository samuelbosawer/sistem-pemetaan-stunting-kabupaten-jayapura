<?php

namespace App\Http\Controllers;

use App\Models\Distrik;
use Illuminate\Http\Request;

class DistrikController extends Controller
{
    public function index(Request $request)
    {

        $datas = Distrik::where([
            ['nama_distrik', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('nama_distrik', 'LIKE', '%' . $s . '%')
                        ->orWhere('keterangan', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);
        return view('admin.distrik.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.distrik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nama_distrik' => 'required',
            ],
            [
                'nama_distrik.required' => 'Tidak boleh kosong',
            ]
        );
        $data = new Distrik();

        $data->nama_distrik   = $request->nama_distrik;
        $data->latitude   = $request->latitude;
        $data->longitude   = $request->longitude;
        $data->keterangan   = $request->keterangan;

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('admin.distrik');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Distrik::where('id',$id)->first();
        $caption = 'Detail Data Distrik';
        return view('admin.distrik.create',compact('data','caption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Distrik::where('id',$id)->first();
        $caption = 'Detail Data Distrik';
        return view('admin.distrik.create',compact('data','caption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_distrik' => 'required',
            ],
            [
                'nama_distrik.required' => 'Tidak boleh kosong',
            ]
        );
        $data = Distrik::find($id);

        $data->nama_distrik   = $request->nama_distrik;
        $data->latitude   = $request->latitude;
        $data->longitude   = $request->longitude;
        $data->keterangan   = $request->keterangan;

        $data->update();
        alert()->success('Berhasil', 'Ubah data berhasil')->autoclose(3000);
        return redirect()->route('admin.distrik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Distrik::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function excel(Request $request)
    {

    }

}
