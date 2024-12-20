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
                                <h4 class="header-title"> Data Puskesmas</h4>
                                <div class="row mt-3 d-flex justify-content-between">
                                    <div class="col-8">
                                        @include('admin.layout.search')
                                    </div>

                                    <div class="">

                                        @if (Auth::user()->hasRole('admindinas'))
                                            <a class="btn btn-dark" href="{{ route('admin.puskesmas.tambah') }}"> Tambah
                                                Data <i data-feather="plus"></i></a>
                                            <button type="button" class="btn btn-success"data-toggle="modal"
                                                data-target="#exampleModal">Upload file CSV
                                                <i data-feather="upload"></i></button>


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload File CSV
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.puskesmas.csv') }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="modal-body">
                                                                    <label for="csv"> File CSV <span
                                                                            class="text-danger">*</span> </label>
                                                                    <input type="file" id="csv"
                                                                        value="{{ old('csv') }}" name="csv"
                                                                        placeholder="" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Keluar</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Upload</button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>


                        <div class="mt-3 table-responsive">
                            <table class="table table-bordered">
                                <tr class="bg-success text-white">
                                    <th width="1%">No</th>
                                    <th>Puskesmas</th>
                                    <th>Distrik</th>
                                    <th>Aksi</th>
                                </tr>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            {{ $data->nama_puskesmas }}
                                        </td>
                                        <td>
                                            {{ $data->distrik->nama_distrik }}
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.puskesmas.detail', $data->id) }}"
                                                class="btn btn-sm btn-outline-warning border-0  waves-effect waves-light fs-4">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            @if (Auth::user()->hasRole('admindinas'))
                                                <a href="{{ route('admin.puskesmas.ubah', $data->id) }}"
                                                    class="btn btn-sm btn-outline-primary border-0 waves-effect waves-light fs-4">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form class="d-inline"
                                                    action="{{ route('admin.puskesmas.hapus', $data->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="btn btn-sm btn-outline-danger border-0 waves-effect waves-light fs-4"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                        type="submit">

                                                        <i class="fas fa-trash"></i>

                                                    </button>
                                                </form>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            No data . . .
                                        </td>
                                    </tr>
                                @endforelse


                            </table>
                        </div>
                        <!-- end .mt-4 -->
                        {!! $datas->links() !!}


                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        {{-- end row --}}





    </div> <!-- container -->

    </div> <!-- content -->
@endsection
