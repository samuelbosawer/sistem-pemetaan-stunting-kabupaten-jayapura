@extends('admin.layout.tamplate')
@section('title')
    Dashboard - Admin
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                {{-- @include('admin.layout.breadcump') --}}
                <div class="row mt-3">
                   <div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Welcome {{Auth::user()->name.' | '.Auth::user()->email}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-success  rounded">
                                        <i data-feather="grid" class=" avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h4 class="text-dark mb-1">Distrik</h4>
                                        <h3 class="text-dark my-1"> <span data-plugin="counterup">
                                         {{$distrik}}   </span></h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-success  rounded">
                                        <i data-feather="box" class=" avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h4 class="text-dark mb-1">Kelurahan</h4>
                                        <h3 class="text-dark my-1"> <span data-plugin="counterup">
                                            {{$kelurahan}}   </span></h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-success  rounded">
                                        <i data-feather="home" class=" avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h4 class="text-dark mb-1">Puskesmas</h4>
                                        <h3 class="text-dark my-1"> <span data-plugin="counterup">
                                            {{$puskesmas}}  </span></h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                    </div> <!-- end col -->


                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-success  rounded">
                                        <i data-feather="slack" class=" avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h4 class="text-dark mb-1">Stunting</h4>
                                        <h3 class="text-dark my-1"> <span data-plugin="counterup">
                                            </span></h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-success  rounded">
                                        <i data-feather="users" class=" avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h4 class="text-dark mb-1">Pengguna</h4>
                                        <h3 class="text-dark my-1"> <span data-plugin="counterup">
                                            {{$pengguna}}  </span></h3>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                    </div> <!-- end col -->


                </div>






                <div class="row" style="height: 600px">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="text-center">
                                <h4>Peta Pemetaan Stunting Di Kabupaten Jayapura</h4>
                            </div>
                            <div id='map' class="map p-3" style="height: 500px; width: 100%; z-index: 1"></div>
                        </div>
                    </div>
                </div>


            </div> <!-- container -->

        </div> <!-- content -->


        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script type="text/javascript">

            const map = L.map('map');

            map.createPane('labels');

            map.getPane('labels').style.zIndex = 650;

            map.getPane('labels').style.pointerEvents = 'none';

            const cartodbAttribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';

            const positron =   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: cartodbAttribution
            }).addTo(map);

            const positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
                attribution: cartodbAttribution,
                pane: 'labels'
            }).addTo(map);

            @foreach ($pus as $p)
    var marker = L.marker([{{$p->distrik->latitude}}, {{$p->distrik->longitude}}],
    {alt: 'STUNTING'}).addTo(map).bindPopup(`DISTRIK {{$p->distrik->nama_distrik}} <br>
    PUSKESMAS {{$p->nama_puskesmas}} <br>

    <p class=""> Jumlah Balita  :
        <span class="font-weight-bold">
            @php
                // Hitung total jumlah balita dari seluruh data stunting di distrik ini
                $jumlahBalita = $p->distrik->stunting->sum('jumlah_balita');
            @endphp
            {{$jumlahBalita}}
        </span>
    </p>

    <p>Balita Pendek  :
        <span class="font-weight-bold">
            {{$p->distrik->stunting->sum('pendek')}}
        </span>
    </p>

      <p>Balita Sangat Pendek  :
        <span class="font-weight-bold">
            {{$p->distrik->stunting->sum('sangat_pendek')}}
        </span>
    </p>
    `);
@endforeach



            // Adjusted the map view to focus on Papua, Indonesia
            map.setView({lat:  -2.5677583, lng: 140.435791}, 9); // Papua, Indonesia coordinates

            </script>
    @endsection
