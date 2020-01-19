

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('beranda') ?>"">
      <i class="fas fa-fw fa-home"></i>
      <span>Beranda</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('cari') ?>">
      <i class="fas fa-fw fa-search"></i>
      <span>Cari Buku</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('history') ?>">
      <i class="fas fa-fw fa-clock"></i>
      <span>History</span></a>
  </li>



  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Buku</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="<?= base_url('input-data-buku') ?>"><i class="fa fa-book"></i> Input Buku Baru</a>
      <a class="dropdown-item" href="<?= base_url('books/data_buku') ?>"><i class="fa fa-list"> </i> Daftar Buku</a>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-key"></i>
      <span>Pengguna</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Manajemen Pengguna</h6>
      <a class="dropdown-item" href="<?= base_url('register') ?>"><i class="fa fa-user"></i> Pengguna Baru</a>
      <a class="dropdown-item" href="<?= base_url('daftar-pengguna') ?>"><i class="fa fa-list"> </i> Daftar Pengguna</a>
    </div>
  </li>
</ul>