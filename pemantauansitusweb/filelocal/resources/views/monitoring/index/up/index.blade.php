@extends('layouts.up')
@section('content')
<!-- data table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div id="monitoringcontent">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title">Data Pemantauan Situs Web</h4>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-custom btn-primary pull-right add" data-toggle="modal" data-target="#divisionmodal" id="adddivision" href="#" role="button">Tambah</a>
                    </div>
                </div>
                <form class="form-horizontal" novalidate="novalidate" role="form" id="checkdateupdateform">
                <label for="checkdateupdate" class="col-form-label">Tanggal Pembaruan:</label>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-menus">
                            <input class="form-control custom-flat calendar-icon" type="text" name="checkdateupdate" id="checkdateupdate" placeholder="tttt-bb-hh">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-custom btn-success" id="savedate">Simpan</button>
                    </div>
                </div>
                </form>
                <hr>
                <div class="data-tables">
                    <table id="monitoringtable" class="table table-striped table-bordered"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data table end -->
@include('monitoring.form.form')
@include('monitoring.form.formsub')
@include('report.form.form')
@endsection