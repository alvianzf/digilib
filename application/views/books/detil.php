<h1>Detil Buku <?= $buku->judul_buku ?></h1>
<div class="row">
    <div class="col-md-2">
        <div class="thumbnail-box" id="cover-data">
            <img src="<?= base_url($buku->foto_cover_path) ?>" width="100%">
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        Ringkasan Buku:

        <table class="table table-striped">
            <tr>
                <td>Judul</td>
                <td><i><?= $buku->judul_buku ?></i></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><i><?= $buku->pengarang ?></i></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><i><?= $buku->kategori ?></i></td>
            </tr>
            <tr>
                <td>Tanggal Input</td>
                <td><i><?= date('d M Y', $buku->created_at) ?></i></td>
            </tr>
        </table>
    </div>
    <div class="col-md-4">
        <center>
            <a href="<?= base_url($buku->path) ?>" target="_blank" class="text-success" style="font-size: 2em;" download>
                <i class="fas fa-download"></i>
                <p>Download PDF</p>
            </a>
        </center>
    </div>
</div>
<hr />
<h6>Ringkasan Singkat: </h6>
<p style="text-align: justify">
    <?= $buku->ringkasan ?>
</p>

<style>

.thumbnail-box {
        width: 150px;
        height: 200px;
        border: 3px dotted black;
        padding: 5px;
        position: relative;
        text-align: center;
    }

    .thumbnail {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

</style>