<html lang="ar"  dir="rtl"><head>

    <meta charset="utf-8">
    <title>Volunteer Work Gate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="NVG" name="description">
    <meta content="NVG" name="keywords">
    <meta content="NVG" name="author">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/kendo/kendo.rtl.min.css">
    <link rel="stylesheet" href="css/Profile.css">

    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400&amp;display=swap" rel="stylesheet">

    <link href="/css/ltr.css" rel="stylesheet">
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

        <span class="loading__anim"></span>
    </div>


</div>




    <style>


    </style>
    <div class="">



        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg  navbar-light py-3 f">
            <div class="container">
                <!-- Image -->
                <a href="{{route('home')}}" class=" d-none d-sm-block
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
                                <a href="{{url("profile")}}" class="dropdown-item">لوحة المعلومات الشخصية</a>
                                @auth()
                                    @role("volunteer provider")
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route("CreateWork")}}" class="dropdown-item">انشاء فرصة جديدة</a>
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
    <!--This message appear when a user update his account  -->
    @if (session('success') )
        <div class="container ">
            <div class="row container justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="alert alert-success  text-center">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="">
        <div id="apprun-app">


<div class="container margin_top_small">
    <div class="text-center">

    </div>

    <!-- update account form -->
    <form method= "POST" action ="{{route("Account/update")}}">
        @csrf
        <input type="hidden" name="cid" value="{{ Auth::user()->id }}">
        <div class="row">
            <!-- hide in small screens -->
            <div class="col-lg-4 col-md-12 col-sm-12 hide_small_screen">
                <div class="options">
                    <a href="{{url("AcoountInformation")}}"><button id="personalBtn" type="button" onclick="showOption(this.id)" class="option_text activeBtn">معلومات الحساب</button></a>
                    <hr>
                    @role('volunteer provider')
                    <a href="{{url("MyVolunteerWorks")}}"><button id="healthBtn" type="button" onclick="showOption(this.id)" class="option_text">الفرص المنشئة الخاصة بي</button></a>
                    @endrole
                    <hr>
                    @role('certificate')
                    <a href="{{url("ApproveMyOpportunity")}}"><button id="healthBtn" type="button" onclick="showOption(this.id)" class="option_text">الموافقة على الفرص المنشئة الخاصة بي </button></a>
                    @endrole
                    <hr>
                    @role('volunteer')
                    <a href="{{url("MyVolunteerOpportunities")}}"><button id="healthBtn" type="button" onclick="showOption(this.id)" class="option_text">فرص التطوع الخاصة بي</button></a>
                    @endrole
                    <hr>
                    <a href="{{url("certificate")}}"><button id="educationBtn" type="button" onclick="window.location.href='/Account/AdvancedProfile'" class="option_text">الشهادات التطوعية</button></a>
                </div>
            </div>
            <!-- account information -->

            <div id="account" class="col-lg-6 col-md-12 col-sm-12">
                <button class="collapse_small_btn" type="button" data-toggle="collapse" data-target="#collapseAccount" aria-expanded="false" aria-controls="collapseExample">
                    معلومات الحساب
                </button>
                <div class="form toBeCollapse" id="collapseAccount">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12" >
                            @auth

                                <p class="help-block">اسم المستخدم</p>
                                <input class="update_input with_placeholder" name="username" id="username" value="{{ Auth::user()->username }}" type="text"  disabled>

                        </div>

                    </div>
                    <!-- email -->
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <p class="help-block">الايميل الجامعي</p>
                            <input type="email" id="email" name="email"  class="update_input with_placeholder"  value="{{ Auth::user()->email }}" disabled>

                        </div>
                        <!-- Major -->
                        <div class="col-lg-5 col-md-12 col-sm-12" >

                            <label class="control-label"  for="Major">التخصص</label>
                            <select class="update_input with_placeholder @error('Select') border-danger @endif" aria-label="Default select example" id="Major" name="Select" value="0" {{Auth::user()->Select == '0' ? 'checked' : ''}}>

                                <option value="Computer Sceience" @if (Auth::user()->Select == "Computer Sceience") {{ 'selected' }} @endif >Computer Sceience</option>
                                <option value="Information System" @if (Auth::user()->Select== "Information System") {{ 'selected' }} @endif>Information System</option>
                                <option value="Software Engneering" @if (Auth::user()->Select== "Software Engneering") {{ 'selected' }} @endif>Software Engneering</option>
                            </select>
                            @error('Select')
                            <div class="text-danger  text-sm">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>
                    <!-- phone number -->

                    <div class = "row">
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <p class="help-block">رقم الجوال</p>
                            <input type="text" id="phone_no" name="phone_no" placeholder="ادخل رقم الجوال" class="update_input with_placeholder @error('phone_no') border-danger @endif" value="{{ Auth::user()->phone_no }}">
                            @error('phone_no')
                            <div class="text-danger  text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @endauth

                <!-- reset_password -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <hr>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <a href="{{route('forget.password.get')}}" class="reset_password btn_to_a">تحديت كلمة المرور</a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <hr>
                        </div>
                    </div>
                    <!-- save_btn -->
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

</body></html>
