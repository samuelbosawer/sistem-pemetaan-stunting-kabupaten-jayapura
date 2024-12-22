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

    <title>SIPENTING</title>


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

</head>

<body>

    <div class="hero_area ">
        <!-- header section strats -->
        <header class="header_section long_section  p-1">
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
                                <a class="nav-link" href="#beranda">Beranda </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tentang"> Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#stunting">Stunting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#peta">Peta Pemetaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#kontak">Kontak</a>
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
        <!-- end header section -->
        <!-- slider section -->
        {{-- <section class="slider_section long_section"> --}}
        <section class="slider_section " id="beranda">
            <div id="customCarousel" class="carousel slide" data-ride="carousel">





                <div class="carousel-inner">
                    <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="detail-box">
                                        <h1>
                                            SIPENTING <br>
                                            {{-- Furniture Needs --}}
                                        </h1>
                                        <p>
                                            Sistem Pemetaan Stunting di Kabupaten Jayapura adalah platform yang
                                            memetakan dan menganalisis data stunting berbasis web untuk mendukung
                                            pengambilan keputusan dan penanganan tepat sasaran.
                                        </p>
                                        <div class="btn-box">
                                            <a href="#kontak" class="btn1">
                                                Kontak
                                            </a>
                                            <a href="#tentang" class="btn1">
                                                Tentang Kami
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="img-box">
                                        <img src="/assets-visitor/images/slider-img-1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="detail-box">
                                        <h1>
                                            SIPENTING <br>
                                            {{-- Furniture Needs --}}
                                        </h1>
                                        <p>
                                            Sistem Pemetaan Stunting di Kabupaten Jayapura adalah platform yang
                                            memetakan dan menganalisis data stunting berbasis web untuk mendukung
                                            pengambilan keputusan dan penanganan tepat sasaran.
                                        </p>
                                        <div class="btn-box">
                                            <a href="#kontak" class="btn1">
                                                Kontak
                                            </a>
                                            <a href="#tentang" class="btn1">
                                                Tentang Kami
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="img-box">
                                        <img src="/assets-visitor/images/slider-img-2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="carousel-item active ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="detail-box">
                                        <h1>
                                            SIPENTING <br>
                                            {{-- Furniture Needs --}}
                                        </h1>
                                        <p>
                                            Sistem Pemetaan Stunting di Kabupaten Jayapura adalah platform yang
                                            memetakan dan menganalisis data stunting berbasis web untuk mendukung
                                            pengambilan keputusan dan penanganan tepat sasaran.
                                        </p>
                                        <div class="btn-box">
                                            <a href="#kontak" class="btn1">
                                                Kontak
                                            </a>
                                            <a href="#tentang" class="btn1">
                                                Tentang Kami
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="img-box">
                                        <img src="/assets-visitor/images/slider-img-3.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>




                <ol class="carousel-indicators">
                    <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel" data-slide-to="1"></li>
                    <li data-target="#customCarousel" data-slide-to="2"></li>
                </ol>
            </div>
        </section>
        <!-- end slider section -->
    </div>


      <!-- furniture section -->

      <section class="furniture_section layout_padding" id="tentang">
        <div class="container">
            <div class="heading_container">
                <h2>
                   Tentang Kami
                </h2>

                   <div class="mx-auto">
                    <div class="bg-success rounded text-white text-center">
                        <h5 class="p-3">
                            "Kabupaten Jayapura Sehat, Generasi Hebat Bebas Stunting!"
                        </h5>
                </p>

                    </div>
                   </div>
            </div>
            <div class="row">
                <div class="col-md-6 m-2">
                    <div class="shadow p-1 ">

                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoKMOk6LMu9i0-WVYThox1rpojOBPHi9i03A&s" class="rounded" width="100%" alt="" srcset="">



                    </div>
                </div>

                <div class="col-md-5 m-2" style="text-align: justify">
                  <p>Dinas Kesehatan Kabupaten Jayapura bersama Puskesmas memiliki peran penting dalam upaya penanggulangan kasus stunting di wilayah ini. Melalui berbagai program intervensi, pelayanan kesehatan, dan edukasi, kami berkomitmen untuk mencegah dan menurunkan angka stunting secara signifikan. Dengan kolaborasi lintas sektor, kami memastikan setiap balita mendapatkan akses gizi yang cukup, pelayanan kesehatan berkualitas, dan pemantauan tumbuh kembang yang berkelanjutan. Upaya ini bertujuan untuk menciptakan generasi yang lebih sehat dan sejahtera di Kabupaten Jayapura.</p>



                </div>


            </div>
            <p>Dinas Kesehatan Kabupaten Jayapura dan Puskesmas berperan penting dalam upaya pencegahan dan penanganan stunting melalui layanan kesehatan, edukasi, serta pemantauan tumbuh kembang balita. Bersama para pemangku kepentingan, kami mendorong kolaborasi lintas sektor untuk memastikan akses gizi dan kesehatan yang merata. Komitmen kami adalah menciptakan generasi sehat, cerdas, dan bebas stunting di Kabupaten Jayapura.</p>


        </div>
    </section>

    <!-- end furniture section -->


    <!-- furniture section -->

    <section class="contact_section layout_padding" id="stunting">
        <div class="container">
            <div class="heading_container">
                <h2>

                    Stunting di Kabupaten Jayapura
                </h2>
                <p>
                    Masalah stunting masih menjadi tantangan di Kabupaten Jayapura, dipengaruhi oleh gizi buruk,
                    sanitasi, dan akses kesehatan. Upaya kolaboratif terus dilakukan untuk mengatasi dampaknya demi
                    generasi yang sehat dan produktif.
                </p>
            </div>
            <div class="row">


                <div class="col-md-12 col-lg-12">
                    <div class="">


                        <div class="row">
                            <div class="col-12 ">
                                <div class="">
                                    <div class="">
                                        <div class="row mt-3 d-flex justify-content-between">
                                            <div class="col-8">
                                                @include('admin.layout.search')
                                            </div>



                                        </div>
                                    </div>

                                    <div class="mt-3 table-responsive">
                                        <table class="table table-bordered">
                                            <tr class="bg-success text-white">
                                                <th width="1%">No</th>
                                                <th class="text-center">Tanggal Update</th>
                                                <th class="text-center">Distrik</th>
                                                <th class="text-center">Jumlah Balita</th>
                                                <th class="text-center">Pendek</th>
                                                <th class="text-center">Sangat Pendek</th>
                                                <th class="text-center">Total Stunting</th>
                                            </tr>
                                            @forelse ($datas as $data)
                                                <tr>
                                                    <td class="text-center">{{ ++$i }}</td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($data->updated_at)->locale('id')->translatedFormat('d F Y, H:i') }}
                                                    </td>
                                                    <td>
                                                        {{ $data->distrik->nama_distrik ?? '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->jumlah_balita }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->pendek }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->sangat_pendek }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->pendek += $data->sangat_pendek }}
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
                </div>
            </div>


        </div>
    </section>

    <!-- end furniture section -->


    <!-- about section -->

    <section class=" furniture_section layout_padding " id="peta">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Peta Pemetaan Stunting Kabupaten Jayapura
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

    <!-- furniture section -->

    <section class="contact_section layout_padding" id="kontak">
        <div class="container">
            <div class="heading_container">
                <h2>

                    Kontak
                </h2>
                <p>
                    Kami siap membantu dan menjawab kebutuhan Anda terkait informasi dan layanan. Jangan ragu untuk
                    menghubungi kami melalui email, telepon, atau kunjungi kantor kami. Tim kami akan dengan senang hati
                    mendukung upaya bersama dalam mengatasi stunting dan meningkatkan kualitas hidup masyarakat di
                    Kabupaten Jayapura.
                </p>
            </div>
            <div class="row">
                <div class="col-md-6 m-2">
                    <div class="row">

                        <div class="col-5 bg-success text-white text-center rounded shadow m-2">
                            <div class="m-4">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call
                                </span>
                                <p class="text-bold"> 08219812342
                                </p>
                            </div>
                        </div>

                        <div class="col-6 bg-success text-white text-center rounded shadow m-2">
                            <div class="m-4">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    Email
                                </span>
                                <p class="text-bold">stuntingkabjayapura.go.id
                                </p>
                            </div>
                        </div>




                    </div>
                </div>

                <div class="col-md-5 m-2">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63773.89431510846!2d140.40371214863282!3d-2.5497133999999955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686cee517f7e18a5%3A0xd350259bf0432fba!2sKantor%20Dinas%20Kesehatan%20Kabupaten%20Jayapura!5e0!3m2!1sid!2sid!4v1734859309103!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>


            </div>


        </div>
    </section>

    <!-- end furniture section -->






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
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->




    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script type="text/javascript">
        const map = L.map('mapStunting', {
            fullscreenControl: true, // Mengaktifkan kontrol fullscreen
            fullscreenControlOptions: { // Opsi tambahan jika diperlukan
                position: 'topleft'
            }
        });

        map.createPane('labels');

        map.getPane('labels').style.zIndex = 650;

        map.getPane('labels').style.pointerEvents = 'none';


        const cartodbAttribution =
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';

        const positron = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: cartodbAttribution
        }).addTo(map);

        const positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
            attribution: cartodbAttribution,
            pane: 'labels'
        }).addTo(map);

        @foreach ($pus as $p)
            var marker = L.marker([{{ $p->distrik->latitude }}, {{ $p->distrik->longitude }}], {
                alt: 'STUNTING'
            }).addTo(map).bindPopup(`DISTRIK {{ $p->distrik->nama_distrik }} <br>
PUSKESMAS {{ $p->nama_puskesmas }} <br>

<p class=""> Jumlah Balita  :
  <span class="font-weight-bold">
      @php
          // Hitung total jumlah balita dari seluruh data stunting di distrik ini
          $jumlahBalita = $p->distrik->stunting->sum('jumlah_balita');
      @endphp
      {{ $jumlahBalita }}
  </span>
</p>

<p>Balita Pendek  :
  <span class="font-weight-bold">
      {{ $p->distrik->stunting->sum('pendek') }}
  </span>
</p>

<p>Balita Sangat Pendek  :
  <span class="font-weight-bold">
      {{ $p->distrik->stunting->sum('sangat_pendek') }}
  </span>
</p>
`);
        @endforeach



        // Adjusted the map view to focus on Papua, Indonesia
        map.setView({
            lat: -2.5677583,
            lng: 140.435791
        }, 9); // Papua, Indonesia coordinates
    </script>
</body>

</html>
