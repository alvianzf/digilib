<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pustaka Digital - Login</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">

  <!-- <script src="assets/js/jquery.min.js"></script> -->
  

</head>

<!-- <body class="bg-dark"> -->
  <body class="bg-lib">

  <div class="container">
    <center>
      <img src="<?= base_url('assets/img/smk3.gif') ?>" width="20%">
    </center>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><i class="fa fa-lock-open"></i> Perpustakaan Digital SMK N 3 Tanjungpinang</div>
      <div class="card-body">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="Password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" id="login-btn">Login</button>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Toastr -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>

<script>

$('#login-btn').click(() => {
    const username = $('#username').val();
    const password = $('#password').val();

    login({username, password})
});

$('#password').on('keypress', (e) => {
    if(e.which == 13) {
        const username = $('#username').val();
        const password = $('#password').val();
    
        login({username, password})
    }
});

$('#username').on('keypress', (e) => {
    if (e.which == 13) {
        const username = $('#username').val();
        const password = $('#password').val();
    
        login({username, password})
    }
});

function login(args) {
    $.post("<?= api('auth/login') ?>", args)
    .then(res => {
        if (res.success) {
            toastr.success('Selamat Datang', 'Berhasil');
            window.location.href = 'beranda';
        }
    }).catch(() => {
        toastr.error('Username atau Password salah!', 'Login Gagal!');
        // alert('Login gagal')
    })
}

</script>

</html>

<style>

  .bg-lib {
    background-image: url("<?= base_url('assets/img/bg.jpg') ?>");
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #cccccc;
  }

  .container {
    margin-top: 5%;
  }

</style>