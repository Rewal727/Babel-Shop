@extends('layouts.app')

@section('content')
<div class="register-box">

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Đăng ký thành viên mới</p>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Tên" required autofocus>
                </div>
                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu" required>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="1" required>
                            <label for="agreeTerms">
                                Tôi đồng ý với <a href="#">Điều khoản sử dụng</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
