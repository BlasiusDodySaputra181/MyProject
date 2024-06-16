<div class="modal fade bd-example-modal-lg" id="divisionmodal" tabindex="-1" role="dialog" aria-labelledby="divisionmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-flat">
      <div class="modal-header">
        <h5 class="modal-title" id="divisionmodallabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="novalidate" role="form" id="divisionform">
      <div class="modal-body">
        <div class="form-modal">
          <label for="divisionnumber" class="col-form-label">No:</label>
            <input class="form-control custom-flat" type="number" name="divisionnumber" id="divisionnumber">
        </div>
        <div class="form-modal">
          <label for="divisiondescription" class="col-form-label">Uraian:</label>
            <input class="form-control custom-flat" type="text" name="divisiondescription" id="divisiondescription">
        </div>
        <div class="form-modal">
          <label for="divisionlinkwebsite" class="col-form-label">Alamat Situs Web:</label>
            <input class="form-control custom-flat" type="url" name="divisionlinkwebsite" id="divisionlinkwebsite">
        </div>
        <div class="form-modal">
          <label for="divisionagenciesid" class="col-form-label">Instansi:</label>
            <select name="divisionagenciesid" id="divisionagenciesid" class="custom-select custom-flat col-md-12"></select>
        </div>
      </div>
      <div class="modal-footer">
        <div id="loaddivision"></div>
        <button type="submit" class="btn btn-custom btn-success" id="buttondivision">Simpan</button>
        <button type="button" class="btn btn-custom btn" data-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>