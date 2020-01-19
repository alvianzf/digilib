<h1>Sejarah Download Saya</h1>
<p>Halaman ini menampilkan sejarah file yang telah didownload oleh pengguna <strong><?= $this->session->userdata['user_detail']->user_data[0]->nama ?></strong></p>

<hr />

<div class="table-responsive">
    <table id="table" class="table table-striped">
        <thead>
            <th>Tanggal</th>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Pengarang</th>
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
                    url: "<?= site_url('dt/history')?>",
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

            ],
    }).draw();
});

</script>