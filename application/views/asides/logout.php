
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Akhiri Sesi?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan <i>Logout</i> untuk keluar dari sistem</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button class="btn btn-primary" id="logout-btn">Logout</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  
  $('#logout-btn').click(() => {
    $.get("<?= api('auth/logout') ?>")
    .then(res => {
        if (toastr.success('Berhasil keluar dari sistem', 'Logout')) {
          window.location.reload(false);
        }
    })
  });

  </script>