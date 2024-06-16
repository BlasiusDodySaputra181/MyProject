<div class="modal fade bd-example-modal-lg" id="reportmodal" tabindex="-1" role="dialog" aria-labelledby="reportmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-flat">
      <div class="modal-header">
        <h5 class="modal-title" id="reportmodallabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="novalidate" role="form" id="reportform">
      <div class="modal-body">
      <div class="form-modal">
        <label for="reportstatus" class="col-form-label">Status:</label>
          <select id="reportstatus" name="reportstatus" class="custom-select custom-flat col-md-12">
            <option value="=">=</option>
            <option value="Update">Update</option>
            <option value="Tidak Update">Tidak Update</option>
          </select>
      </div>
      <div class="form-modal">
        <label for="reportdateupdate" class="col-form-label">Tanggal:</label>
          <input class="form-control custom-flat calendar-icon" type="text" name="reportdateupdate" id="reportdateupdate" placeholder="tttt-bb-hh">
      </div>
      <div class="form-modal">
        <label for="reportinformation" class="col-form-label">Keterangan:</label>
          <textarea class="form-control custom-flat" name="reportinformation" id="reportinformation"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <div id="loadreport"></div>
        <button type="submit" class="btn btn-custom btn-success" id="buttonreport">Simpan</button>
        <button type="button" class="btn btn-custom btn" data-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>