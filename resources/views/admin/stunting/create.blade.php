@extends('admin.layout.tamplate')
@section('title')
    Data Stunting
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
                                <h4 class="header-title"> {{ $caption ?? 'Tambah Data Stunting' }} </h4>


                                @if (Request::segment(4) == 'ubah')
                                    <form action="{{ route('admin.stunting.update', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                    @else
                                        <form action="{{ route('admin.stunting.store') }}" method="post"
                                            enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <div class="row">

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

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="jumlah_balita"> Jumlah Balita <span
                                                                class="text-danger"> </span> </label>
                                                        <input type="text" id="jumlah_balita"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('jumlah_balita') ?? ($data->jumlah_balita ?? '') }}"
                                                            name="jumlah_balita" placeholder="" class="form-control">
                                                        @if ($errors->has('jumlah_balita'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('jumlah_balita') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="pendek"> Pendek <span
                                                                class="text-danger"> </span> </label>
                                                        <input type="text" id="pendek"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('pendek') ?? ($data->pendek ?? '') }}"
                                                            name="pendek" placeholder="" class="form-control">
                                                        @if ($errors->has('pendek'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('pendek') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                  <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="sangat_pendek"> Sangat Pendek <span
                                                                class="text-danger"> </span> </label>
                                                        <input type="text" id="sangat_pendek"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('pendek') ?? ($data->sangat_pendek ?? '') }}"
                                                            name="sangat_pendek" placeholder="" class="form-control">
                                                        @if ($errors->has('sangat_pendek'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('sangat_pendek') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>





                                            @if (Request::segment(3) == 'detail')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.stunting') }}">Kembali</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.stunting.ubah', $data->id) }}">Ubah <i
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
