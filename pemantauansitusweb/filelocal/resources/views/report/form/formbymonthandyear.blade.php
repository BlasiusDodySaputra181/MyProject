<div class="modal fade bd-example-modal-lg" id="reportbymonthandyearmodal" tabindex="-1" role="dialog" aria-labelledby="reportbymonthandyearmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-flat">
      <div class="modal-header">
        <h5 class="modal-title" id="reportbymonthandyearmodallabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="novalidate" role="form" id="reportbymonthandyearform">
      <div class="modal-body">
          <div class="form-modal">
            <label for="reportbymonth" class="col-form-label">Bulan:</label>
              <input class="form-control custom-flat calendar-icon" type="text" name="reportbymonth" id="reportbymonth" placeholder="MM">
          </div>
          <div class="form-modal">
            <label for="reportbyyear" class="col-form-label">Tahun:</label>
              <input class="form-control custom-flat calendar-icon" type="text" name="reportbyyear" id="reportbyyear" placeholder="tttt">
          </div>
          <!-- <div class="form-modal">
            <label for="monthandyear" class="col-form-label">Bulan Update:</label>
              <input class="form-control custom-flat calendar-icon" type="text" name="monthandyear" id="monthandyear" placeholder="MM tttt">
          </div> -->
      </div>
      <div class="modal-footer">
        <div id="loadreportbymonthandyear"></div>
        <button type="submit" class="btn btn-custom btn-success" id="buttonreportbymonthandyear">Simpan</button>
        <button type="button" class="btn btn-custom btn" data-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>