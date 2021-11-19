
    <li class="nav-item has-treeview ">
      <a href="{{ route('home') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a> 
    </li>
    <li class="nav-item">
      <a href="{{ route('crypto.index') }}" class="nav-link">
          <i class="nav-icon fab fa-bitcoin"></i>
          <p>
              Discover
              <span class="right badge badge-danger">New</span>
          </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('favorites.watchlist') }}" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>
              Watchlist
          </p>
      </a>
    </li> 
    {{-- Users tab nav --}}
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Users
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('user.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/charts/flot.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Flot</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/charts/inline.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Inline</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/charts/uplot.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>uPlot</p>
          </a>
        </li>
      </ul>
    </li>
