<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>

    @include('admin.sections.css')

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('admin.sections.right_header')

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin.sections.navigation')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('form.flash')

    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ @$page_title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">{{ trans('app.Home') }}</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
{{--                    @if(isset($breadcrumb))--}}
{{--                        @include('admin.sections.breadcrumb')--}}
{{--                    @endif--}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('admin.sections.footer')

</div>
<!-- ./wrapper -->

@include('admin.sections.js')

<script>
    $('div.alert').not('.alert-important').delay(4000).fadeOut(350);
</script>

</body>
</html>
