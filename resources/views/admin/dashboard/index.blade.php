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
                <div class="row mt-5">
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


                </div>


            </div> <!-- container -->

        </div> <!-- content -->


    @endsection
