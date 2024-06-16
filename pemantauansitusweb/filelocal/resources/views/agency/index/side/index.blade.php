@extends('layouts.side')
@section('content')
<!-- data table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div id="agencycontent">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title">Data Instansi</h4>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-custom btn-primary pull-right add" data-toggle="modal" data-target="#agencymodal" id="addagency" href="#" role="button">Tambah</a>
                    </div>
                </div>
                <hr>
                <div class="data-tables">
                    <table id="agencytable" class="table table-striped table-bordered"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data table end -->
@include('agency.form.form')
@endsection