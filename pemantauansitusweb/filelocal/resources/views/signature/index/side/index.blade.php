@extends('layouts.side')
@section('content')
<!-- data table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div id="signaturecontent">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title">Data Tanda Tangan</h4>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-custom btn-primary pull-right add" data-toggle="modal" data-target="#signaturemodal" id="addsignature" href="#" role="button">Tambah</a>
                    </div>
                </div>
                <hr>
                <div class="data-tables">
                    <table id="signaturetable" class="table table-striped table-bordered"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data table end -->
@include('signature.form.form')
@endsection