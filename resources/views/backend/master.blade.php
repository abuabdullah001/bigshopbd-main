<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Dashboard | {{ config('app.name') }}" name="description" />
    <!-- App favicon -->
    @include('backend.includes.style')

    @stack('styles')

    <style>
            .ck-editor__editable[role="textbox"] {
                min-height: 200px;
            }
            .ck-content .image {
                max-width: 80%;
                margin: 20px auto;
            }
    </style>

</head>
<body data-topbar="dark">
    
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('backend.includes.header')
        
        @include('backend.includes.leftbar')

        <!-- Start main content -->
        <main>
            <div class="main-content">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
        </main>
        <!-- end main content-->

        @include('backend.includes.footer')
        
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('backend.includes.rightbar')
    <!-- Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    @include('backend.includes.script')

    @stack('script')
</body>
</html>