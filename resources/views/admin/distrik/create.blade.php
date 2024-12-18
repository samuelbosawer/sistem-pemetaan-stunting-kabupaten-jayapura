@extends('admin.layout.tamplate')
@section('title')
    Tambah Data Distrik
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
                                <h4 class="header-title"> {{ $caption ?? 'Tambah Data Distrik' }} </h4>


                                @if (Request::segment(4) == 'ubah')
                                    <form action="{{ route('admin.distrik.update', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                    @else
                                        <form action="{{ route('admin.distrik.store') }}" method="post"
                                            enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_distrik"> Nama Distrik <span
                                                                class="text-danger">*</span> </label>
                                                        <input type="text" id="nama_distrik"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nama_distrik') ?? ($data->nama_distrik ?? '') }}"
                                                            name="nama_distrik" placeholder="" class="form-control">
                                                        @if ($errors->has('nama_distrik'))
                                                            <label class="text-danger"> {{ $errors->first('nama_distrik') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="latitude"> Latitude <span
                                                                class="text-danger"></span> </label>
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
                                                        <label for="longitude"> Longitude <span
                                                                class="text-danger"></span> </label>
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
                                                            href="{{ route('admin.distrik') }}">Kembali</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.distrik.ubah', $data->id) }}">Ubah <i
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
