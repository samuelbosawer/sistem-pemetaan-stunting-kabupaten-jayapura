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
                                    <button type="submit" class="btn btn-success mt-2 mb-2">   <i data-feather="percent"></i>   Mulai Perhitungan
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
                                        // c1
                                        $sum_c1_2_jb = 0; // Penampung total
                                        $sum_c1_2_jb_count = 0; // Penampung total
                                        $sum_c1_2_sp = 0; // Penampung total
                                        $sum_c1_2_p = 0; // Penampung total

                                        // c2
                                        $sum_c2_2_jb = 0; // Penampung total
                                        $sum_c2_2_jb_count = 0; // Penampung total
                                        $sum_c2_2_sp = 0; // Penampung total
                                        $sum_c2_2_p = 0; // Penampung total

                                        // c3
                                        $sum_c3_2_jb = 0; // Penampung total
                                        $sum_c3_2_jb_count = 0; // Penampung total
                                        $sum_c3_2_sp = 0; // Penampung total
                                        $sum_c3_2_p = 0; // Penampung total

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

                                                $c1_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2) + pow($data_p - $c1_p, 2)), 8);

                                                $c1_array[] = $c1_result;
                                                echo $c1_result;

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

                                                $c2_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2) + pow($data_p - $c1_p, 2)), 8);

                                                $c2_array[] = $c2_result;

                                                echo $c2_result;

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

                                                $c3_result = round(sqrt(pow($data_jb - $c1_jb, 2) + pow($data_sp - $c1_sp, 2) + pow($data_p - $c1_p, 2)), 8);

                                                $c3_array[] = $c3_result;

                                                echo $c3_result;

                                                ?>

                                            </td>

                                            <td>
                                                {{ min([$c1_result, $c2_result, $c3_result]) }}
                                            </td>

                                            <td>
                                                @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                    1

                                                    <?php
                                                    $sum_c1_2_jb = $sum_c1_2_jb + $data_jb;
                                                    ++$sum_c1_2_jb_count;

                                                    $sum_c1_2_sp = $sum_c1_2_sp + $data_sp;
                                                    $sum_c1_2_p = $sum_c1_2_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                    2

                                                    <?php
                                                    $sum_c2_2_jb = $sum_c2_2_jb + $data_jb;
                                                    ++$sum_c2_2_jb_count;

                                                    $sum_c2_2_sp = $sum_c2_2_sp + $data_sp;
                                                    $sum_c2_2_p = $sum_c2_2_p + $data_p;
                                                    ?>
                                                @endif

                                                @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                    3
                                                    <?php
                                                    $sum_c3_2_jb = $sum_c3_2_jb + $data_jb;
                                                    ++$sum_c3_2_jb_count;

                                                    $sum_c3_2_sp = $sum_c3_2_sp + $data_sp;
                                                    $sum_c3_2_p = $sum_c3_2_p + $data_p;
                                                    ?>
                                                @endif

                                            </td>

                                            {{-- Buat Array Data Baru --}}
                                    @endforeach

                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Centroid Perhitungan Iterasi Ketua</h4>
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
                                            {{ $c1_jb = round($sum_c1_2_jb / $sum_c1_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_sp = round($sum_c1_2_sp / $sum_c1_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_p = round($sum_c1_2_p / $sum_c1_2_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            {{ $c2_jb = round($sum_c2_2_jb / $sum_c2_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_sp = round($sum_c2_2_sp / $sum_c2_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_p = round($sum_c2_2_p / $sum_c2_2_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            {{ $c3_jb = round($sum_c3_2_jb / $sum_c3_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_sp = round($sum_c3_2_sp / $sum_c3_2_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_p = round($sum_c3_2_p / $sum_c3_2_jb_count, 3) }}
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->

            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Kedua</h4>
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
                                        // c1
                                        $sum_c1_3_jb = 0; // Penampung total
                                        $sum_c1_3_jb_count = 0; // Penampung total
                                        $sum_c1_3_sp = 0; // Penampung total
                                        $sum_c1_3_p = 0; // Penampung total

                                        // c2
                                        $sum_c2_3_jb = 0; // Penampung total
                                        $sum_c2_3_jb_count = 0; // Penampung total
                                        $sum_c2_3_sp = 0; // Penampung total
                                        $sum_c2_3_p = 0; // Penampung total

                                        // c3
                                        $sum_c3_3_jb = 0; // Penampung total
                                        $sum_c3_3_jb_count = 0; // Penampung total
                                        $sum_c3_3_sp = 0; // Penampung total
                                        $sum_c3_3_p = 0; // Penampung total

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
                                                if ($c1_jb) {
                                                    $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                                    $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                                    $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                                } else {
                                                    $c1_jb_2 = 0;
                                                    $c1_sp_2 = 0;
                                                    $c1_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                                $c1_array[] = $c1_result;
                                                echo $c1_result;

                                                ?>


                                            </td>


                                            <td>

                                                <?php
                                                if ($c2_jb) {
                                                    $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                                    $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                                    $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                                } else {
                                                    $c2_jb_2 = 0;
                                                    $c2_sp_2 = 0;
                                                    $c2_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                                $c2_array[] = $c2_result;
                                                echo $c2_result;

                                                ?>


                                            </td>

                                            <td>
                                                <?php
                                                if ($c3_jb) {
                                                    $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                                    $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                                    $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                                } else {
                                                    $c3_jb_2 = 0;
                                                    $c3_sp_2 = 0;
                                                    $c3_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                                $c3_array[] = $c3_result;
                                                echo $c3_result;

                                                ?>
                                            </td>


                                            <td>
                                                    {{ min([$c1_result, $c2_result, $c3_result]) }}

                                            </td>




                                                <td>
                                                    @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                        1

                                                        <?php
                                                        $sum_c1_3_jb = $sum_c1_3_jb + $data_jb;
                                                        ++$sum_c1_3_jb_count;

                                                        $sum_c1_3_sp = $sum_c1_3_sp + $data_sp;
                                                        $sum_c1_3_p = $sum_c1_3_p + $data_p;
                                                        ?>
                                                    @endif

                                                    @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                        2

                                                        <?php
                                                        $sum_c2_3_jb = $sum_c2_3_jb + $data_jb;
                                                        ++$sum_c2_3_jb_count;

                                                        $sum_c2_3_sp = $sum_c2_3_sp + $data_sp;
                                                        $sum_c2_3_p = $sum_c2_3_p + $data_p;
                                                        ?>
                                                    @endif

                                                    @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                        3
                                                        <?php
                                                        $sum_c3_3_jb = $sum_c3_3_jb + $data_jb;
                                                        ++$sum_c3_3_jb_count;

                                                        $sum_c3_3_sp = $sum_c3_3_sp + $data_sp;
                                                        $sum_c3_3_p = $sum_c3_3_p + $data_p;
                                                        ?>
                                                    @endif

                                                </td>

                                                {{-- Buat Array Data Baru --}}
                                        @endforeach






                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Centroid Perhitungan Iterasi Ketiga</h4>
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
                                            {{ $c1_jb = round($sum_c1_3_jb / $sum_c1_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_sp = round($sum_c1_3_sp / $sum_c1_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_p = round($sum_c1_3_p / $sum_c1_3_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            {{ $c2_jb = round($sum_c2_3_jb / $sum_c2_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_sp = round($sum_c2_3_sp / $sum_c2_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_p = round($sum_c2_3_p / $sum_c2_3_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            {{ $c3_jb = round($sum_c3_3_jb / $sum_c3_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_sp = round($sum_c3_3_sp / $sum_c3_3_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_p = round($sum_c3_3_p / $sum_c3_3_jb_count, 3) }}
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Ketiga</h4>
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
                                        // c1
                                        $sum_c1_4_jb = 0; // Penampung total
                                        $sum_c1_4_jb_count = 0; // Penampung total
                                        $sum_c1_4_sp = 0; // Penampung total
                                        $sum_c1_4_p = 0; // Penampung total

                                        // c2
                                        $sum_c2_4_jb = 0; // Penampung total
                                        $sum_c2_4_jb_count = 0; // Penampung total
                                        $sum_c2_4_sp = 0; // Penampung total
                                        $sum_c2_4_p = 0; // Penampung total

                                        // c3
                                        $sum_c3_4_jb = 0; // Penampung total
                                        $sum_c3_4_jb_count = 0; // Penampung total
                                        $sum_c3_4_sp = 0; // Penampung total
                                        $sum_c3_4_p = 0; // Penampung total

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
                                                if ($c1_jb) {
                                                    $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                                    $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                                    $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                                } else {
                                                    $c1_jb_2 = 0;
                                                    $c1_sp_2 = 0;
                                                    $c1_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                                $c1_array[] = $c1_result;
                                                echo $c1_result;

                                                ?>


                                            </td>


                                            <td>

                                                <?php
                                                if ($c2_jb) {
                                                    $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                                    $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                                    $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                                } else {
                                                    $c2_jb_2 = 0;
                                                    $c2_sp_2 = 0;
                                                    $c2_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                                $c2_array[] = $c2_result;
                                                echo $c2_result;

                                                ?>


                                            </td>

                                            <td>
                                                <?php
                                                if ($c3_jb) {
                                                    $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                                    $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                                    $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                                } else {
                                                    $c3_jb_2 = 0;
                                                    $c3_sp_2 = 0;
                                                    $c3_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                                $c3_array[] = $c3_result;
                                                echo $c3_result;

                                                ?>
                                            </td>


                                            <td>
                                                    {{ min([$c1_result, $c2_result, $c3_result]) }}

                                            </td>




                                                <td>
                                                    @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                        1

                                                        <?php
                                                        $sum_c1_4_jb = $sum_c1_4_jb + $data_jb;
                                                        ++$sum_c1_4_jb_count;

                                                        $sum_c1_4_sp = $sum_c1_4_sp + $data_sp;
                                                        $sum_c1_4_p = $sum_c1_4_p + $data_p;
                                                        ?>
                                                    @endif

                                                    @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                        2

                                                        <?php
                                                        $sum_c2_4_jb = $sum_c2_4_jb + $data_jb;
                                                        ++$sum_c2_4_jb_count;

                                                        $sum_c2_4_sp = $sum_c2_4_sp + $data_sp;
                                                        $sum_c2_4_p = $sum_c2_4_p + $data_p;
                                                        ?>
                                                    @endif

                                                    @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                        3
                                                        <?php
                                                        $sum_c3_4_jb = $sum_c3_4_jb + $data_jb;
                                                        ++$sum_c3_4_jb_count;

                                                        $sum_c3_4_sp = $sum_c3_4_sp + $data_sp;
                                                        $sum_c3_4_p = $sum_c3_4_p + $data_p;
                                                        ?>
                                                    @endif

                                                </td>

                                                {{-- Buat Array Data Baru --}}
                                        @endforeach






                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Centroid Perhitungan Iterasi Kempat</h4>
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
                                            {{ $c1_jb = round($sum_c1_4_jb / $sum_c1_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_sp = round($sum_c1_4_sp / $sum_c1_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_p = round($sum_c1_4_p / $sum_c1_4_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            {{ $c2_jb = round($sum_c2_4_jb / $sum_c2_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_sp = round($sum_c2_4_sp / $sum_c2_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_p = round($sum_c2_4_p / $sum_c2_4_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            {{ $c3_jb = round($sum_c3_4_jb / $sum_c3_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_sp = round($sum_c3_4_sp / $sum_c3_4_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_p = round($sum_c3_4_p / $sum_c3_4_jb_count, 3) }}
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Keempat</h4>
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
                                        // c1
                                        $sum_c1_5_jb = 0; // Penampung total
                                        $sum_c1_5_jb_count = 0; // Penampung total
                                        $sum_c1_5_sp = 0; // Penampung total
                                        $sum_c1_5_p = 0; // Penampung total

                                        // c2
                                        $sum_c2_5_jb = 0; // Penampung total
                                        $sum_c2_5_jb_count = 0; // Penampung total
                                        $sum_c2_5_sp = 0; // Penampung total
                                        $sum_c2_5_p = 0; // Penampung total

                                        // c3
                                        $sum_c3_5_jb = 0; // Penampung total
                                        $sum_c3_5_jb_count = 0; // Penampung total
                                        $sum_c3_5_sp = 0; // Penampung total
                                        $sum_c3_5_p = 0; // Penampung total

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
                                                if ($c1_jb) {
                                                    $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                                    $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                                    $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                                } else {
                                                    $c1_jb_2 = 0;
                                                    $c1_sp_2 = 0;
                                                    $c1_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                                $c1_array[] = $c1_result;
                                                echo $c1_result;

                                                ?>


                                            </td>


                                            <td>

                                                <?php
                                                if ($c2_jb) {
                                                    $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                                    $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                                    $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                                } else {
                                                    $c2_jb_2 = 0;
                                                    $c2_sp_2 = 0;
                                                    $c2_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                                $c2_array[] = $c2_result;
                                                echo $c2_result;

                                                ?>


                                            </td>

                                            <td>
                                                <?php
                                                if ($c3_jb) {
                                                    $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                                    $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                                    $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                                } else {
                                                    $c3_jb_2 = 0;
                                                    $c3_sp_2 = 0;
                                                    $c3_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                                $c3_array[] = $c3_result;
                                                echo $c3_result;

                                                ?>
                                            </td>


                                            <td>
                                                    {{ min([$c1_result, $c2_result, $c3_result]) }}

                                            </td>




                                                <td>
                                                    @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                        1

                                                        <?php
                                                        $sum_c1_5_jb = $sum_c1_5_jb + $data_jb;
                                                        ++$sum_c1_5_jb_count;

                                                        $sum_c1_5_sp = $sum_c1_5_sp + $data_sp;
                                                        $sum_c1_5_p = $sum_c1_5_p + $data_p;
                                                        ?>
                                                    @endif

                                                    @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                        2

                                                        <?php
                                                        $sum_c2_5_jb = $sum_c2_5_jb + $data_jb;
                                                        ++$sum_c2_5_jb_count;

                                                        $sum_c2_5_sp = $sum_c2_5_sp + $data_sp;
                                                        $sum_c2_5_p = $sum_c2_5_p + $data_p;
                                                        ?>
                                                    @endif

                                                    @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                        3
                                                        <?php
                                                        $sum_c3_5_jb = $sum_c3_5_jb + $data_jb;
                                                        ++$sum_c3_5_jb_count;

                                                        $sum_c3_5_sp = $sum_c3_5_sp + $data_sp;
                                                        $sum_c3_5_p = $sum_c3_5_p + $data_p;
                                                        ?>
                                                    @endif

                                                </td>

                                                {{-- Buat Array Data Baru --}}
                                        @endforeach






                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>

                    </div>
                </div>



            </div> <!-- end card-body-->


            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Centroid Perhitungan Iterasi Kelima</h4>
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
                                            {{ $c1_jb = round($sum_c1_5_jb / $sum_c1_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_sp = round($sum_c1_5_sp / $sum_c1_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c1_p = round($sum_c1_5_p / $sum_c1_5_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            {{ $c2_jb = round($sum_c2_5_jb / $sum_c2_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_sp = round($sum_c2_5_sp / $sum_c2_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c2_p = round($sum_c2_5_p / $sum_c2_5_jb_count, 3) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            {{ $c3_jb = round($sum_c3_5_jb / $sum_c3_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_sp = round($sum_c3_5_sp / $sum_c3_5_jb_count, 3) }}
                                        </td>
                                        <td>
                                            {{ $c3_p = round($sum_c3_5_p / $sum_c3_5_jb_count, 3) }}
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <!-- end .mt-4 -->
                        </form>


                    </div>
                </div>



            </div> <!-- end card-body-->



            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Iterasi Kelima</h4>
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
                                        // c1
                                        $sum_c1_6_jb = 0; // Penampung total
                                        $sum_c1_6_jb_count = 0; // Penampung total
                                        $sum_c1_6_sp = 0; // Penampung total
                                        $sum_c1_6_p = 0; // Penampung total

                                        // c2
                                        $sum_c2_6_jb = 0; // Penampung total
                                        $sum_c2_6_jb_count = 0; // Penampung total
                                        $sum_c2_6_sp = 0; // Penampung total
                                        $sum_c2_6_p = 0; // Penampung total

                                        // c3
                                        $sum_c3_6_jb = 0; // Penampung total
                                        $sum_c3_6_jb_count = 0; // Penampung total
                                        $sum_c3_6_sp = 0; // Penampung total
                                        $sum_c3_6_p = 0; // Penampung total

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
                                                if ($c1_jb) {
                                                    $c1_jb_2 = isset($c1_jb) ? $c1_jb : 0;
                                                    $c1_sp_2 = isset($c1_sp) ? $c1_sp : 0;
                                                    $c1_p_2 = isset($c1_p) ? $c1_p : 0;
                                                } else {
                                                    $c1_jb_2 = 0;
                                                    $c1_sp_2 = 0;
                                                    $c1_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c1_result = round(sqrt(pow($data_jb - $c1_jb_2, 2) + pow($data_sp - $c1_sp_2, 2) + pow($data_p - $c1_p_2, 2)), 8);

                                                $c1_array[] = $c1_result;
                                                echo $c1_result;

                                                ?>


                                            </td>


                                            <td>

                                                <?php
                                                if ($c2_jb) {
                                                    $c2_jb_2 = isset($c2_jb) ? $c2_jb : 0;
                                                    $c2_sp_2 = isset($c2_sp) ? $c2_sp : 0;
                                                    $c2_p_2 = isset($c2_p) ? $c2_p : 0;
                                                } else {
                                                    $c2_jb_2 = 0;
                                                    $c2_sp_2 = 0;
                                                    $c2_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c2_result = round(sqrt(pow($data_jb - $c2_jb_2, 2) + pow($data_sp - $c2_sp_2, 2) + pow($data_p - $c2_p_2, 2)), 8);

                                                $c2_array[] = $c2_result;
                                                echo $c2_result;

                                                ?>


                                            </td>

                                            <td>
                                                <?php
                                                if ($c3_jb) {
                                                    $c3_jb_2 = isset($c3_jb) ? $c3_jb : 0;
                                                    $c3_sp_2 = isset($c3_sp) ? $c3_sp : 0;
                                                    $c3_p_2 = isset($c3_p) ? $c3_p : 0;
                                                } else {
                                                    $c3_jb_2 = 0;
                                                    $c3_sp_2 = 0;
                                                    $c3_p_2 = 0;
                                                }

                                                $data_jb = isset($data->jumlah_balita) ? $data->jumlah_balita : 0;
                                                $data_sp = isset($data->sangat_pendek) ? $data->sangat_pendek : 0;
                                                $data_p = isset($data->pendek) ? $data->pendek : 0;

                                                $c3_result = round(sqrt(pow($data_jb - $c3_jb_2, 2) + pow($data_sp - $c3_sp_2, 2) + pow($data_p - $c3_p_2, 2)), 8);

                                                $c3_array[] = $c3_result;
                                                echo $c3_result;

                                                ?>
                                            </td>


                                            <td>
                                                    {{ min([$c1_result, $c2_result, $c3_result]) }}

                                            </td>




                                                <td>
                                                    @if ($c1_result < $c2_result and $c1_result < $c3_result)
                                                        1

                                                        <?php
                                                        $sum_c1_6_jb = $sum_c1_6_jb + $data_jb;
                                                        ++$sum_c1_6_jb_count;

                                                        $sum_c1_6_sp = $sum_c1_6_sp + $data_sp;
                                                        $sum_c1_6_p = $sum_c1_6_p + $data_p;
                                                        ?>
                                                    @endif

                                                    @if ($c2_result < $c1_result and $c2_result < $c3_result)
                                                        2

                                                        <?php
                                                        $sum_c2_6_jb = $sum_c2_6_jb + $data_jb;
                                                        ++$sum_c2_6_jb_count;

                                                        $sum_c2_6_sp = $sum_c2_6_sp + $data_sp;
                                                        $sum_c2_6_p = $sum_c2_6_p + $data_p;
                                                        ?>
                                                    @endif

                                                    @if ($c3_result < $c1_result and $c3_result < $c2_result)
                                                        3
                                                        <?php
                                                        $sum_c3_6_jb = $sum_c3_6_jb + $data_jb;
                                                        ++$sum_c3_6_jb_count;

                                                        $sum_c3_6_sp = $sum_c3_6_sp + $data_sp;
                                                        $sum_c3_6_p = $sum_c3_6_p + $data_p;
                                                        ?>
                                                    @endif

                                                </td>

                                                {{-- Buat Array Data Baru --}}
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
