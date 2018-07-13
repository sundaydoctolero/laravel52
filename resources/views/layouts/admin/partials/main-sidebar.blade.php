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

            <li class="{{ setActive('admin') }}"><a href="/admin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="{{ setActive('tasks') }}"><a href="/tasks"><i class="fa fa-flag-o"></i> <span>Task &nbsp &nbsp</span><span class="label label-danger pull-right">{{ $tasks_pending }}</span><span class="label label-success pull-right">{{ $tasks_pending }}</span></a></li>
            <li class="{{ setActive('contacts') }}"><a href="/contacts"><i class="fa fa-phone"></i> <span>Contacts</span></a></li>
            <li class="{{ setActive('assets') }}"><a href="/assets"><i class="fa fa-diamond"></i> <span>Manage Assets</span></a></li>
            <li class="{{ setActive('passwords') }}"><a href="/passwords"><i class="fa fa-unlock"></i> <span>Manage Passwords</span></a></li>
            <li class="{{ setActive('workstations') }}"><a href="/workstations"><i class="fa fa-tv"></i> <span>Workstations</span></a></li>
            <li class="{{ setActive('tsheets') }}"><a href="/tsheets"><i class="fa fa-unlock"></i> <span>Manage Tsheet</span></a></li>
            <li class="{{ setActive('downloads') }}"><a href="/downloads"><i class="fa fa-arrow-down"></i> <span>Manage Downloads</span></a></li>
            <li class="{{ setActive('newspaper_reports') }}"><a href="/newspaper_reports"><i class="fa fa-arrow-down"></i> <span>Newspaper Reports</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-gear"></i> <span>Setup</span>
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

            <li class="treeview">
                <a href="#"><i class="fa fa-gear"></i> <span>Newspaper Settings</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/states') }}"><i class="fa fa-anchor"></i> <span>States</span></a></li>
                    <li><a href="{{ url('/publications') }}"><i class="fa fa-anchor"></i> <span>Publications</span></a></li>
                </ul>
            </li>






        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>