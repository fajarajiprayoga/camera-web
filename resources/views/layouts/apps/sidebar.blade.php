<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
  <span class="align-middle">Admin Dashboard</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item @yield('dashboard')">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                  <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item @yield('items')">
              <a class="sidebar-link" href="{{ route('items.index') }}">
                <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Item</span>
              </a>
          </li>

          <li class="sidebar-item @yield('transaction')">
            <a class="sidebar-link" href="{{ route('transaction.index') }}">
              <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Transaksi</span>
            </a>
        </li>

            <li class="sidebar-item @yield('teams')">
                <a class="sidebar-link" href="{{ route('teams.index') }}">
                  <i class="align-middle" data-feather="user"></i> <span class="align-middle">Tim</span>
                </a>
            </li>
            
            

    </div>
</nav>