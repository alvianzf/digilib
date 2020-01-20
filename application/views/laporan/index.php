<h1>Laporan Perpustakaan</h1>
<p>laporan statistika penggunaan sistem perpustakaan SMKN 3 Tanjungpinang</p>

<hr />

<div class="table-responsive">
    <table id="table" class="table table-striped table-condensed table-hover" width="100%">
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
                        return `<a href="<?= base_url('buku/detil/') ?>${data.id}">${data.judul_buku}</a>`
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
                    data: 'terakhir',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'oleh',
                    searchable: true,
                    orderable: true
                },

            ],

    }).draw();

});
</script>