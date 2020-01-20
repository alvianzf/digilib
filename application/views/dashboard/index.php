<h1><i class="fas fa-book text-info"></i> Digital Library SMKN 3 Tanjungpinang</h1>

<hr />

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Ringkasan sistem</h5>
            </div>
            <div class="card-body">
                <table width="100%" class="table table-collapse table-condensed">
                    <tr>
                        <td>Pengguna</td>
                        <td style="text-align: right;" class="text-info"><?= $jumlah_pengguna ?></td>
                    </tr>
                    <tr>
                        <td>Koleksi Buku</td>
                        <td style="text-align: right;" class="text-info"><?= $jumlah_buku ?></td>
                    </tr>
                    <tr>
                        <td>Total Unduhan</td>
                        <td style="text-align: right;" class="text-info"><?= $jumlah_unduhan ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Ringkasan Saya</h5>
            </div>
            <div class="card-body">
                <table width="100%" class="table table-collapse table-condensed">
                    <tr>
                        <td>Nama Pengguna</td>
                        <td style="text-align: right;" class="text-primary"><?= $nama ?></td>
                    </tr>
                    <tr>
                        <td>Unduhan Terakhir</td>
                        <td style="text-align: right;" ><a href="<?= base_url('buku/detil-buku/' . $buku_terakhir->id)?>" class="text-success"><?= $buku_terakhir->judul_buku?></a>, pada tanggal <?= $last_download ?> jam <?= $time_download ?></span></td>
                    </tr>
                    <tr>
                        <td>Total Unduhan</td>
                        <td style="text-align: right;" class="text-primary"><?= $total_download ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>