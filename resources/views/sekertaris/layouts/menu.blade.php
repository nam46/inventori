<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

       <li class="{{ Request::routeIs('sekertaris.dashboard') ? 'active' : '' }}">
          <a href="{{  route('sekertaris.dashboard') }}">
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
            <li>
                <li class="#"><a href="{{ route('sekertaris.materialmasuk.index') }}"><i class="fa fa-long-arrow-right"></i> Material Masuk</a></li>
                 <span class="pull-right-container"></span>
                </a>
             </li>

            <li>
            <li class="#"><a href="{{ route('sekertaris.materialkeluar.index') }}"><i class="fa fa-long-arrow-left"></i> Material Keluar</a></li>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
