<div class="modal fade bd-example-modal-lg" id="signaturemodal" tabindex="-1" role="dialog" aria-labelledby="signaturemodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-flat">
      <div class="modal-header">
        <h5 class="modal-title" id="signaturemodallabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="novalidate" role="form" id="signatureform">
      <div class="modal-body">
        <div class="form-modal">
          <label for="signaturenumber" class="col-form-label">No:</label>
            <input class="form-control custom-flat" type="number" name="signaturenumber" id="signaturenumber">
        </div>
        <div class="form-modal">
          <label for="signatureemployeeidnumber" class="col-form-label">NIP:</label>
            <input class="form-control custom-flat" type="text" name="signatureemployeeidnumber" id="signatureemployeeidnumber">
        </div>
        <div class="form-modal">
          <label for="signaturename" class="col-form-label">Nama:</label>
            <input class="form-control custom-flat" type="text" name="signaturename" id="signaturename">
        </div>
        <div class="form-modal">
          <label for="signatureposition" class="col-form-label">Jabatan:</label>
            <input class="form-control custom-flat" type="text" name="signatureposition" id="signatureposition">
        </div>
      </div>
      <div class="modal-footer">
        <div id="loadsignature"></div>
        <button type="submit" class="btn btn-custom btn-success" id="buttonsignature">Simpan</button>
        <button type="button" class="btn btn-custom btn" data-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>