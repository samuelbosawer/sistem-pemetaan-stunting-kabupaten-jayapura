<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Exports\ExportMahasiswa;
use Excel;
use Carbon\Carbon;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $datas = Mahasiswa::with('jurusan')->where([
            ['nama_lengkap', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('nama_lengkap', 'LIKE', '%' . $s . '%')
                        ->orWhere('jenis_kelamin', 'LIKE', '%' . $s . '%')
                        ->orWhere('nim', 'LIKE', '%' . $s . '%')
                        ->orWhere('no_hp', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);
        return view('admin.mahasiswa.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::get();
        return view('admin.mahasiswa.create',compact('jurusan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jurusan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'alamat' => 'required',
            'nim' => 'required|unique:mahasiswas,nim',
            'email' => 'required|email|unique:mahasiswas,email',
            'no_hp' => 'required|unique:mahasiswas,no_hp',
        ],
        [
            'nama_lengkap.required' => 'Tidak boleh kosong',
            'tempat_lahir.required' => 'Tidak boleh kosong',
            'tanggal_lahir.required' => 'Tidak boleh kosong',
            'jenis_kelamin.required' => 'Tidak boleh kosong',
            'jurusan.required' => 'Tidak boleh kosong',
            'foto.required' => 'Tidak boleh kosong',
            // 'alamat.required' => 'Tidak boleh kosong',
            'nim.required' => 'Tidak boleh kosong',
            'nim.unique' => 'Sudah terdaftar',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'no_hp.required' => 'Tidak boleh kosong',
            'no_hp.unique' => 'Sudah terdaftar',
        ]

    );


    $data = new Mahasiswa();

    $data->nama_lengkap   = $request->nama_lengkap;
    $data->tempat_lahir = $request->tempat_lahir;
    $data->tanggal_lahir = $request->tanggal_lahir;
    $data->jenis_kelamin = $request->jenis_kelamin;
    $data->jurusan_id = $request->jurusan;
    $data->alamat = $request->alamat;
    $data->keterangan = $request->keterangan;
    $data->nim = $request->nim;
    $data->email = $request->email;
    $data->no_hp = $request->no_hp;

    // picture creation
    if (isset($request->foto)) {

        // create file name
        $fileName = $request->foto->getClientOriginalName();

        // crate file path
        $path = public_path('gambar/mahasiswa/' . $data->foto);

        // delete file if exist
        if (file_exists($path)) {
            File::delete($path);
        }

        // adding file name into database variable
        $timestamp = now()->timestamp;
        $data->foto = 'gambar/mahasiswa/'.$timestamp.'-'.$fileName;

        // move file into folder path with the file name
        $request->foto->move(public_path('gambar/mahasiswa'), $timestamp.'-'.$fileName);
    }
    $data->save();


    alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
    return redirect()->route('admin.mahasiswa');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Mahasiswa::where('id',$id)->first();
        $jurusan = Jurusan::get();
        $caption = 'Detail Data Mahasiswa';
        return view('admin.mahasiswa.create',compact('jurusan','data','caption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Mahasiswa::where('id',$id)->first();
        $jurusan = Jurusan::get();
        $caption = 'Ubah Data Mahasiswa';
        return view('admin.mahasiswa.create',compact('jurusan','data','caption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'jurusan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'alamat' => 'required',
            // 'nim' => 'required|unique:mahasiswas,nim',
            // 'email' => 'required|email|unique:mahasiswas,email',
            // 'no_hp' => 'required|unique:mahasiswas,no_hp',
        ],
        [
            'nama_lengkap.required' => 'Tidak boleh kosong',
            'tempat_lahir.required' => 'Tidak boleh kosong',
            'tanggal_lahir.required' => 'Tidak boleh kosong',
            'jenis_kelamin.required' => 'Tidak boleh kosong',
            'jurusan.required' => 'Tidak boleh kosong',
            // 'foto.required' => 'Tidak boleh kosong',
            // 'alamat.required' => 'Tidak boleh kosong',
            // 'nim.required' => 'Tidak boleh kosong',
            // 'nim.unique' => 'Sudah terdaftar',
            // 'email.email' => 'Email tidak valid',
            // 'email.unique' => 'Email sudah terdaftar',
            // 'no_hp.required' => 'Tidak boleh kosong',
            // 'no_hp.unique' => 'Sudah terdaftar',
        ]

    );


    $data = Mahasiswa::find($id);

    $data->nama_lengkap   = $request->nama_lengkap;
    $data->tempat_lahir = $request->tempat_lahir;
    $data->tanggal_lahir = $request->tanggal_lahir;
    $data->jenis_kelamin = $request->jenis_kelamin;
    $data->jurusan_id = $request->jurusan;
    $data->alamat = $request->alamat;
    $data->keterangan = $request->keterangan;
    // $data->nim = $request->nim;
    // $data->email = $request->email;
    // $data->no_hp = $request->no_hp;

    // picture creation
    if (isset($request->foto)) {

        // create file name
        $fileName = $request->foto->getClientOriginalName();

        // crate file path
        $path = public_path('gambar/mahasiswa/' . $data->foto);

        // delete file if exist
        if (file_exists($path)) {
            File::delete($path);
        }
        // adding file name into database variable
        $timestamp = now()->timestamp;
        $data->foto = 'gambar/mahasiswa/'.$timestamp.'-'.$fileName;

        // move file into folder path with the file name
        $request->foto->move(public_path('gambar/mahasiswa'), $timestamp.'-'.$fileName);
    }
    $data->update();


    alert()->success('Berhasil', 'Ubah data berhasil')->autoclose(3000);
    return redirect()->route('admin.mahasiswa');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Mahasiswa::find($id);
        if ($data->foto) {
            File::delete($data->foto);
        }
        $data->delete();
        return redirect()->back();
    }


    public function excel(Request $request)
    {
        $title = 'mahasiswa-' . Carbon::now()->isoFormat('DMY') . '.xlsx';
       return Excel::download(new ExportMahasiswa($request), $title);
    }
}
