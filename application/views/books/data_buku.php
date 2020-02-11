<div class="page-header">
    <img src="<?= base_url() ?>/assets/img/dots.png" class="dots">
    <img src="<?= base_url() ?>/assets/img/path4.png" class="path">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <label><i class="fas fa-info-circle"></i> Manajemen Koleksi</label>
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
            <div class="col-lg-12 col-md-12">
                <table class="table" id="table" width="100%">
                    <thead>
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
                    info: 'Menunjukkan _START_ sampai _END_ dari total _TOTAL_ data'
                },
                ajax: {
                    url: "<?= site_url('dt/buku_list')?>",
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
                    className: 'dt-body-center',
                    render: (data) => {

                        let id = data.id;

                        let changeStatus = `<i class="fas fa-times" data-toggle="tooltip" title="Not Approved"></i>`

                        console.log(data.approved)

                        if (data.approved == 1) {
                            changeStatus = `<i class="fas fa-check text-success" data-toggle="tooltip" title="Approved"></i>`
                        }

                        return `
                        <center>
                            <a href="#" onclick="approveBuku(${id})">${changeStatus}</a> |
                            <a href="<?=base_url('buku/detil-buku/')?>${id}" data-toggle="tooltip" title="Lihat Buku"><i class="fa fa-search text-info"></i></a> | 
                            <a href="#" onclick="deleteBuku(${id})" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash text-danger"></i></a>
                        </center>`
                    }
                },
            ],
            initComplete: function(settings) {
                $('.dataTables_filter').hide()
        }
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

function approveBuku(id) {
    $.post('<?= api('buku/approve_buku') ?>', {id})
    .then(res => {
        toastr.success('berhasil menyetujui data buku');
        window.location.reload(true);
    }).catch(err => {
        toastr.error('Gagal menghapus data');
    })
}
</script>