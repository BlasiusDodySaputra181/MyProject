@extends('layouts.side')
@section('authenticate')
<!-- login area start -->
<div class="login-area login-bg">
    <div class="container">
        <div class="login-box ptb--100">
            <form novalidate="novalidate" role="form" id="loginform">   
                <div class="login-form-head">
                    <div class="loginimages">
                        <h4>DISKOMINFO</h4><hr>
                    </div>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <div id="errormessage">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong id="error"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></strong>
                            </div>
                        </div>
                    </div>
                    <div class="form-gp">
                        <label for="name">Nama Pengguna</label>
                        <input class="user-icon" type="text" id="name" name="name">
                    </div>
                    <div class="form-gp">
                        <label for="password">Kata Kunci</label>
                        <input class="lock-icon" type="password" id="password" name="password">
                    </div>
                    <div class="submit-btn-area">
                        <button id="loginsubmit" type="submit">Masuk </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->
@endsection