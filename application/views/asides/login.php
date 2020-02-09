
  <!-- Login Modal-->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-lock"></i> Login</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="modal" id="username" class="form-control modal-form" placeholder="Username" required="required" autofocus="autofocus">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="modal-password" id="password" class="form-control" placeholder="Password" required="required">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary" id="login-btn">Login</button>
        </div>
      </div>
    </div>
  </div>

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
                window.location.reload(false);
            }
        }).catch(() => {
            toastr.error('Username atau Password salah!', 'Login Gagal!');
        })
    }

</script>