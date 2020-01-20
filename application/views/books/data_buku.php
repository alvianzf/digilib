<h1>Daftar Buku</h1>

<hr />

<div class="table-responsive">
    <table class="table" id="table" width="100%">
        <thead>
            <th>Judul Buku</th>
            <th>Kategori Buku</th>
            <th>Pengarang</th>
            <th width="10%" style="text-align: center;"><i class="fa fa-cog"></i></th>
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
                    className: 'dt-body-center',
                    render: (id) => {
                        return `
                        <center>
                            <a href="<?=base_url('buku/detil-buku/')?>${id}"><i class="fa fa-search text-info"></i></a> | 
                            <a href="#" onclick="deleteBuku(${id})"><i class="fa fa-trash text-danger"></i></a>
                        </center>`
                    }
                },

            ],
    }).draw();
});

function deleteBuku(id) {
    toastr.error("<br /><button type='button' value='yes' class='btn btn-danger'>Ya</button><button type='button' class='btn btn-primary-inverse' value='no' >Tidak</button>",'Hapus buku ini?',
    {
        allowHtml: true,
        onclick: function (toast) {
            value = toast.target.value
            if (value == 'yes') {
                $.post('<?= api('buku/delete_buku') ?>', {id})
                .then(res => {
                    toastr.success('berhasil menghapus data buku');
                    window.location.reload(true);
                }).catch(err => {
                    toastr.error('Gagal menghapus data');
                })
            } else {
                $('.toastr').remove();
            }
        }
    });
}
</script>