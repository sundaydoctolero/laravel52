<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->guard('admin')->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/admin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="/tasks"><i class="fa fa-sticky-note"></i> <span>Task &nbsp &nbsp</span><small class="label label-danger">{{ $tasks_pending }}</small><small class="label label-success">{{ $tasks_open }}</small></a></li>
            <li class="active"><a href="/contacts"><i class="fa fa-anchor"></i> <span>Contacts</span></a></li>
            <li class="active"><a href="/assets"><i class="fa fa-anchor"></i> <span>Manage Assets</span></a></li>
            <li class="active"><a href="/passwords"><i class="fa fa-anchor"></i> <span>Manage Passwords</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-server"></i> <span>Setup</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($menus as $menu)
                        <li><a href="{{ $menu->url }}"><i class="{{ $menu->icon }}"></i> <span>{{ $menu->title }}</span></a></li>
                    @endforeach
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>