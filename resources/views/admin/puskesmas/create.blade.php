@extends('admin.layout.tamplate')
@section('title')
Data Puskesmas
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
                                <h4 class="header-title"> {{ $caption ?? 'Tambah Data Puskesmas' }} </h4>


                                @if (Request::segment(4) == 'ubah')
                                    <form action="{{ route('admin.puskesmas.update', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                    @else
                                        <form action="{{ route('admin.puskesmas.store') }}" method="post"
                                            enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_puskesmas"> Nama Puskesmas <span
                                                                class="text-danger">*</span> </label>
                                                        <input type="text" id="nama_puskesmas"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('nama_puskesmas') ?? ($data->nama_puskesmas ?? '') }}"
                                                            name="nama_puskesmas" placeholder="" class="form-control">
                                                        @if ($errors->has('nama_puskesmas'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('nama_puskesmas') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">

                                                        <label for="latitude"> Distrik <span class="text-danger">*</span>
                                                        </label>
                                                        <select class="form-control" aria-label="Default select example"
                                                            name="distrik_id"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                            <option value="">Pilih Distrik</option>
                                                            @foreach ($distrik as $k)
                                                                <option @if ($k->id == ($data->distrik_id ?? '')) selected @endif
                                                                    value="{{ $k->id }}">
                                                                    {{ $k->nama_distrik }}
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
                                                            href="{{ route('admin.puskesmas') }}">Kembali</a>

                                                            @if(Auth::user()->hasRole('admindinas'))
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.puskesmas.ubah', $data->id) }}">Ubah <i
                                                                class="fas fa-edit"></i> </a>

                                                            @endif
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
