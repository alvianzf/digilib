
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?= base_url() ?>" rel="tooltip" title="Digital Library untuk SMK Negeri 3 Tanjungpinang" data-placement="bottom" >
          <span>digi</span> lib <sup>SMKN3-TPI</sup>
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                digilib
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Cari Buku di Koleksi" data-placement="bottom" href="<?= base_url() ?>cari-buku">
              <i class="fas fa-search"></i>
              <p class="d-lg-none d-xl-none">Cari Buku di Koleksi</p>
            </a>
          </li>

          <?php
              if (@$this->session->userdata['is_logged_in']) {
            ?>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Upload Buku" data-placement="bottom" href="<?= base_url('books/input') ?>">
              <i class="fas fa-upload"></i>
              <p class="d-lg-none d-xl-none">Upload Buku</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link active" rel="tooltip" title="Sejarah Unduhan Saya" data-placement="bottom" href="<?= base_url() ?>riwayat">
              <i class="fas fa-clock"></i>
              <p class="d-lg-none d-xl-none">Sejarah Unduhan Saya</p>
            </a>
          </li>
          <?php
              }
            if (@$this->session->userdata['user_detail']->role == 'admin') {
          ?>
          <li class="nav-item"></li>

          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Manajemen Koleksi" data-placement="bottom" href="<?= base_url('buku/data-buku') ?>" >
              <i class="fas fa-book"></i>
              <p class="d-lg-none d-xl-none">Manajemen Koleksi</p>
          </a>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Laporan Penggunaan" data-placement="bottom" href="<?= base_url('laporan') ?>" >
              <i class="fas fa-chart-bar"></i>
              <p class="d-lg-none d-xl-none">Laporan Penggunaan</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Manajemen Pengguna" data-placement="bottom" href="<?= base_url('pengguna/daftar-pengguna') ?>" >
              <i class="fas fa-users"></i>
              <p class="d-lg-none d-xl-none">Manajemen Pengguna</p>
          </a>
          </li>
            <?php } ?>
          <li class="nav-item">
            <?php
              if (!@$this->session->userdata['is_logged_in']) {
            ?>
              <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login Pengguna</a>
            <?php
            }
            ?>
            <?php
              if (@$this->session->userdata['is_logged_in']) {
            ?>
            <li class="nav-item p-0">
              <a class="nav-link" rel="tooltip" title="Pengaturan Akun" data-placement="bottom" href="<?= base_url('pengguna/pengaturan') ?>" >
                <i class="fas fa-key"></i>
                <p class="d-lg-none d-xl-none">Pengaturan Akun</p>
            </a>
            </li>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            <?php
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
