<h1>Cari Buku</h1>
<p>Cari buku berdasarkan Judul, Kategori, atau Nama Pengarangnya</p>

<hr />
<div class="row">
    <div class="col-md-8 col-xs-12">

    </div>
    <div class="col-md-4 col-xs-12">
        <div class="form-label-group">
            <input type="text" id="cari" class="form-control" placeholder="Cari di database">
            <label for="cari">Cari di Database</label>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="table" class="table table-condensed table-hover table-striped" width="100%">
        <thead>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Nama Pengarang</th>
            <th></th>
        </thead>
    </table>
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
                    url: "<?= site_url('dt/buku')?>",
                    type: "POST",
                },
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                columns: [
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
                        return `<a href="<?= base_url('buku/detil-buku/') ?>${data.id}"><i class="fa fa-search"></i></a>`
                    }
                }

            ],

        initComplete: function(settings) {
            $('.dataTables_filter').hide()
        }
    }).draw();

});

$('#cari').change(() => {
    $('#table').DataTable()
        .search($('#cari').val()).draw();
})
</script>