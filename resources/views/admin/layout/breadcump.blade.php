        @if (ucfirst(Request::segment(3) != null))

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url(Request::segment(1).'/'.Request::segment(2)) }}">{{ ucfirst(Request::segment(2))}}</a></li>

                           @if (Request::segment(4) == 'ubah')
                            <li class="breadcrumb-item "><a href="#">{{ ucfirst(Request::segment(4))}}</a></li>

                           @else
                            <li class="breadcrumb-item "><a href="#">{{ ucfirst(Request::segment(3))}}</a></li>
                           @endif
                        </ol>
                    </div>
                    <h4 class="page-title">{{ ucfirst(Request::segment(2))}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @else

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url(Request::segment(1).'/'.Request::segment(2)) }}">{{ ucfirst(Request::segment(2))}}</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ ucfirst(Request::segment(2))}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @endif
