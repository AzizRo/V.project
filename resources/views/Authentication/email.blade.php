<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>هل نسيت كلمة المرور</title>
    <link rel="stylesheet" href="{{  asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/my-login.css') }}">
    <link rel="stylesheet" href="{{asset('css/Styling.css')}}">

</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="card-wrapper">

                <div class="card fat" >
                    <div class="card-body">
                        <h4 class="card-title" >هل نسيت كلمة السر</h4>
                        <form method="POST" class="my-login-validation" novalidate="" action="">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('info'))
                                <div class="alert alert-success">
                                    {{ session('info') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="email">عنوان البريد الإلكتروني</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="أدخل عنوان بريدك الإلكتروني">
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    إرسال رابط كلمة المرور
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    حقوق النشر والنسخ &copy; 2021 &mdash; جامعة نجران
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>
