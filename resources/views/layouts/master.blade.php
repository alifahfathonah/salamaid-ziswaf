<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        @yield('title')
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for full width layout with mega menu" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <!-- END THEME LAYOUT STYLES -->
        {{-- <link rel="shortcut icon" href="favicon.ico" />  --}}
        <link rel="icon" type="image/png" href="{{asset('favicon.png')}}" />
    </head>
    <!-- END HEAD -->
        @include('includes.script')
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            @include('includes.header')
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        @yield('konten')
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            @include('includes.footer')
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        
        <div class="quick-nav-overlay"></div>

        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
        @yield('footscript')
    </body>
@include('includes.modal')
</html>