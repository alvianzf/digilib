<h1>Profil Ku</h1>
<p>Gunakan fitur ini untuk mengubah data dan password</p>

<hr />


<div class="card">
    <div class="card-header">
        Selamat datang kembali, <i class="fas fa-fw fa-user"></i> <strong><i id="nama-pengguna"><?= $user->nama ?></i></strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                Nama Lengkap
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="form-label-group">
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="form-control" value="<?= $user->nama ?>">
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
                    <input type="text" id="kelas" placeholder="Kelas" class="form-control" value="<?= $user->kelas ?>">
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
                    <input type="tel" min="0" id="nomor_kontak" placeholder="Nomor Kontak" class="form-control" value="<?= $user->nomor_kontak ?>">
                    <label for="nomor_kontak">Nomor Kontak</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-sm-12">
    
            </div>
            <div class="col-md-3 col-sm-12">
                <button id="save-profile" class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<hr />

<div class="card">
    <div class="card-header">
        Ubah informasi untuk pengguna: <i class="fas fa-fw fa-user"></i id="nama-user"> <strong><?= $userdata->username ?></strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                Username
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="form-label-group">
                    <input type="text" id="username" class="form-control" placeholder="Username"  value="<?= $userdata->username ?>">
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

<br />

<script>
 $('#save-profile').click(function (e) { 
    const nama          = $('#nama').val();
    const kelas         = $('#kelas').val();
    const nomor_kontak  = $('#nomor_kontak').val();

    if (validateData(nama, 'nama') && validateData(kelas, 'kelas') && validateNumber(nomor_kontak, 'Nomor Kontak')) {
        const data = {nama, kelas, nomor_kontak}

        $.post("<?= api('profile/edit') . $user->id ?>", data)
        .then(res => {
            toastr.success('Berhasil mengupdate data');
            $('#nama-pengguna').text(nama)
        })
        .catch(err => {
            console.log(err);
            toastr.error('Gagal melakukan update data')
        })
    }
 });

 $('#save').click(() => {
     const username = $('#username').val();
     const password = $('#password').val();

     if (validateData(username, "Username") && validateData(password, "Password")) {
        const data = {username, password}

        $.post("<?= api('profile/user') . $userdata->id ?>")
        .then(res => {
            toastr.success('Berhasil mengubah data');
            $('#nama-user').text(username);
            $('#password').val('');
        })
     }
 });
</script>

<style>

    .row {
        padding: 10px 0;
    }
</style>