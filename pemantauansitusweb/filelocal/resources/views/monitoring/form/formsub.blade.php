<div class="modal fade bd-example-modal-lg" id="subdivisionmodal" tabindex="-1" role="dialog" aria-labelledby="subdivisionmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-flat">
      <div class="modal-header">
        <h5 class="modal-title" id="subdivisionmodallabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="novalidate" role="form" id="subdivisionform">
      <div class="modal-body">
        <div class="form-modal">
          <label for="subdivisionnumber" class="col-form-label">No:</label>
            <input class="form-control custom-flat" type="number" name="subdivisionnumber" id="subdivisionnumber">
        </div>
        <div class="form-modal">
          <label for="subdivisiondescription" class="col-form-label">Uraian:</label>
            <input class="form-control custom-flat" type="text" name="subdivisiondescription" id="subdivisiondescription">
        </div>
        <div class="form-modal">
          <label for="subdivisionlinkwebsite" class="col-form-label">Alamat Situs Web:</label>
            <input class="form-control custom-flat" type="url" name="subdivisionlinkwebsite" id="subdivisionlinkwebsite">
        </div>
      </div>
      <div class="modal-footer">
        <div id="loadsubdivision"></div>
        <button type="submit" class="btn btn-custom btn-success" id="buttonsubdivision">Simpan</button>
        <button type="button" class="btn btn-custom btn" data-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>