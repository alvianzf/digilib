

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item <?= nav('beranda', $this->uri->segments) ?>">
    <a class="nav-link" href="<?= base_url('beranda') ?>"">
      <i class="fas fa-fw fa-home"></i>
      <span>Beranda</span>
    </a>
  </li>
  <li class="nav-item <?= nav('cari', $this->uri->segments) ?>">
    <a class="nav-link" href="<?= base_url('cari') ?>">
      <i class="fas fa-fw fa-search"></i>
      <span>Cari Buku</span></a>
  </li>
  <li class="nav-item <?= nav('history', $this->uri->segments) ?>">
    <a class="nav-link" href="<?= base_url('history') ?>">
      <i class="fas fa-fw fa-clock"></i>
      <span>History</span></a>
  </li>

  <?php if ($this->session->userdata['user_detail']->role == 'admin') { ?>

  <li class="nav-item dropdown <?= nav('buku', $this->uri->segments) ?>">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Buku</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item <?= nav('input-data-buku', $this->uri->segments) ?>" href="<?= base_url('buku/input-data-buku') ?>"><i class="fa fa-book"></i> Input Buku Baru</a>
      <a class="dropdown-item <?= nav('data-buku', $this->uri->segments) ?>" href="<?= base_url('buku/data-buku') ?>"><i class="fa fa-list"> </i> Daftar Buku</a>
    </div>
  </li>
  <li class="nav-item <?= nav('laporan', $this->uri->segments) ?>">
    <a class="nav-link" href="<?= base_url('laporan') ?>">
      <i class="fas fa-fw fa-file"></i>
      <span>Laporan</span></a>
  </li>

  <?php } ?>

  <li class="nav-item dropdown <?= nav('pengguna', $this->uri->segments) ?>">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-key"></i>
      <span>Pengguna</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">

  <?php if ($this->session->userdata['user_detail']->role == 'admin') { ?>
      <h6 class="dropdown-header">Manajemen Pengguna</h6>
      <a class="dropdown-item <?= nav('register', $this->uri->segments) ?>" href="<?= base_url('pengguna/register') ?>"><i class="fa fa-user"></i> Pengguna Baru</a>
      <a class="dropdown-item <?= nav('daftar-pengguna', $this->uri->segments) ?>" href="<?= base_url('pengguna/daftar-pengguna') ?>"><i class="fa fa-list"> </i> Daftar Pengguna</a>
      <div class="dropdown-divider"></div>
      <h6 class="dropdown-header">Manajemen Profil</h6>
      <?php } ?>
      <a class="dropdown-item <?= nav('pengaturan', $this->uri->segments) ?>" href="<?= base_url('pengguna/pengaturan') ?>"><i class="fa fa-cog"> </i> Pengaturan Profil</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-lock"></i> Logout</a>
    </div>
  </li>
</ul>