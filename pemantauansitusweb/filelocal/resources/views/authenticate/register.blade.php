@extends('layouts.side')
@section('authenticate')
<!-- login area start -->
<div class="login-area login-bg">
    <div class="container">
        <div class="login-box ptb--100">
            <form novalidate="novalidate" role="form" id="registerform">
                <div class="login-form-head">
                    <h4>Daftar</h4><hr>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="name">Nama Pengguna</label>
                        <input class="user-icon" type="text" id="name" name="name">
                    </div>
                    <div class="form-gp">
                        <label for="email">Alamat Surel</label>
                        <input class="email-icon" type="email" id="email" name="email">
                    </div>
                    <div class="form-gp">
                        <label for="password">Kata Kunci</label>
                        <input class="lock-icon" type="password" id="password" name="password">
                    </div>
                    <div class="form-gp">
                        <label for="password_confirmation">Konfirmasi Kata Kunci</label>
                        <input class="lock-icon" type="password" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="submit-btn-area">
                        <button id="registersubmit" type="submit">Simpan </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->
@endsection