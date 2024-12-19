     <!-- ========== Left Sidebar Start ========== -->
     <div class="left-side-menu">

         <div class="h-100" data-simplebar>

             <!--- Sidemenu -->
             <div id="sidebar-menu">

                 <ul id="side-menu">

                     <li>
                         <a href="{{ route('admin.dashboard') }}">
                             <i data-feather="airplay"></i>
                             <span> Dashboard </span>
                         </a>
                     </li>



                     {{-- <li class="menu-title mt-2">DATA MASTER</li> --}}
                     @if(Auth::user()->hasRole('admindinas'))
                     <li>
                        <a href="{{route('admin.distrik')}}">
                            <i data-feather="grid"></i>
                            <span> Data Distrik </span>
                        </a>
                    </li>

                     <li>
                        <a href="{{ route('admin.kelurahan') }}">
                             <i data-feather="box"></i>
                             <span> Data Kelurahan </span>
                         </a>
                     </li>
                     <li>
                        <a href="{{route('admin.puskesmas')}}">
                            <i data-feather="home"></i>
                            <span> Data Puskesmas </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.stunting')}}">
                            <i data-feather="slack"></i>
                            <span> Data Stunting </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.clustering')}}">
                            <i data-feather="aperture"></i>
                            <span> Data Clustering </span>
                        </a>
                    </li>

                    {{-- <li class="menu-title mt-2">INFORMASI & PUBLIKASI</li> --}}

                    <li>
                        <a href="{{route('admin.user')}}">
                            <i data-feather="users"></i>
                            <span> Pengguna </span>
                        </a>
                    </li>

                     @endif

                     @if(Auth::user()->hasRole('adminpuskesmas'))

                     <li>
                        <a href="{{route('admin.faktor')}}">
                            <i data-feather="slack"></i>
                            <span>  Faktor Stunting </span>
                        </a>
                    </li>


                     <li>
                        <a href="{{route('admin.clustering')}}">
                            <i data-feather="aperture"></i>
                            <span>  Clustering </span>
                        </a>
                    </li>

                     @endif



                     @if(Auth::user()->hasRole('kepaladinas'))

                     <li>
                        <a href="{{route('admin.puskesmas')}}">
                            <i data-feather="home"></i>
                            <span>  Puskesmas </span>
                        </a>
                    </li>


                     <li>
                        <a href="{{route('admin.clustering')}}">
                            <i data-feather="aperture"></i>
                            <span>  Clustering </span>
                        </a>
                    </li>

                     @endif


                    <li>
                        <a href="{{route('logout')}}"  onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fe-log-out"></i>
                            <span> Keluar </span>
                        </a>
                    </li>





                 </ul>

             </div>
             <!-- End Sidebar -->

             <div class="clearfix"></div>

         </div>
         <!-- Sidebar -left -->

     </div>
     <!-- Left Sidebar End -->
