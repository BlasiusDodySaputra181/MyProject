<div class="modal fade bd-example-modal-lg" id="agencymodal" tabindex="-1" role="dialog" aria-labelledby="agencymodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content custom-flat">
      <div class="modal-header">
        <h5 class="modal-title" id="agencymodallabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" novalidate="novalidate" role="form" id="agencyform">
        <div class="modal-body">
          <div class="form-modal">
            <label for="agencydescription" class="col-form-label">Deskripsi:</label>
              <textarea class="form-control custom-flat" name="agencydescription" id="agencydescription"></textarea>
          </div> 
        </div>
        <div class="modal-footer">
          <div id="loadagency"></div>
          <button type="submit" class="btn btn-custom btn-success" id="buttonagency">Simpan</button>
          <button type="button" class="btn btn-custom btn" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>