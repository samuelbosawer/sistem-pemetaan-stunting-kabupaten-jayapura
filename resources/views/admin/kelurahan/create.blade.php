@extends('admin.layout.tamplate')
@section('title')
    Tambah Data Kelurahan
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @include('admin.layout.breadcump')

                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"> {{ $caption ?? 'Tambah Data kelurahan' }} </h4>


                                @if (Request::segment(4) == 'ubah')
                                    <form action="{{ route('admin.kelurahan.update', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                    @else
                                        <form action="{{ route('admin.kelurahan.store') }}" method="post"
                                            enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_kelurahan"> Nama Kelurahan <span
                                                                class="text-danger">*</span> </label>
                                                        <input type="text" id="nama_kelurahan"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nama_kelurahan') ?? ($data->nama_kelurahan ?? '') }}"
                                                            name="nama_kelurahan" placeholder="" class="form-control">
                                                        @if ($errors->has('nama_kelurahan'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nama_kelurahan') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="latitude"> Distrik <span class="text-danger">*</span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="distrik_id" @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="">Pilih Distrik</option>
                                                            @foreach ($distrik as $d)


                                                            <option
                                                            @if($d->id == ($data->distrik_id ?? '')) selected @endif
                                                            value="{{ $d->id }}">
                                                            {{ $d->nama_distrik }}
                                                        </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('distrik_id'))
                                                        <label class="text-danger">
                                                            {{ $errors->first('distrik_id') }}
                                                        </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="latitude"> Latitude <span class="text-danger"></span>
                                                        </label>
                                                        <input type="text" id="latitude"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('latitude') ?? ($data->latitude ?? '') }}"
                                                            name="latitude" placeholder="" class="form-control">
                                                        @if ($errors->has('latitude'))
                                                            <label class="text-danger"> {{ $errors->first('latitude') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="longitude"> Longitude <span class="text-danger"></span>
                                                        </label>
                                                        <input type="text" id="longitude"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('longitude') ?? ($data->longitude ?? '') }}"
                                                            name="longitude" placeholder="" class="form-control">
                                                        @if ($errors->has('longitude'))
                                                            <label class="text-danger"> {{ $errors->first('longitude') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="keterangan"> Keterangan </label>
                                                        <textarea id="keterangan" @if (Request::segment(3) == 'detail') disabled @endif name="keterangan"
                                                            placeholder="Masukan keterangan" rows="5" class="form-control">{{ old('keterangan') ?? ($data->keterangan ?? '') }} </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            @if (Request::segment(3) == 'detail')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.kelurahan') }}">Kembali</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.kelurahan.ubah', $data->id) }}">Ubah <i
                                                                class="fas fa-edit"></i> </a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Simpan <i
                                                                data-feather="save"></i></button>
                                                    </div>
                                                </div>
                                            @endif



                                        </div> <!-- end card-box-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                                </form>




                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                {{-- end row --}}





            </div> <!-- container -->

        </div> <!-- content -->
    @endsection
