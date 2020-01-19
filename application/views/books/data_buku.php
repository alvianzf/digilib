<h1>Daftar Buku</h1>

<hr />

<div class="table-responsive">
    <table class="table" id="table">
        <thead>
            <th>Judul Buku</th>
            <th>Kategori Buku</th>
            <th>Pengarang</th>
            <th><i class="fa fa-cog"></i></th>
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
                    data: 'id',
                    render: (id) => {
                        return `
                        <a href="<?=base_url()?>detil-buku/${id}"><i class="fa fa-search text-info"></i></a> | 
                        <a onclick="deleteBuku(${id})"><i class="fa fa-trash text-danger"></i></a>`
                    }
                },

            ],
    }).draw();
});

function deleteBuku(id) {
    $.post('<?= api('buku/delete_buku') ?>', {id})
    .then(res => {
        toastr.success('berhasil menghapus data buku');
        window.location.reload(true);
    }).catch(err => {
        toastr.error('Gagal menghapus data');
    })
}
</script>