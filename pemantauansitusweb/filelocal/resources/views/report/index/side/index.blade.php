@extends('layouts.side')
@section('content')
<!-- data table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div id="reportcontent">
                <h4 class="header-title">Laporan Tahunan</h4>
                <label for="reportdescription" class="col-form-label">Uraian:</label>
                <form method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-menus">
                                <select id="reportdescription" name="reportdescription" class="custom-select custom-flat col-md-12">
                                    <option selected="selected" value="pilih">-- Pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="dropdown">
                                <button class="btn btn-custom btn-success dropdown-toggle" type="button" id="buttondropdownprintmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ekspor
                                </button>
                                <div class="dropdown-menu custom-flat" aria-labelledby="buttondropdownprintmenu">
                                    <a class="dropdown-item" href="#" id="excelreport">Excel (.xlsx)</a>
                                    <a class="dropdown-item" href="#" id="wordreport">Word (.docx)</a>
                                    <a class="dropdown-item" href="#" id="pdfreport">PDF (.pdf)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="data-tables">
                    <table id="reporttable" class="table table-striped table-bordered"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data table end -->
@include('report.form.formbymonthandyear')
@endsection