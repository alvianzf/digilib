<div class="page-header">
    <img src="<?= base_url() ?>assets/img/dots.png" class="dots">
    <img src="<?= base_url() ?>assets/img/path4.png" class="path">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <label><i class="fas fa-info-circle"></i> Cari Buku di Koleksi</label>
                <p class="page-description">
                    Gunakan fitur ini untuk mencari buku yang anda inginkan. Silakan pilih dari tabel di bawah, atau ketik pencarian anda di <i>form</i> yang telah disediakan dan tekan <strong>Enter</strong> untuk memulai pencarian.
                </p>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label><i class="fas fa-search"></i> Cari Buku</label>
                <input type="text" id="cari" class="form-control" placeholder="Judul, Pengarang, atau Kategori">
                </div>
            </div>
        </div>
        <div class="row">
            <hr />
            <div class="col-md-12 col-lg-12">
                <table class="table" id="table" width="100%">
                    <thead>
                        <th></th>
                        <th>Judul Buku</th>
                        <th>Kategori Buku</th>
                        <th>Pengarang</th>
                        <th width="10%" style="text-align: center;"><i class="fa fa-cog"></i></th>
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
                    info: 'Menunjukkan _START_ sampai _END_ dari total _TOTAL_ buku di koleksi'
                },
                ajax: {
                    url: "<?= site_url('dt/buku')?>",
                    type: "POST",
                },
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                }],
                order:[[0, 'desc']] ,
                columns: [
                    {
                        data: 'id',
                        visible: false,
                        searchable: false,
                    },
                    {
                        data: 'judul_buku',
                        searchable: true,
                        orderable: true
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
                    {
                        data: null,
                        render: function(data) {
                            return `<center><a href="<?= base_url('buku/detil-buku/') ?>${data.id}" rel="tooltip" title="Lihat selengkapnya" data-placement="top"><i class="fa fa-search"></i></a></center>`
                        }
                    }
            ],
            initComplete: function(settings) {
                $('.dataTables_filter').hide()
        }
    }).draw();

});
</script>