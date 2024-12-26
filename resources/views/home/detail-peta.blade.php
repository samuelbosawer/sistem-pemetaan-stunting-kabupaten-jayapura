<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>PETA KELURAHAN - SIPENTING</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/assets-visitor/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

    <!-- font awesome style -->
    <link href="/assets-visitor/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/assets-visitor/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/assets-visitor/css/responsive.css" rel="stylesheet" />

        <!-- Data table -->

</head>

<body>

    <div class=" ">
        <!-- header section strats -->
        <header class="header_section   p-1">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span>
                       <img src="{{asset('assets/images/dinkes.png')}}" class="img-fluid" alt="" srcset=""> SIPENTING
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('home')}}#beranda">Beranda </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}#tentang"> Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}#stunting">Stunting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}#peta">Peta Pemetaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}#kontak">Kontak</a>
                            </li>


                        </ul>
                    </div>
                    <div class="quote_btn-container">

                        @if (Auth::user() && Auth::user()->hasRole('admindinas|adminpuskesmas|kepaladinas'))
                            <a class="btn btn-success text-white fw-bold" href="{{ route('admin.dashboard') }}">
                                <span>
                                    Dasbor
                                </span>
                                <i class="fa fa-desktop" aria-hidden="true"></i>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success text-white">
                                {{-- <i class="fa fa-times" aria-hidden="true"></i> --}}
                                <i class="fa fa-external-link " aria-hidden="true"></i>
                                <span>
                                    Masuk
                                </span>

                            </a>
                        @endif

                        {{-- <form class="form-inline">
              <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form> --}}
                    </div>
                </div>
            </nav>
        </header>
    </div>

    <section class=" furniture_section layout_padding " id="peta">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Peta Distrik {{$distrik->nama_distrik}}
                            </h2>

                            <p>
                                Peta ini memberikan visualisasi data stunting di Kabupaten Jayapura, mencakup lokasi
                                distrik dan Puskesmas serta informasi jumlah balita, balita pendek, dan balita sangat
                                pendek.
                            </p>
                        </div>
                        <div class="container">
                            <div class="row" style="height: 600px">
                                <div class="col-12">

                                    <div id='mapStunting' class="mapStuting p-3"
                                        style="height: 500px; width: 100%; z-index: 1"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->







    <!-- footer section -->
    <footer class="footer_section bg-success ">
        <div class="container">
            <p class="text-white p-5">
                &copy; <span id="displayYear"> </span> Copyrigt Sistem Pemetaan Stunting Di Kabupaten Jayapura
            </p>
        </div>
    </footer>
    <!-- footer section -->



    <!-- jQery -->
    <script src="/assets-visitor/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="/assets-visitor/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="/assets-visitor/js/custom.js"></script>

    <!-- End Google Map -->





    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script type="text/javascript">
        // Inisialisasi peta
        const map = L.map('mapStunting');

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


</body>

</html>
