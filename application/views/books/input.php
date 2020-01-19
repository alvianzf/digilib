<h1>Input Data Buku</h1>
<p>Form untuk melakukan input data buku di perpustakaan digital</p>

<hr />

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
                <div class="form-label-group">
                    <input type="text" id="judul_buku" class="form-control">
                    <label for="judul_buku">Judul Buku</label>
                </div>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-md-2 col-xs-12">
                Kategori Buku
            </div>
            <div class="col-md-10 col-xs-12">
                <div class="form-label-group">
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
        </div>
        <div class="row form-row">
            <div class="col-md-2 col-xs-12">
                Nama Pengarang Buku
            </div>
            <div class="col-md-10 col-xs-12">
                <div class="form-label-group">
                    <input type="text" id="pengarang" class="form-control">
                    <label for="pengarang">Nama Pengarang Buku</label>
                </div>
            </div>
        </div>

        <div class="row form-row">
            <div class="col-md-2 col-xs-12">
            Ringkasan Buku
            </div>
            <div class="col-md-10 col-xs-12">
                <div class="form-label-group">
                    <textarea type="text" id="ringkasan" class="form-control"></textarea>
                </div>
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
                <input type="file" id="cover" class="form-control">
                <hr />

                Input file pdf:
        
                <input type="file" id="pdf" class="form-control">

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

<script>
$(document).ready(function() {
    $('.js-select2').select2();
});

$('#cover').change(() => {
    const file = $('#cover')[0].files[0]

    var reader = new FileReader();

    reader.onload = e => {
        $('#cover-data').html(`<img src="${e.target.result}" width="100%">`);
    }
    
    reader.readAsDataURL(file)
});

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
        $('#judul_buku').val('')
        $('#kategori').val('').trigger('change');
        $('#pengarang').val('')
        $('#pdf').val('')
        $('#cover').val('')
        $('#cover-data').html('<p class="text-info thumbnail"><i class="fas fa-book"></i><br />Cover Buku</p>');
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
        border: 3px dotted black;
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
</style>