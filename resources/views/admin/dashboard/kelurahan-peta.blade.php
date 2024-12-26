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
                @include('admin.layout.breadcump')



                <div class="row" style="height: 600px">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="text-center">
                                <h4 class="text-uppercase">Peta Pemetaan Stunting Di Kabupaten Jayapura</h4>
                                <h4 class="text-uppercase">Distrik {{$distrik->nama_distrik}}</h4>
                            </div>
                            <div id='map' class="map p-3" style="height: 500px; width: 100%; z-index: 1"></div>
                        </div>
                    </div>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->


        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script type="text/javascript">
            // Inisialisasi peta
            const map = L.map('map');

            // Menambahkan pane khusus untuk label
            map.createPane('labels');
            map.getPane('labels').style.zIndex = 650;
            map.getPane('labels').style.pointerEvents = 'none';

            const cartodbAttribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';

            // Menambahkan layer peta utama
            const positron = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: cartodbAttribution
            }).addTo(map);

            // Menambahkan layer label peta
            const positronLabels = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
                attribution: cartodbAttribution,
                pane: 'labels'
            }).addTo(map);

            // Menambahkan marker berdasarkan data kelurahan
            @foreach ($kelurahan as $p)
                var marker = L.marker([{{$p->latitude}}, {{$p->longitude}}], {alt: 'STUNTING'})
                    .addTo(map)
                    .bindPopup(`
                        <strong>KELURAHAN {{$p->nama_kelurahan}}</strong> <br>
                        <p>Keterangan:<br>
                            <span class="font-weight-bold">{{$p->keterangan}}</span>
                        </p>
                    `);
            @endforeach

            // Atur tampilan awal peta (fokus pada distrik)
            map.setView([{{$distrik->latitude}}, {{$distrik->longitude}}], 10); // Zoom level 9 sesuai dengan skala daerah
        </script>

    @endsection
