<h1>Daftar Pengguna Aktif</h1>
<p>Berisikan daftar pengguna aktif sistem</p>

<hr />

<div class="table-responsive">
    <table class="table" id="table" width="100%">
        <thead>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Nomor Kontak</th>
            <th>Role</th>
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
    }).draw();
});

function deleteUser(id) {
    $.post('<?= api('auth/delete_user') ?>', {id})
    .then(res => {
        toastr.success('berhasil menghapus data');
        window.location.reload(true);
    }).catch(err => {
        toastr.error('Gagal menghapus data');
    })
}

</script>