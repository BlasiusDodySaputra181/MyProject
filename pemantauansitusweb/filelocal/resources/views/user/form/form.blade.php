<div class="modal fade bd-example-modal-lg" id="usermodal" tabindex="-1" role="dialog" aria-labelledby="usermodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-flat">
      <div class="modal-header">
        <h5 class="modal-title" id="usermodallabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="novalidate" role="form" id="userform">
      <div class="modal-body">
        <div class="form-modal">
          <label for="username" class="col-form-label">Nama Pengguna:</label>
            <input class="form-control custom-flat" type="text" name="username" id="username">
        </div>
        <div class="form-modal">
          <label for="useremail" class="col-form-label">Alamat Surel:</label>
            <input class="form-control custom-flat" type="email" name="useremail" id="useremail">
        </div>
        <div class="form-modal">
          <label for="userpassword" class="col-form-label">Kata Kunci:</label>
            <input class="form-control custom-flat" type="password" name="userpassword" id="userpassword">
        </div>
      </div>
      <div class="modal-footer">
        <div id="loaduser"></div>
        <button type="submit" class="btn btn-custom btn-success" id="buttonuser">Simpan</button>
        <button type="button" class="btn btn-custom btn" data-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>