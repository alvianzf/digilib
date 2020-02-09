
    <div class="page-header">
      <img src="<?= base_url() ?>assets/img/dots.png" class="dots">
      <img src="<?= base_url() ?>assets/img/path4.png" class="path">
      <div class="container align-items-center">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h1 class="profile-title text-left">Judul Buku</h1>
            <h5 class="text-on-back"><?= $jumlah_buku ?></h5>
            <p class="profile-description">Jumlah koleksi buku yang ada di database kami. Berasal dari unggahan pustakawan, dan siswa-siswi kami yang ingin berbagi koleksinya kepada anda. Semua koleksi di pustaka digital ini dapat anda unduh secara gratis.</p>
           
          </div>
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="<?= base_url() ?>/assets/img/smk3.jpg" class="img-center img-fluid rounded-circle">
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#linka">
                      Koleksi Terbaru
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-subcategories">
                  <div class="tab-pane active" id="linka">
                    <div class="">
                      <table class="table tablesorter " id="plain-table">
                        <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              Judul
                            </th>
                            <th class="header">
                              Pengarang
                            </th>
                            <th class="header">
                              Tanggal
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($data_terakhir as $buku) {
                            ?>
                            <tr>
                                <td><?= $buku->judul_buku ?></td>
                                <td><?= $buku->pengarang ?></td>
                                <td><?= date('d/m/Y', $buku->created_at) ?></td>
                            </tr>

                            <?php
                                }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md-6">
            
          </div>
          <div class="col-md-5">
            <h1 class="profile-title text-left">Pengguna</h1>
            <h5 class="text-on-back"><?= $jumlah_pengguna ?></h5>
            <p class="profile-description text-left">Pengguna aktif adalah siswa, dan pustakawan yang ingin berbagi koleksinya kepada anda.</p>
          </div>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-plain">
              <div class="card-header">
                <h1 class="profile-title text-left">Total Unduhan</h1>
                <h5 class="text-on-back"><?= $jumlah_unduhan ?></h5>
              </div>
              <div class="card-body">
                <p class="profile-description">Jumlah unduhan koleksi buku selama ini. </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
            <div class="info info-horizontal">
              <div class="icon icon-primary">
                <i class="tim-icons icon-square-pin"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Temukan Perpustakaan Kami</h4>
                <p> <strong>JL. SULTAN SULAIMAN</strong>, Kampung Bulang,  
                  <br>  Kec. Tanjung Pinang Timur,
                  <br>  Kota Tanjungpinang,
                  <br>  Prov. Kepulauan Riau
                  <br> 29123
                </p>
              </div>
            </div>
            <div class="info info-horizontal">
              <div class="icon icon-primary">
                <i class="tim-icons icon-mobile"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Kontak Kami di</h4>
                <p> SMK Negeri 3 Tanjungpinang
                  <br><a href="tel:077128611"><i class="fas fa-phone"></i> 0771 28611</a>
                  <br><a href="mailto:smkn3tpi@gmail.com"><i class="fas fa-envelope"></i> smkn3tpi@gmail.com</a>
                  <br><a href="http://smkn3tpi.sch.id" target="_blank"><i class="fas fa-globe"></i> smkn3tpi.sch.id</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>