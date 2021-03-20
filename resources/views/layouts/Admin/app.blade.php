<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/adminox/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Feb 2021 20:34:59 GMT -->
<head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        @include('layouts.admin.partials.css')
        @yield('css')

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
           @include('layouts.admin.partials.topbar')
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    @include('layouts.admin.partials.sidebar')
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">{{$page_title}}</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        @yield('content')

                        <!-- end row -->    
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

                @include('layouts.admin.partials.footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
             <!-- end slimscroll-menu-->
        </div>

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>


        <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <script src="assets/js/pages/sweet-alerts.init.js"></script>

        <!-- Required datatable js -->
        <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Footable js -->
         <script src="{{asset('assets/libs/footable/footable.all.min.js')}}"></script>

         <!-- Init js -->
         <script src="{{asset('assets/js/pages/foo-tables.init.js')}}"></script>

         <script src="{{asset('assets/libs/custombox/custombox.min.js')}}"></script>

         <!-- Plugin js-->
        <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

        <!-- Validation init js-->
        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>


        <!--C3 Chart-->
        <script src="{{asset('assets/libs/d3/d3.min.js')}}"></script>
        <script src="{{asset('assets/libs/c3/c3.min.js')}}"></script>

        <script src="{{asset('assets/libs/echarts/echarts.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
    @stack('js')
        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <!-- Datatables init -->
        <!-- <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script> -->

    </body>

<!-- Mirrored from coderthemes.com/adminox/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Feb 2021 20:35:38 GMT -->
</html>