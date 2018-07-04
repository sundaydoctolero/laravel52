<!DOCTYPE html>
<html>

    @include('layouts.app.partials.main-header')

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">

<div class="wrapper">

    @include('layouts.app.partials.header') <!-- header.blade -->

    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <!--<section class="content-header">
                <h1>
                    Top Navigation
                    <small>Example 2.0</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Layout</a></li>
                    <li class="active">Top Navigation</li>
                </ol>
            </section>
            -->

            <!-- Main content -->
            <section class="content">

                @include('flash::message')

                @yield('main-content')

            </section>

        </div>
    </div> <!-- /.content-wrapper -->

    @include('layouts.app.partials.footer')

</div> <!-- ./wrapper -->

    @include('layouts.app.partials.script')

</body>
</html>
