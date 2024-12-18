<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Informasi Pemuda Baptis Papua</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset-visitor/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="asset-visitor/lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset-visitor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset-visitor/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-primary px-5 d-none d-lg-block" id="top">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                            class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                            class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                            class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                            class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i
                            class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">

                    @if (Auth::guest())
                        <a href="{{ route('login') }}"><small class="me-3 text-light"><i
                                    class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                    @else
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><small class="me-3 text-light"><i
                                    class="fa fa-sign-out-alt me-2"></i>Logout</small></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <div class="d-flex m-0 text-white mt-3">
                    <div class="d-flex align-items-center"> <img src="{{ asset('assets/images/logo.png') }}"srcset="">
                    </div>
                    <h1 class=" fw-bold h5 "> SI Pemuda Baptis Papua  <br >Tingkat Wilayah  Jayapura, <br> Keerom
                        dan Yahukimo</h1>
                </div>
                <h2 class="">
                </h2>
                <!-- <img src="asset-visitor/img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#beranda" class="nav-item nav-link ">Beranda</a>
                    <a href="#tentang" class="nav-item nav-link">Tentang Kami</a>
                    <a href="#pengumuman" class="nav-item nav-link">Pengumuman</a>
                    <a href="#agenda" class="nav-item nav-link">Agenda</a>
                    <a href="#galeri" class="nav-item nav-link">Galeri</a>
                </div>
                {{-- <a href="" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Book Now</a> --}}
            </div>
        </nav>

        <!-- Carousel Start -->
        <div class="carousel-header" id="beranda">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="asset-visitor/img/carousel-2.jpg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                    Sistem Informasi Pemuda Baptis Papua</h5>
                                <h1 class="h5 text-capitalize text-white mb-4">Tingkat Wilayah Jayapura, Keerom
                                    dan Yahukimo


                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="asset-visitor/img/carousel-1.jpg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                    Sistem Informasi Pemuda Baptis Papua</h5>
                                <h1 class="h5 text-capitalize text-white mb-4">Tingkat Wilayah Jayapura, Keerom
                                    dan Yahukimo
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="asset-visitor/img/carousel-3.jpg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                    Sistem Informasi Pemuda Baptis Papua</h5>
                                <h1 class="h5 text-capitalize text-white mb-4">Tingkat Wilayah Jayapura, Keerom
                                    dan Yahukimo
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
    </div>


    <!-- About Start -->
    <div class="container-fluid about py-5" id="tentang">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="h-100"
                        style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                        <img src="asset-visitor/img/about-img.jpg" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <h5 class="section-about-title pe-3">Tentang Kami</h5>
                    <h1 class="mb-4">Welcome to <span class="text-primary">SI Pemuda Baptis Papua</span></h1>
                    <p class="mb-4 bg-primary p-3 rounded text-white">Sistem Informasi Pemuda Baptis Papua Tingkat
                        Wilayah Jayapura, Keerom, dan Yahukimo adalah sebuah platform digital yang dirancang untuk
                        mendukung pengelolaan data dan aktivitas Pemuda Baptis di tiga wilayah tersebut. Sistem ini
                        bertujuan untuk memudahkan pemantauan kegiatan, komunikasi, serta administrasi organisasi pemuda
                        gereja dengan lebih efisien. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Pengumuman Start -->
    <div class="container-fluid bg-light service py-5" id="pengumuman">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Pengumuman</h5>
                <h1 class="mb-0">Informasi Pengumuman terbaru pada setiap kegiatan Pemuda Baptis Papua</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        @foreach ($pengumuman as $p)
                            <div class="col-6">
                                <div class="service-content-inner  bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-center">
                                        <h5 class="mb-4">{{ $p->judul }}</h5>
                                        <p class="mb-0">{{ $p->keterangan }}
                                        </p>
                                    </div>
                                    <div class="text-small text-muted text-center mt-3 fw-bold service-content">
                                        <p> {{ strftime('%d %B %Y', strtotime($p->mulai)) . ' - ' . strftime('%d %B %Y', strtotime($p->selesai)) }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Pengumuman End -->

    <!-- Agenda Start -->
    <div class="container-fluid testimonial py-5" id="agenda">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Agenda</h5>
                <h1 class="mb-0">Agenda Kegiatan</h1>
            </div>
            <div class="testimonial-carousel owl-carousel">

                @foreach ($agenda as $a )
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-3 fw-bolder" style="font-size: 20px"> {{$a->judul}}</p>
                            <p class="text-center mb-5"> {{$a->keterangan}}
                            </p>

                            <p class="text-center mb-5"> {{$a->gereja->nama_gereja ?? 'Semua Gereja'}}
                            </p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- Agenda End -->




    <!-- Gallery Start -->
    <div class="container-fluid gallery py-5 my-5" id="galeri">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Galeri</h5>
            <h1 class="mb-4">Foto kegiatan pemuda baptis Papua</h1>

        </div>
        <div class="tab-class text-center">

            <div class="tab-content">
                <div id="GalleryTab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-2 container">
                        @foreach ($galeri as $g )
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="gallery-item h-100">
                                <img src="{{asset($g->foto)}}" class="img-fluid w-100 h-100 rounded"
                                    alt="Image">
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2"> {{$g->judul}}</h5>
                                        <p class="text-center mb-5 text-white"> {{$g->gereja->nama_gereja ?? 'Semua Gereja'}}
                                        </p>

                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{asset($g->foto)}}" data-title="{{$g->keterangan}}" data-lightbox="{{$g->judul}}"
                                        class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>

                                        {{-- <p class="text-center mb-5 text-white"> {{$g->keterangan}}
                                        </p> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Gallery End -->






    <!-- Footer Start -->
    <div class="container-fluid footer py-5">
        <div class="container py-5">
            <div class="row g-5">

            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright text-body py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-12 text-center text-white fw-deco mb-md-0">
                    <script>document.write(new Date().getFullYear())</script> &copy; Copyrigt <a href="/" class="text-white">  Sistem Informasi Pemuda Baptis Papua Tingkat Wilayah Jayapura, Keerom dan Yahukimo </a>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#top" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset-visitor/lib/easing/easing.min.js"></script>
    <script src="asset-visitor/lib/waypoints/waypoints.min.js"></script>
    <script src="asset-visitor/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="asset-visitor/lib/lightbox/js/lightbox.min.js"></script>


    <!-- Template Javascript -->
    <script src="asset-visitor/js/main.js"></script>
</body>

</html>
