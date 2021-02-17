<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
          <a href="{{  route('admin.dashboard') }}">
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
        <li class="treeview {{
            // Request::routeIs('admin.admin.*') ||
            // Request::routeIs('admin.owner.*') ||
            // Request::routeIs('admin.sekertaris.*') ||
            Request::routeIs('admin.kategori.*') ||
            Request::routeIs('admin.suplier.*') ||
            Request::routeIs('admin.material.*')
             ? 'active menu-open' : '' }}">

          <a href="#">
            <i class="fa fa-cogs"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            {{-- <li class="{{ Request::routeIs('admin.admin.*') ? 'active' : '' }}"><a href="{{ route('admin.admin.index') }}"><i class="fa fa fa-user-circle"></i> Data Admin</a></li>
            <li class="{{ Request::routeIs('admin.owner.*') ? 'active' : '' }}"><a href="{{ route('admin.owner.index') }}"><i class="fa fa-users"></i> Data Owner</a></li>
            <li class="{{ Request::routeIs('admin.sekertaris.*') ? 'active' : '' }}"><a href="{{ route('admin.sekertaris.index') }}"><i class="fa fa-user-o"></i> Data Sekertaris</a></li> --}}
            <li class="{{ Request::routeIs('admin.kategori.*') ? 'active' : '' }}"><a href="{{ route('admin.kategori.index') }}"><i class="fa fa-th-list"></i> Data Kategori</a></li>
            <li class="{{ Request::routeIs('admin.suplier.*') ? 'active' : '' }}"><a href="{{ route('admin.suplier.index') }}"><i class="fa fa-cubes"></i> Data Suplier</a></li>
            <li class="{{ Request::routeIs('admin.material.*') ? 'active' : '' }}"><a href="{{ route('admin.material.index') }}"><i class="fa fa-gavel"></i> Data Material</a></li>
        </ul>
    </li>

      </ul>
