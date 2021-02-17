<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="{{ Request::routeIs('owner.dashboard') ? 'active' : '' }}">
          <a href="{{  route('owner.dashboard') }}">
            <i class="fa fa-th"></i> <span>Home</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>

        {{-- <li class="{{ Request::routeIs('owner.dashboard') ? 'active' : '' }}">
            <a href="{{  route('owner.owner.index') }}">
              <i class="fa fa-th"></i> <span>Data Owner</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li> --}}

          <li class="treeview {{
            Request::routeIs('owner.admin.*') ||
            Request::routeIs('owner.sekertaris.*')
             ? 'active menu-open' : '' }}">

          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Management Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ Request::routeIs('owner.admin.*') ? 'active' : '' }}"><a href="{{ route("owner.admin.index") }}"><i class="fa fa-circle-o"></i> Data Admin</a></li>
            <li class="{{ Request::routeIs('owner.sekertaris.*') ? 'active' : '' }}"><a href="{{ route("owner.sekertaris.index") }}"><i class="fa fa-circle-o"></i> Data Sekertaris</a></li>
        </ul>
        </li>


        <li class="treeview {{
            Request::routeIs('owner.laporanmasuk.*') ||
            Request::routeIs('owner.laporankeluar.*')
             ? 'active menu-open' : '' }}">

          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Cetak Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ Request::routeIs('owner.laporanmasuk.*') ? 'active' : '' }}"><a href="{{ route("owner.laporanmasuk.index") }}"><i class="fa fa-circle-o"></i> Laporan Masuk</a></li>
            <li class="{{ Request::routeIs('owner.laporankeluar.*') ? 'active' : '' }}"><a href="{{ route("owner.laporankeluar.index") }}"><i class="fa fa-circle-o"></i> Laporan Keluar</a></li>
        </ul>
        </li>


      </ul>
