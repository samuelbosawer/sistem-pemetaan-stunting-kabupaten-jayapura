
             <!-- Footer Start -->
             <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                              <script>document.write(new Date().getFullYear())</script> &copy; Copyrigt <a href="#">    Sistem Pemetaan Stunting Di Kabupaten Jayapura </a>
                            </div>
                            <div class="col-md-6">
                                <!-- <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>


        <!-- App js-->
        <script src="/assets/js/app.min.js"></script>

        {{-- Data table --}}
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <script>
            let table = new DataTable('#myTable');
        </script>

<!-- Third Party js-->
@stack('script-footer')



    </body>
</html>
