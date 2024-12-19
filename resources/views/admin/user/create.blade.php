@extends('admin.layout.tamplate')
@section('title')
    Data Pengguna
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
                                <h4 class="header-title"> {{ $caption ?? 'Tambah Data Pengguna' }} </h4>


                                @if (Request::segment(4) == 'ubah')
                                    <form action="{{ route('admin.user', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                    @else
                                        <form action="{{ route('admin.user.store') }}" method="post"
                                            enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="name"> Nama Pengguna <span
                                                                class="text-danger"> * </span> </label>
                                                        <input type="text" id="name"
                                                            @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif
                                                            value="{{ old('name') ?? ($data->name ?? '') }}"
                                                            name="name" placeholder="" class="form-control">
                                                        @if ($errors->has('name'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('name') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="email"> Email<span
                                                                class="text-danger"> * </span> </label>
                                                        <input type="email" id="email"
                                                            @if (Request::segment(3) == 'detail' ||
                                                            Request::segment(4) == 'ubah') {{ 'disabled' }} @endif
                                                            value="{{ old('email') ?? ($data->email ?? '') }}"
                                                            name="email" placeholder="" class="form-control">
                                                        @if ($errors->has('email'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('email') }}
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="password" class="form-label"> Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password" id="password"  placeholder="" class="form-control"  @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                        @if ($errors->has('password'))
                                                            <span class="text-danger" role="alert">
                                                                <small class="pt-1 d-block"><i class="fe-alert-triangle mr-1"></i> {{ $errors->first('password') }}</small>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <!-- input group end -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="password_confirmation" class="form-label">Confirmation Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation"  placeholder="" class="form-control"  @if (Request::segment(3) == 'detail') {{ 'disabled' }} @endif>
                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="text-danger" role="alert">
                                                                <small class="pt-1 d-block"><i class="fe-alert-triangle mr-1"></i> {{ $errors->first('password_confirmation') }}</small>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <!-- input group end -->
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="role"> Role <span class="text-danger">*</span>
                                                        </label>
                                                        <select name="role" id="" class="form-control"
                                                            @if (Request::segment(3) == 'detail') disabled @endif>
                                                            <option value="" hidden> Pilih Role </option>
                                                            @foreach ($roles as $r)

                                                                @if ($r->id == old('role'))
                                                                    <option selected value="{{ $r->name }}">
                                                                        {{ $r->name }}  </option>

                                                                @elseif (isset($data) && $r->name == $data->roles->pluck('name'))
                                                                    <option selected value="{{ $r->name }}">
                                                                        {{ $r->name }}</option>
                                                                @else
                                                                    <option value="{{ $r->name }}">
                                                                        {{ $r->name }}</option>
                                                                @endif
                                                            @endforeach


                                                        </select>
                                                        @if ($errors->has('Role'))
                                                            <label class="text-danger">
                                                                {{ $errors->first('Role') }} </label>
                                                        @endif
                                                    </div>
                                                </div>




                                            </div>





                                            @if (Request::segment(3) == 'detail')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.user') }}">Kembali</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.user.ubah', $data->id) }}">Ubah <i
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
