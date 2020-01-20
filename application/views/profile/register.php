<h1>Tambah Pengguna Baru</h1>

<hr />

<div class="card">
    <div class="card-header">
        Daftar Pengguna Baru
    </div>
    <div class="card-body">
        
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                Nama Lengkap
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="form-label-group">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="form-control">
                    <label for="nama">Nama Lengkap</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-12">
                Kelas
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="form-label-group">
                    <input type="text" id="kelas" placeholder="Kelas" class="form-control">
                    <label for="kelas">Kelas</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-12">
                Nomor Kontak
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="form-label-group">
                    <input type="tel" min="0" id="nomor_kontak" placeholder="Nomor Kontak" class="form-control">
                    <label for="nomor_kontak">Nomor Kontak</label>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<br />

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                Username
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="form-label-group">
                    <input type="text" id="username" class="form-control" placeholder="Username">
                    <label for="username">Username</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-12">
                Password
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="form-label-group">
                    <input type="password" id="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-sm-12">
    
            </div>
            <div class="col-md-3 col-sm-12">
                <button id="save" class="btn btn-danger btn-block"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>

</div>

<script>
 $('#save').click(function (e) { 
    const nama          = $('#nama').val();
    const kelas         = $('#kelas').val();
    const nomor_kontak  = $('#nomor_kontak').val();
    const username      = $('#username').val();
    const password      = $('#password').val();

     if (validateData(username, "Username") && validateData(password, "Password")) {
        if (validateData(nama, 'nama') && validateData(kelas, 'kelas') && validateNumber(nomor_kontak, 'Nomor Kontak')) {
            const data = {nama, kelas, nomor_kontak}
            const user = {username, password}

            $.post("<?= api('auth/register')?>", user)
            .then(res => {
                if (res.result.success) {
                    toastr.success(res.result.message);
                    $.post("<?= api('auth/user_detail') ?>" + res.result.id, data)
                    .then(response => {
                        toastr.success('Berhasil menambahkan biodata pengguna');
                        $('#nama').val('');
                        $('#kelas').val('');
                        $('#nomor_kontak').val('');
                        $('#username').val('');
                        $('#password').val('');
                    })
                    .catch(err => {
                        console.log(err);
                        toastr.error('Gagal melakukan update data')
                    })
                } else {
                    toastr.error(res.error.message, 'Peringatan!')
                }

            }).catch(err => {
                console.log(err)
            })
        }
    }
 });
</script>

<style>
    .row {
        padding: 5px;
    }
</style>