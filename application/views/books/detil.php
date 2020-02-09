<div class="page-header">
    <img src="<?= base_url() ?>/assets/img/dots.png" class="dots">
    <img src="<?= base_url() ?>/assets/img/path4.png" class="path">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="thumbnail-box" id="cover-data">
                    <img src="<?= base_url($buku->foto_cover_path) ?>" width="100%" class="thumbnail">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
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
                    <a onclick="countDownload(<?= $buku->id ?>)" target="_blank" class="text-success" style="font-size: 2em;" download>
                        <i class="fas fa-download"></i>
                        <p>Unduh PDF</p>
                    </a>
                    <p>Telah diunduh sebanyak: <span id="count" class="text-info"></span> kali</p>
                    <p>Terakhir diunduh pada: <span id="terakhir" class="text-success"></span></p>
                    <p>Pada Jam: <span id="jam" class="text-success"></span></p>
                </center>
            </div>
        </div>
        <hr />
        <h6>Ringkasan Singkat: </h6>
        <p style="text-align: justify">
            <?= $buku->ringkasan ?>
        </p>
    </div>
</div>

<script>

function countDownload(id) {

    window.location.href = "<?= base_url($buku->path) ?>"
    
    $.post("<?= api('buku/history') . $buku->id ?>")
    .then(res => {
        window.location.reload(false)
    })
}

$.get("<?= api('buku/download') . $buku->id ?>")
.then(res => {
    $('#count').text(res.result.count);
    $('#terakhir').text(res.result.last);
    $('#jam').text(res.result.time);
}).catch(err => {

    $('#count').html('<span class="text-danger">0</span>');
    $('#terakhir').html('<span class="text-danger">Belum pernah diunduh</span>');
    $('#jam').html('<span class="text-danger">-</span>');
})

</script>

<style>

    .thumbnail-box {
        width: 150px;
        height: 200px;
        border: 3px dotted white;
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