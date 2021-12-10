<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>إعادة تعيين كلمة المرور</title>
    <link rel="stylesheet" href="{{  asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/my-login.css') }}">
    <link rel="stylesheet" href="{{asset('css/Styling.css')}}">

</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="card-wrapper">

                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">إعادة تعيين كلمة المرور</h4>
                        <form method="POST" class="my-login-validation" novalidate="" action="{{ route('reset.password.post') }}">
                            @csrf
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email">عنوان البريد الإلكتروني</label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="أدخل عنوان بريدك الإلكتروني" value="{{ $email ?? old('email') }}">
                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة مرور جديدة</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="أدخل  كلمة الجديدة">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">تأكيد كلمة المرور الجديدة</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="أدخل تأكيد كلمة المرور">
                                <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    إعادة تعيين كلمة المرور
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    Copyright &copy; 2021 &mdash; Najran University
                </div>
            </div>
        </div>
    </div>
</section>

<script src="jquery-3.4.1.min.js"></script>
<script src="bootstrap/js/popper.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/my-login.js"></script>
</body>
</html>
