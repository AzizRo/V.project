<html lang="ar" dir="rtl"><head>
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
    <style>
    </style>




    <meta charset="utf-8">
    <title>Volunteer Work Gate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="NVG" name="description">
    <meta content="NVG" name="keywords">
    <meta content="NVG" name="author">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/kendo/kendo.rtl.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/Profile.css")}}">
    <link rel="stylesheet" href="{{asset("css/Create-VolunteeringWork.css")}}">

    <style>


    </style>
    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400&amp;display=swap" rel="stylesheet">

    <link href="{{asset("/css/ltr.css")}}" rel="stylesheet">
    <style></style></head>
<body >

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PGJ397C"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->



<div id="full_loader_overlay" style="display: none;">

    <div>
        <span id="wisdom">  Volunteering in the service of our country ... giving and building to our society </span>
        <span id="author" class="loading__author"> Volunteer Work Gate </span>
        <br>
        <span class="loading__anim"></span>
    </div>


</div>




<style>


</style>
<div class="">


    <nav class="navbar navbar-expand-lg  navbar-light py-3 f">
        <div class="container">
            <a href="{{url('Admin2')}}" class=" d-none d-sm-block
                ">
                <img height="100" src="/img/logoAr.png">
            </a>
            <a href="" class=" d-block d-sm-none">
                <img height="75" src="/img/logoAr.png">
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navmenu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav me-auto ">
                    <!-- Nav-item1 -->

                    <li class="nav-item dropdown">
                        <a href="opportunies" class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >الفرص التطوعية</a>
                        <div class="dropdown-menu">
                            <a href="{{route('home')}}" class="dropdown-item">الفرص الحالية</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('Finished')}}" class="dropdown-item">الفرص المنتهية</a>
                        </div>
                    </li>
                    <!-- Nav-item2 -->

                    <li class="nav-item dropdown">
                        @auth()
                            <a href="opportunies" class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >{{ Auth::user()->username }}</a>
                        @endauth
                        <div class="dropdown-menu">
                            <a href="{{url("Admin2/profile")}}" class="dropdown-item">لوحة المعلومات الشخصية</a>
                            @auth()
                                @role("admin")
                                <div class="dropdown-divider"></div>
                                <a href="{{url("users")}}" class="dropdown-item">المستخدمين</a>
                                @endrole
                                @role("admin")
                                <div class="dropdown-divider"></div>
                                <a href="{{route("admin.certificates")}}" class="dropdown-item">الموافقة على الشهادات</a>
                                @endrole

                                <div class="dropdown-divider"></div>
                                <form action="{{route('logout')}}" method="post" >
                                    @csrf

                                    <button type="submit" class="dropdown-item"   role="button" aria-haspopup="true" aria-expanded="false" >تسجيل خروج</button>

                                </form>

                            @endauth
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
<!--This message appear when a admin update his account  -->
@if (session('updateA') )
    <div class="container ">
        <div class="row container justify-content-center">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="alert alert-success  text-center">
                    {{ session('updateA') }}
                </div>
            </div>
        </div>
    </div>
@endif


<div class="">
    <div id="apprun-app" >






        <div class="container margin_top_small">
            <div class="text-center">

            </div>



            <form method= "POST" action ="{{route("Admin2/profile/update")}}">
                @csrf

                <input type="hidden" name="cid" value="{{ Auth::user()->id }}">
                <div class="row">
                    <!-- hide in small screens -->


                    <div id="account" class="col-lg-6 col-md-12 col-sm-12">

                        <div class="form toBeCollapse" id="collapseAccount">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12" >
                                    @auth

                                        <p class="help-block">اسم المستخدم</p>
                                        <input class="update_input with_placeholder" name="username" id="username" value="{{ Auth::user()->username }}" type="text" placeholder="Your Name" required>
                                        @error('username')
                                        <div class="text-danger  text-sm">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <p class="help-block">الايميل</p>
                                    <input type="email" id="email" name="email" placeholder="University Email" class="update_input with_placeholder @error('email') border-danger @endif" value="{{ Auth::user()->email }}">
                                    @error('email')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <p class="help-block">رقم الجوال</p>
                                    <input type="text" id="phone_no" name="phone_no" placeholder="Phone Number" class="update_input with_placeholder @error('phone_no') border-danger @endif" value="{{ Auth::user()->phone_no }}">

                                </div>
                                @endauth
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <a href="/Account/ResetPassword" class="reset_password btn_to_a">اعادة كلمة المرور</a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <button type="submit"  class="save_btn">تحديث</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>




    <footer>

    </footer>


</div>







<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </div></div></body>
</html>
