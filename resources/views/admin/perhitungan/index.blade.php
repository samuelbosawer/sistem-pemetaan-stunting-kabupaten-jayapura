@extends('admin.layout.tamplate')
@section('title')
    Clustering
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
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"> Clustering</h4>
                                <div class="row mt-1 d-flex justify-content-between">
                                    <div class="col-8">
                                        {{-- @include('admin.layout.search') --}}
                                    </div>
                                </div>

                                <form action="" method="get">
                                    <button type="submit" class="btn btn-success mt-2 mb-2">Perhitungan Iterasi Pertama
                                    </button>

                                    <div class="mt-1table-responsive">
                                        <table class="table table-bordered">
                                            <tr class="bg-success text-white">
                                                <th width="1%">No</th>
                                                <th>Distrik</th>
                                                <th>JB</th>
                                                <th>SP</th>
                                                <th>P</th>
                                                <th>Pilih Centroid </th>
                                            </tr>
                                            @forelse ($stunting as $data)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        {{ $data->distrik->nama_distrik ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $data->jumlah_balita }}
                                                    </td>
                                                    <td>
                                                        {{ $data->sangat_pendek }}
                                                    </td>

                                                    <td>
                                                        {{ $data->pendek }}
                                                    </td>

                                                    <td>
                                                        <input class="form-control" value="{{ $data->id }}"
                                                            type="checkbox" name="centroid[]" id="">
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
                                </form>


                            </div>
                        </div>



                    </div> <!-- end card-body-->
                    @if ($c1 != null)
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title"> Centroid Perhitungan Iterasi Pertama</h4>
                                    <div class="row mt-1 d-flex justify-content-between">
                                        <div class="col-8">
                                            {{-- @include('admin.layout.search') --}}
                                        </div>
                                    </div>

                                    <form action="" method="get">
                                        {{-- <button type="submit" class="btn btn-success mt-2 mb-2"> Centroid Perhitungan Iterasi Pertama </button> --}}

                                        <div class="mt-1table-responsive">
                                            <table class="table table-bordered">
                                                <tr class="bg-success text-white">
                                                    <th>Centroid</th>
                                                    <th>JB</th>
                                                    <th>SP</th>
                                                    <th>P</th>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        C1
                                                    </td>
                                                    <td>
                                                        {{ $c1[0][0]->jumlah_balita }}

                                                    </td>
                                                    <td>
                                                        {{ $c1[0][0]->sangat_pendek }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[0][0]->pendek }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        C2
                                                    </td>
                                                    <td>
                                                        {{ $c1[1][0]->jumlah_balita }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[1][0]->sangat_pendek }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[1][0]->pendek }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        C3
                                                    </td>
                                                    <td>
                                                        {{ $c1[2][0]->jumlah_balita }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[2][0]->sangat_pendek }}
                                                    </td>
                                                    <td>
                                                        {{ $c1[2][0]->pendek }}
                                                    </td>
                                                </tr>



                                            </table>
                                        </div>
                                        <!-- end .mt-4 -->
                                    </form>


                                </div>
                            </div>



                        </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->




            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Pertama</h4>
                        <div class="row mt-1 d-flex justify-content-between">
                            <div class="col-8">
                                {{-- @include('admin.layout.search') --}}
                            </div>
                        </div>

                        <form action="" method="get">
                            {{-- <button type="submit" class="btn btn-success mt-2 mb-2">Perhitungan Iterasi Pertama --}}
                            </button>

                            <div class="mt-1table-responsive">
                                <table class="table table-bordered">
                                    <tr class="bg-success text-white">
                                        <th width="1%">No</th>
                                        <th>Distrik</th>
                                        <th>JB</th>
                                        <th>SP</th>
                                        <th>P</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <td>Jarak Terdekat</td>
                                        <td>Cluster</td>

                                    </tr>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($stunting as $data)

                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $data->distrik->nama_distrik ?? '' }}
                                            </td>
                                            <td>
                                                {{ $data->jumlah_balita }}
                                            </td>
                                            <td>
                                                {{ $data->sangat_pendek }}
                                            </td>

                                            <td>
                                                {{ $data->pendek }}
                                            </td>


                                            <td>

                                                <?php
                                                if (is_array($c1)) {
                                                    $c1_jb = isset($c1[0][0]->jumlah_balita) ? intval($c1[0][0]->jumlah_balita) : 0;
                                                    $c1_sp = isset($c1[0][0]->sangat_pendek) ? intval($c1[0][0]->sangat_pendek) : 0;
                                                    $c1_p = isset($c1[0][0]->pendek) ? intval($c1[0][0]->pendek) : 0;
                                                } else {

                                                    $c1_jb = 0;
                                                    $c1_sp = 0;
                                                    $c1_p = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? intval($data->jumlah_balita) : 0;
                                                $data_sp = isset($data->sangat_pendek) ? intval($data->sangat_pendek) : 0;
                                                $data_p = isset($data->pendek) ? intval($data->pendek) : 0;

                                                $c1_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2)+ pow($data_p - $c1_p, 2)),8);



                                                $c1_array[] = $c1_result;
                                                echo ($c1_result);

                                                ?>



                                            </td>


                                            <td>
                                                <?php
                                                if (is_array($c1)) {
                                                    $c1_jb = isset($c1[1][0]->jumlah_balita) ? intval($c1[1][0]->jumlah_balita) : 0;
                                                    $c1_sp = isset($c1[1][0]->sangat_pendek) ? intval($c1[1][0]->sangat_pendek) : 0;
                                                    $c1_p = isset($c1[1][0]->pendek) ? intval($c1[1][0]->pendek) : 0;
                                                } else {

                                                    $c1_jb = 0;
                                                    $c1_sp = 0;
                                                    $c1_p = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? intval($data->jumlah_balita) : 0;
                                                $data_sp = isset($data->sangat_pendek) ? intval($data->sangat_pendek) : 0;
                                                $data_p = isset($data->pendek) ? intval($data->pendek) : 0;

                                                $c2_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2)+ pow($data_p - $c1_p, 2)),8);


                                                $c2_array[] = $c2_result;

                                                echo ($c2_result);

                                                ?>


                                            </td>

                                            <td>
                                                <?php
                                                if (is_array($c1)) {
                                                    $c1_jb = isset($c1[2][0]->jumlah_balita) ? intval($c1[2][0]->jumlah_balita) : 0;
                                                    $c1_sp = isset($c1[2][0]->sangat_pendek) ? intval($c1[2][0]->sangat_pendek) : 0;
                                                    $c1_p = isset($c1[2][0]->pendek) ? intval($c1[2][0]->pendek) : 0;
                                                } else {

                                                    $c1_jb = 0;
                                                    $c1_sp = 0;
                                                    $c1_p = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? intval($data->jumlah_balita) : 0;
                                                $data_sp = isset($data->sangat_pendek) ? intval($data->sangat_pendek) : 0;
                                                $data_p = isset($data->pendek) ? intval($data->pendek) : 0;


                                                $c3_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2)+ pow($data_p - $c1_p, 2)),8);


                                                $c3_array[] = $c3_result;


                                                echo ($c3_result);

                                                ?>




                                            </td>

                                            <td>
                                                {{ (min([$c1_result, $c2_result, $c3_result])) }}
                                            </td>

                                            <td>
                                                @if($c1_result<$c2_result AND $c1_result < $c3_result)
                                                    1
                                                @endif

                                                @if($c2_result<$c1_result AND $c2_result < $c3_result)
                                                    2
                                                @endif

                                                @if($c3_result<$c1_result AND $c3_result < $c2_result)
                                                    3
                                                @endif

                                            </td>
                                            @endforeach

                                        </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->
            @endif

        </div> <!-- end card-->
    </div> <!-- end col -->




    </div>
    {{-- end row --}}





    </div> <!-- container -->

    </div> <!-- content -->
@endsection
