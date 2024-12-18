@extends('admin.layout.tamplate')
@section('title')
  Data Kelurahan
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
                                <h4 class="header-title"> Data Kelurahan</h4>
                                <div class="row mt-3 d-flex justify-content-between">
                                    <div class="col-8">
                                        @include('admin.layout.search')
                                    </div>

                                    <div class="">
                                            <a class="btn btn-dark" href="{{route('admin.kelurahan.tambah')}}"> Tambah Data <i data-feather="plus"></i></a>
                                        <!-- <a class="btn btn-success" href="">Cetak Excel <i data-feather="printer"></i></a> -->
                                    </div>
                                </div>

                                <div class="mt-3 table-responsive">
                                    <table class="table table-bordered">
                                        <tr class="bg-success text-white">
                                            <th width="1%">No</th>
                                            <th>Kelurahan</th>
                                            <th>Distrik</th>
                                            <th>Latitude</th>
                                            <th>longitude</th>
                                            <th>Aksi</th>
                                        </tr>
                                            @forelse ($datas as $data )
                                            <tr>
                                                <td>{{ ++$i}}</td>
                                                <td>
                                                    {{$data->nama_kelurahan}}
                                                </td>
                                                <td>
                                                    {{$data->distrik->nama_distrik}}
                                                </td>
                                                <td>
                                                    {{$data->latitude}}
                                                </td>
                                                <td>
                                                    {{$data->longitude}}
                                                </td>
                                                <td>

                                                    <a href="{{route('admin.kelurahan.detail',$data->id)}}"
                                                        class="btn btn-sm btn-outline-warning border-0  waves-effect waves-light fs-4">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{route('admin.kelurahan.ubah',$data->id)}}"
                                                        class="btn btn-sm btn-outline-primary border-0 waves-effect waves-light fs-4">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form class="d-inline" action="{{route('admin.kelurahan.hapus',$data->id)}}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger border-0 waves-effect waves-light fs-4"
                                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                            type="submit">

                                                            <i class="fas fa-trash"></i>

                                                        </button>
                                                    </form>
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
