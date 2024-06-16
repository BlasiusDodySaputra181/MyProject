@extends('layouts.side')
@section('content')
<!-- data table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div id="reportopendetailcontent">
                <h4 class="header-title" id="titleopendetail"></h4>
                    <button id="wordreportbydate" class="btn btn-custom btn-primary export"> Word</button>
                    <button id="pdfreportbydate" class="btn btn-custom btn-danger export"> PDF</button>
                    <button id="excelreportbydate" class="btn btn-custom btn-success export"> Excel</button>
                <hr>
                <div class="data-tables">
                    <table id="reportopendetailtable" class="table table-striped table-bordered"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data table end -->
@include('report.form.form')
@endsection