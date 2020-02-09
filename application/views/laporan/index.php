<div class="page-header">
    <img src="<?= base_url() ?>assets/img/dots.png" class="dots">
    <img src="<?= base_url() ?>assets/img/path4.png" class="path">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <label><i class="fas fa-info-circle"></i> Laporan Statistik Penggunaan</label>
                <p class="page-description">
                    Ini adalah laporan statistika penggunaan aplikasi. Silakan pilih dari tabel di bawah, atau ketik pencarian anda di <i>form</i> yang telah disediakan dan tekan <strong>Enter</strong> untuk memulai pencarian. Secara <i>default</i>, tabel berurut berdasarkan kepopuleran buku.
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label><i class="fas fa-search"></i> Cari Buku</label>
                <input type="text" id="cari" class="form-control" placeholder="Judul, Pengarang, atau Kategori">
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <table id="table" class="table table-striped table-hover" width="100%">
                    <thead>
                        <th></th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Kategori</th>
                        <th>Jumlah Unduhan</th>
                        <th>Terakhir diunduh pada</th>
                        <th>Terakhir diunduh oleh</th>
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
                    url: "<?= site_url('dt/laporan')?>",
                    type: "POST",
                },
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                order: [[4, 'desc'], [5, 'desc']],
                columns: [
                {
                    data: 'foto_cover_path',
                    render: function(foto) {
                        return `<a href="<?=base_url('/')?>${foto}" target="_blank"><img src="${foto}" width="50"></a>`
                    }
                },
                {
                    data: null,
                    searchable: true,
                    orderable: true,
                    render: function(data) {
                        return `<a href="<?= base_url('buku/detil-buku/') ?>${data.id}">${data.judul_buku}</a>`
                    }
                },
                {
                    data: 'pengarang',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'kategori',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'jumlah',
                    orderable: true
                },
                {
                    data: null,
                    searchable: true,
                    orderable: true,
                    render: (data) => {
                        return data.terakhir ? data.terakhir : '-'
                    }
                },
                {
                    data: null,
                    searchable: true,
                    orderable: true,
                    render: (data) => {
                        return data.terakhir ? (data.oleh ? data.oleh : 'Pengguna Umum') : '-'
                    }
                },

            ],

        initComplete: function(settings) {
            $('.dataTables_filter').hide()
        }

    }).draw();
});
</script>