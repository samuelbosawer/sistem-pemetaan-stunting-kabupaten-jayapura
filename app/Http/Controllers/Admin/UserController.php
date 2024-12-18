<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gereja;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Exports\UsersExport;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $datas = User::where([
            ['email', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('email', 'LIKE', '%' . $s . '%');
                    $query->orWhere('name', 'LIKE', '%' . $s . '%');
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);
        return view('admin.pengguna.index',compact('datas'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wilayah = Wilayah::get();
        $gereja = Gereja::get();
        $role = Role::get();
        return view('admin.pengguna.create',compact('wilayah','gereja','role'));
    }

    public function getWIlayah($id)
    {
        $wilayahs = Wilayah::all();
        return response()->json($wilayahs);
    }

    public function getGerejas($wilayah_id)
    {
        $gerejas = Gereja::where('wilayah_id', $wilayah_id)->get();
        return response()->json($gerejas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                // 'phone' => 'required|unique:users,phone|max:13',
                'email' => 'required|unique:users,email|string',
                // 'date_of_birth' => 'required',
                'wilayah_id' => 'required',
                'gereja_id' => 'required',
                'name' => 'required',
                'password'  => 'required|confirmed|min:8',
                'password_confirmation' => 'required_with:password|same:password|min:8'
            ],
            [
                'email.required' => 'Tidak boleh kosong',
                'email.unique' => 'Email sudah terdaftar',
                'wilayah_id.required' => 'Tidak boleh kosong',
                'name.required' => 'Tidak boleh kosong',
                'gereja_id.required' => 'Tidak boleh kosong',
                'gereja_id.required' => 'Tidak boleh kosong',
                'password.required' => 'Tidak boleh kosong',
                'password.confirmed' => 'Password tidak sama',
            ]
        );
        $data = new User();

        $data->email   = $request->email;
        $data->wilayah_id   = $request->wilayah_id;
        $data->gereja_id   = $request->gereja_id;
        $data->password   = $request->password;
        $data->name   = $request->name;
        $data->assignRole($request->role);

        $data->save();
        alert()->success('Berhasil', 'Tambah data berhasil')->autoclose(3000);
        return redirect()->route('admin.pengguna');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wilayah = Wilayah::get();
        $gereja = Gereja::get();
        $role = Role::get();
        $caption = 'Detail Data Pengguna';
        $data = User::where('id',$id)->first();
        return view('admin.pengguna.create',compact('wilayah','gereja','role','caption','data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wilayah = Wilayah::get();
        $gereja = Gereja::get();
        $role = Role::get();
        $caption = 'Ubah Data Pengguna';
        $data = User::where('id',$id)->first();
        return view('admin.pengguna.create',compact('wilayah','gereja','role','caption','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                // 'phone' => 'required|unique:users,phone|max:13',
                'email' => 'required|string',
                // 'date_of_birth' => 'required',
                'wilayah_id' => 'required',
                'gereja_id' => 'required',
                'name' => 'required',
                'password'  => 'confirmed',
                'password_confirmation' => 'same:password'
            ],
            [
                'email.required' => 'Tidak boleh kosong',
                'wilayah_id.required' => 'Tidak boleh kosong',
                'name.required' => 'Tidak boleh kosong',
                'gereja_id.required' => 'Tidak boleh kosong',
                'gereja_id.required' => 'Tidak boleh kosong',
                'password.required' => 'Tidak boleh kosong',
                'password.confirmed' => 'Password tidak sama',
            ]
        );
        $data = User::find($id);

        $data->email   = $request->email;
        $data->wilayah_id   = $request->wilayah_id;
        $data->gereja_id   = $request->gereja_id;
        if($request->password == null) {
            $password = $data->password;
        }else
        {
            $password = $request->password;
        }
        $data->password   = $password;
        $data->name   = $request->name;
        $data->assignRole($request->role);

        $data->update();
        alert()->success('Berhasil', 'Ubah data berhasil')->autoclose(3000);
        return redirect()->route('admin.pengguna');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function pdf(Request $request)
    {
        $search = $request->s;
        $all = User::where(function ($query) use ($search) {
                $query->Where('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->get();

        $datas = ['datas' => $all];
        $title = ['title' => 'DATA PENGGUNA'];
        $doc = 'data-pengguna.pdf';
        $pdf = PDF::loadView('admin.pengguna.pdf', $datas, $title);
        return $pdf->download($doc);

    }

    public function excel(Request $request)
    {
        return Excel::download(new UsersExport($request), 'data-pengguna.xlsx');
    }
}
