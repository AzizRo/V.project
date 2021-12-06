<html lang="ar"  dir="rtl"><head>
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
    <style>
    </style>




    <meta charset="utf-8">
    <title>لوحة المعلومات الشخصية</title>
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


                    <!-- Nav-item3 -->
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
<div class="">
    <div id="apprun-app">


        <style>

        </style>



        <div class="container margin_top_small">
            <div class="text-center">

            </div>
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


            <form method= "POST" action ="{{route("profile/update")}}">
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
                            @role('volunteer')
                            <a href="{{url("MyVolunteerOpportunities")}}"><button id="healthBtn" type="button" onclick="showOption(this.id)" class="option_text">فرص التطوع الخاصة بي</button></a>
                            @endrole
                            <hr>
                            <a href="{{url("certificate")}}"><button id="educationBtn" type="button" onclick="window.location.href='/Account/AdvancedProfile'" class="option_text">الشهادات التطوعية</button></a>
                        </div>
                    </div>

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

                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <p class="help-block">الايميل الجامعي</p>
                                    <input type="email" id="email" name="email"  class="update_input with_placeholder"  value="{{ Auth::user()->email }}" disabled>

                                </div>
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
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <a href="/Account/ResetPassword" class="reset_password btn_to_a">تحديت كلمة المرور</a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <button type="submit" style="background: #036A3B"  class="save_btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                    <div id="personal" class="col-lg-8 col-md-12 col-sm-12" style="display: none">
                        <button class="collapse_small_btn" type="button" data-toggle="collapse" data-target="#collapsePersonal" aria-expanded="false" aria-controls="collapseExample">
                            Personal Information
                        </button>
                        <div class="form toBeCollapse" id="collapsePersonal">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <input class="update_input" name="Volunteer.MaritalStatus" readonly="" value="أعزب" type="text">
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <input class="update_input" name="Volunteer.Gender" readonly="" value="ذكر" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <select id="citySelect" name="Volunteer.CityId" class="form-control update_input" required="">
                                        <option value="" selected="" disabled=""> You must choose a city</option>
                                        <option value="1">مظيلف</option>
                                        <option value="2">المذنب</option>
                                        <option value="3">أملج</option>
                                        <option value="4">بلجرشي</option>
                                    </select>
                                    <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <input class="update_input" name="Volunteer.Nationality" readonly="" value="سعودي" type="text">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <button type="button" onclick="submitForm()" class="save_btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- TODO: Add  style="display: none" in below div -->
                    <div id="health" class="col-lg-6 col-md-12 col-sm-12" style="display: none">
                        <button class="collapse_small_btn" type="button" data-toggle="collapse" data-target="#collapseHealth" aria-expanded="false" aria-controls="collapseExample">
                            MyVolunteerWork
                        </button>
                        <div class="form toBeCollapse" id="collapseHealth">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group m-form__group">
                                        <select class="form-control update_input" name="Volunteer.BloodGroupType" id="BloodGroupType" required="" data-val="true" data-val-required="The BloodGroupType field is required."><option value="1">+A</option>
                                            <option value="2">-A</option>
                                            <option value="3">+B</option>
                                            <option value="4">-B</option>
                                            <option selected="selected" value="5">+O</option>
                                            <option value="6">-O</option>
                                            <option value="7">+AB</option>
                                            <option value="8">-AB</option>
                                        </select>
                                    </div>

                                    <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                                </div>

                            </div>


                        </div>
                    </div>

                    <!-- TODO: Add  style="display: none" in below div -->
                    <div id="teams" class="col-lg-8 col-md-12 col-sm-12" style="display: none">
                        <button class="collapse_small_btn" type="button" data-toggle="collapse" data-target="#collapseTeams" aria-expanded="false" aria-controls="collapseExample">
                            Statistics
                        </button>
                        <div class="form toBeCollapse" id="collapseTeams">
                            <div class="row">



                            </div>
                        </div>
                    </div>

                    <!-- TODO: Add  style="display: none" in below div -->
                    <div id="teams" class="col-lg-8 col-md-12 col-sm-12" style="display: none">
                        <button class="collapse_small_btn" type="button" data-toggle="collapse" data-target="#collapseTeams" aria-expanded="false" aria-controls="collapseExample">
                            Certifcates
                        </button>
                        <div class="form toBeCollapse" id="collapseTeams">
                            <div class="row">



                            </div>
                        </div>
                    </div>
                </div>
                <input name="__RequestVerificationToken" type="hidden" value="CfDJ8ICO8GpWJxxDrG0exzfUJEibwXQO2yQB9QnoOgP3B8UtEnMnzhL9cEvXWjBcqRuemxgJvguld9csQNbJk28iMhNG5wc3lgl2o9fmPZvwof9oon4kWFnmUcxXL0oRavQXISW9OqGSplt_6dsRp_omJguuESIpRQXU8SWaRAZB5cSXmOks9FqQ0k9uvOgKt8sjEw">
        </div>





        <footer>

        </footer>


    </div>







<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>
