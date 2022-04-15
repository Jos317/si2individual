<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Color Admin | Dashboard V1</title>
        <meta
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
            name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <link href="{{asset('asset/css/vendor.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('asset/css/apple/app.min.css')}}" rel="stylesheet"/>
        <link
            href="{{asset('asset/plugins/ionicons/css/ionicons.min.css')}}"
            rel="stylesheet"/>

        <link
            href="{{asset('asset/plugins/jvectormap-next/jquery-jvectormap.css')}}"
            rel="stylesheet"/>
        <link
            href="{{asset('asset/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}"
            rel="stylesheet"/>
        <link
            href="{{asset('asset/plugins/gritter/css/jquery.gritter.css')}}"
            rel="stylesheet"/>

    </head>
    <body>

        {{-- <div id="loader" class="app-loader">
            <span class="spinner"></span>
        </div> --}}

        <div id="app" class="app app-header-fixed app-sidebar-fixed ">

            @include('layouts.headerPrincipal')

            @include('layouts.sidebarPrincipal')

            <div class="app-sidebar-bg"></div>
            <div class="app-sidebar-mobile-backdrop">
                <a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a>
            </div>

            <div id="content" class="app-content">
                @yield('content')
            </div>

            @include('layouts.temasPrincipal')

            <a
                href="javascript:;"
                class="btn btn-icon btn-circle btn-primary btn-scroll-to-top"
                data-toggle="scroll-to-top">
                <i class="fa fa-angle-up"></i>
            </a>

        </div>

        <script src="{{asset('asset/js/vendor.min.js')}}"></script>
        <script src="{{asset('asset/js/app.min.js')}}"></script>

        <script src="{{asset('asset/plugins/gritter/js/jquery.gritter.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.canvaswrapper.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.colorhelpers.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.saturated.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.browser.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.drawSeries.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.uiConstants.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.time.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.crosshair.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.categories.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.navigate.js')}}"></script>
        <script
            src=""
            {{asset('asset/plugins/flot/source/jquery.flot.touchNavigate.js')}}></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.hover.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.touch.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.selection.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.symbol.js')}}"></script>
        <script src="{{asset('asset/plugins/flot/source/jquery.flot.legend.js')}}"></script>
        <script
            src="{{asset('asset/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script
            src="{{asset('asset/plugins/jvectormap-next/jquery-jvectormap.min.js')}}"></script>
        <script
            src="{{asset('asset/plugins/jvectormap-next/jquery-jvectormap-world-mill.js')}}"></script>
        <script
            src="{{asset('asset/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('asset/js/demo/dashboard.js')}}"></script>

        {{-- <script src="{{asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"></script> --}}
    </body>
</html>