<div class="page-header">
    <img src="<?= base_url() ?>assets/img/dots.png" class="dots">
    <img src="<?= base_url() ?>assets/img/path4.png" class="path">

    <div class="container">

    <div class="row">
            <div class="col-md-6">
                <label><i class="fas fa-info-circle"></i></label>
                <p class="page-description">
                    Gunakan fitur ini untuk mencari riwayat unduhan anda. Silakan pilih dari tabel di bawah, atau ketik pencarian anda di <i>form</i> yang telah disediakan dan tekan <strong>Enter</strong> untuk memulai pencarian.
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label><i class="fas fa-search"></i> Cari di Riwayat Saya</label>
                <input type="text" id="cari" class="form-control" placeholder="Judul, Pengarang, atau Kategori">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                    <table id="table" class="table table-striped" width="100%">
                        <thead>
                            <th>Tanggal</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                        </thead>
                    </table>
            </div>
        </div>

    </div>
</div>

<script>

$(document).ready(function() {
    $('#table').DataTable({
        lengthChange: false,
        language: {
                    paginate: {
                        next: '<i class="fas fa-caret-right"></i>',
                        previous: '<i class="fas fa-caret-left"></i>'
                    },
                    info: 'Menunjukkan _START_ sampai _END_ dari total _TOTAL_ data'
                },
                ajax: {
                    url: "<?= site_url('dt/history/') . $id?>",
                    type: "POST",
                },
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                columns: [
                {
                    data: 'tanggal',
                    render: function(tanggal) {
                        return new Date(tanggal*1000).toLocaleDateString('id-ID')
                    }
                },
                {
                    data: null,
                    searchable: true,
                    orderable: true,
                    render: (data) => {
                        return `<a href="<?= base_url('buku/detil-buku') ?>/${data.id_buku}">${data.judul_buku}</a>`
                    }
                },
                {
                    data: 'kategori',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'pengarang',
                    searchable: true,
                    orderable: true
                },

            ],
            initComplete: function(settings) {
                $('.dataTables_filter').hide()
            }
    }).draw();
});
</script>