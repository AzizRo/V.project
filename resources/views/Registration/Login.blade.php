
<!DOCTYPE html>
<html lang="ar" dir="rtl" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دخول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/Sign-in.css')}}">
    <link rel="stylesheet" href="{{asset('css/Styling.css')}}">

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar-dark py-3 fixed-top" style="background-color: #39c095;">
    <div class="container">
        <a href="{{url('/')}}" class="navbar-brand ">منصة متطوع</a>
    </div>
</nav>


<!-- Sign-in Form -->
<section class="vh-100">

    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">

            <!-- Image -->
            <div class="col-md-4 col-lg-6 col-xl-5 d-none d-md-block  ">
                <img src="img/sign-in.svg" class="img-fluid" alt="">
            </div>

            <!-- Text -->
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('info'))
                    <div class="alert alert-danger">
                        {{ session('info') }}
                    </div>
                @endif
                <form action="{{route('Login')}}" method="post">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">دخول </p>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0"></p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4" >
                        <input type="email" dir="ltr"   id="form3Example3" class="form-control form-control-lg @error('email') border-danger @endif" value="{{old('email')}}"
                               name="email"/>
                        <label class="form-label " for="form3Example3">الايميل الجامعي</label>
                        @error('email')
                        <div class="text-danger  text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>



                    <!-- Password input -->
                    <div class="form-outline mb-3" >
                        <input type="password" dir="ltr"id="form3Example4" class="form-control form-control-lg @error('password') border-danger @endif"
                              name="password"/>
                        <label class="form-label" for="form3Example4">كلمة المرور</label>
                        @error('password')
                        <div class="text-danger  text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Checkbox -->
                    <div class="d-flex justify-content-between align-items-center" dir="ltr">
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3"  />
                            <label class="form-check-label" for="form2Example3">
                                تذكرني
                            </label>
                        </div>
                        <a href="{{route('forget.password.get')}}" class="text-body">نسيت كلمة المرور?</a>
                    </div>

                    <!-- Text-->
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn text-light btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #39c095;">دخول</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">لاتملك حساب ? <a  href="{{route('Register')}}"
                                                                                          style="color: #39c095;">تسجيل</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <footer class="p-2 text-white text-center align-items-center" style="background-color:#39c095 ;">
        <div class="container">
            <p class="p-2 mt-2" >حقوق النشر © 2021 جامعة نجران</p>
        </div>
    </footer>

</section>


<!-- Script -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous">
</script>

</body>
</html>
