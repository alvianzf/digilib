<div class="page-header">
    <img src="<?= base_url() ?>assets/img/dots.png" class="dots">
    <img src="<?= base_url() ?>assets/img/path4.png" class="path">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <label><i class="fas fa-info-circle"></i> Manajemen Pengguna</label>
                <p class="page-description">
                    <a class="btn btn-info" href="<?= base_url('pengguna/register') ?>"><i class="fas fa-user"></i> Register pengguna baru</a>
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
            <div class="col-lg-12 col-md-12">
                <table class="table" id="table" width="100%">
                    <thead>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Nomor Kontak</th>
                        <th>Role</th>
                        <th><i class="fa fa-cog"></i></th>
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
                    url: "<?= site_url('dt/user')?>",
                    type: "POST",
                },
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                columns: [
                {
                    data: 'username',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'nama',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'kelas',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'nomor_kontak',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'role',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'id',
                    render: (id) => {
                        return `<a onclick="deleteUser(${id})"><i class="fa fa-trash text-danger"></i></a>`
                    }
                },

            ],
            initComplete: function(settings) {
                $('.dataTables_filter').hide()
            }
    }).draw();
});

function deleteUser(id) {
    toastr.error("<br /><button type='button' value='yes' class='btn btn-danger'>Ya</button><button type='button' class='btn btn-primary-inverse' value='no' >Tidak</button>",'Hapus data ini?',
    {
        allowHtml: true,
        onclick: function (toast) {
            value = toast.target.value
            if (value == 'yes') {
                $.post('<?= api('auth/delete_user') ?>', {id})
                .then(res => {
                    $('.toastr').remove()
                    toastr.success('Berhasil menghapus data');
                    window.location.reload(true);
                }).catch(err => {
                })
            } else {
                $('.toastr').remove();
            }
        }
    });
}

</script>