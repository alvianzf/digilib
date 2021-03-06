<div class="page-header">
    <img src="<?= base_url() ?>assets/img/dots.png" class="dots">
    <img src="<?= base_url() ?>assets/img/path4.png" class="path">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Form Buku
            </div>
            <div class="card-body">
                <div class="row form-row">
                    <div class="col-md-2 col-xs-12">
                        Judul Buku
                    </div>
                    <div class="col-md-10 col-xs-12">
                            <input type="text" id="judul_buku" class="form-control" placeholder="Judul Buku">
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-md-2 col-xs-12">
                        Kategori Buku
                    </div>
                    <div class="col-md-10 col-xs-12">
                        <select class="form-control js-select2" id="kategori">
                            <option val="" selected default>Pilih Kategori</option>
                            <option>Umum</option>
                            <option>Mesin</option>
                            <option>Konstruksi</option>
                            <option>Listik</option>
                            <option>Auto CAD</option>
                            <option>Kendaraan Ringan</option>
                            <option>Elektro</option>
                        </select>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-md-2 col-xs-12">
                        Nama Pengarang Buku
                    </div>
                    <div class="col-md-10 col-xs-12">
                            <input type="text" id="pengarang" class="form-control" placeholder="Pengarang">
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-md-2 col-xs-12">
                    Ringkasan Buku
                    </div>
                    <div class="col-md-10 col-xs-12">
                            <textarea type="text" id="ringkasan" class="form-control" placeholder="Ringkasan"></textarea>
                    </div>
                </div>

                <hr />

                <div class="row form-row">
                    <div class="col-md-2 col-xs-12">
                        <div class="thumbnail-box" id="cover-data">
                            <p class="text-info thumbnail"><i class="fas fa-book"></i>
                            <br />
                            Cover Buku</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        Upload Cover :
                        <p class="text-muted">Ukuran maksimal <strong>10 MB</strong>. Ekstensi png, jpg, atau jpeg</p>
                        <input type="file" id="cover">
                        <hr />

                        Input File pdf:
                        <p class="text-muted">Ukuran maksimal <strong>10 MB</strong>. Ekstensi PDF</p>
                        <input type="file" id="pdf">

                    </div>
                    <div class="col-md-3 col-sm-12">

                    </div>
                    <div class="col-md-4 col-sm-12">
                        <button class="btn btn-primary btn-block" id="simpan"><i class="fas fa-fw fa-save"></i> Simpan</button>

                        <button class="btn btn-success btn-block" id="cari"><i class="fas fa-fw fa-list"></i> Daftar Buku</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.js-select2').select2();
});

$('#cover').change(() => {
    const file = $('#cover')[0].files[0]

    if (file.size <= 10000000) {
        if (file.type == 'image/jpeg' || file.type == 'image/png') {
            var reader = new FileReader();

            reader.onload = e => {
                $('#cover-data').html(`<img src="${e.target.result}" width="100%">`);
                $('#cover-data > img').addClass('thumbnail');
            }
            
            reader.readAsDataURL(file)
        } else {
            toastr.error('Harap masukkan gambar dengan ekstensi jpg, jpeg, atau png', 'Tipe file salah');
            $('#cover').val('')
            file = null;
        }
    } else {
        toastr.error('Silahkan masukkan pdf maksimal 10MB');
        $('#cover').val('')
        file = null
    }

});

$('#pdf').change(() => {
    if ($('#pdf')[0].files[0].size >= 10000000) {
        toastr.error('Harap masukkan file berukuran maksimal 10 MB', 'Ukuran terlalu besar');
        $('#pdf')[0].files[0] = null;
        $('#pdf').val('')
    }

    if ($('#pdf')[0].files[0].type != 'application/pdf') {
        toastr.error('Harap masukkan file dengan ekstensi pdf', 'Tipe file salah');
        $('#pdf')[0].files[0] = null
        $('#pdf').val('')
    }
})

$('#simpan').click(() => {
    const judul_buku    = $('#judul_buku').val();
    const kategori      = $('#kategori').val();
    const pengarang     = $('#pengarang').val();
    const ringkasan     = $('#ringkasan').val();

    const data = {judul_buku, kategori, pengarang}

    const cover = $('#cover')[0].files[0];

    const pdf   = $('#pdf')[0].files[0];

    var form_data   = new FormData();
    form_data.append('judul_buku', judul_buku)
    form_data.append('kategori', kategori)
    form_data.append('pengarang', pengarang)
    form_data.append('ringkasan', ringkasan)
    form_data.append('cover', cover)
    form_data.append('pdf', pdf)

    $.ajax({
        url : "<?= api('buku/tambah') ?>",
        type: "POST",
        data : form_data,
        processData: false,
        contentType: false,
        success:function(){
            toastr.success('Berhasil menambahkan data');
            
            window.location.href= "<?= base_url('cari-buku') ?>";
        },
        error: function(jqXHR, textStatus, errorThrown){
            //if fails    
            toastr.error('Gagal menambahkan data') 
        }
    });
});

$('#cari').click(() => {
    window.location.href="<?= base_url('books/data_buku') ?>"
})
</script>

<style>
    .form-row {
        padding: 10px 0;
    }

    .thumbnail-box {
        width: 150px;
        height: 200px;
        border: 3px dotted white;
        padding: 5px;
        position: relative;
        text-align: center;
    }

    .thumbnail {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    select .form-control {
        color: black;
    }
</style>