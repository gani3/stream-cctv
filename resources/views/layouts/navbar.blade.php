  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="{{asset('image/cctv_pln_tahuna.png')}}" alt="Logo PLN tahuna" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b> PLN</b> TAHUNA</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link">Peta Perangkat</a>
          </li>
          <li class="nav-item">
            <a href="/perangkat" class="nav-link">Perangkat</a>
          </li>
          <li class="nav-item">
            <a href="/history" class="nav-link">History</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Master Data</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/ruangan" class="dropdown-item">Manage Ruangan </a></li>
              <li><a href="/pegawai" class="dropdown-item">Manage Pegawai</a></li>
              <li><a href="/users" class="dropdown-item">Manage Users</a></li>
            </ul>
          </li>
        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/keluar" >
            <i class="fas fa-sign-out-alt"></i> &nbsp; Sign Out
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
