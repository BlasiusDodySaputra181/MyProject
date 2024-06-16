<div class="modal fade bd-example-modal-lg" id="reportbydatemodal" tabindex="-1" role="dialog" aria-labelledby="reportbydatemodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-flat">
      <div class="modal-header">
        <h5 class="modal-title" id="reportbydatemodallabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="novalidate" role="form" id="reportbydateform">
      <div class="modal-body">
        <div class="form-modal">
            <label for="reportbydatedateupdate" class="col-form-label">Tanggal:</label>
              <input class="form-control custom-flat calendar-icon" type="text" name="reportbydatedateupdate" id="reportbydatedateupdate">
        </div>
      </div>
      <div class="modal-footer">
        <div id="loadreportbydate"></div>
        <button type="submit" class="btn btn-custom btn-success" id="buttonreportbydate">Simpan</button>
        <button type="button" class="btn btn-custom btn" data-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>