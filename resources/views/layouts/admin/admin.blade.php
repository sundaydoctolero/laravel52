<!DOCTYPE html>
<html>
@include('layouts.admin.partials.main-header')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style=background-color:powderblue>

    @include('layouts.admin.partials.header') <!-- Main Header -->

    @include('layouts.admin.partials.main-sidebar') <!-- Left side column. contains the logo and sidebar -->

    <div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
        @include('layouts.admin.partials.section')

        <section class="content container-fluid"> <!-- Main content -->
            @include('flash::message')

            @yield('main-content')
        </section>

    </div> <!-- /.content-wrapper -->

    @include('layouts.admin.partials.footer') <!-- Main Footer -->


</div> <!-- ./wrapper -->
    @include('layouts.admin.partials.script')  <!-- REQUIRED JS SCRIPTS -->

</body>
</html>