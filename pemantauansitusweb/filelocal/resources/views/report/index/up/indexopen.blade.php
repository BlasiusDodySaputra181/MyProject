@extends('layouts.up')
@section('content')
<!-- data table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div id="reportopencontent">
                <h4 class="header-title" id="titleopen"></h4>
                    <button id="exportexcelbymonth" class="btn btn-custom btn-success export"> Excel</button>
                <hr>
                <div class="data-tables">
                    <table id="horizontalreportopentable" class="table table-striped table-bordered"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data table end -->
@include('report.form.formbydate')
@endsection