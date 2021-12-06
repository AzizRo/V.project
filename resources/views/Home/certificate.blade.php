<html lang="ar" dir="rtl"><head>
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->





    <meta charset="utf-8">
    <title>Volunteer Work Gate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="NVG" name="description">
    <meta content="NVG" name="keywords">
    <meta content="NVG" name="author">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/kendo/kendo.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/Profile.css')}}">

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #fff;
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/ltr.css')}}">
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
                <div id="account" class="col-lg-12 col-md-12 col-sm-12">
                    <table>
                        <tr>
                            <th>اسم الفرصة التطوعية</th>
                            <th>Description</th>
                            <th>Skills</th>
                            <th>Tasks</th>
                            <th>Benefits</th>
                            <th>Communication</th>
                            <th>تاربخ بداية الفرصة</th>
                            <th>تاريخ نهاية الفرصة</th>
                            <th>Duration</th>
                            <th>ساعات التطوع</th>
                            <th>Gender</th>
                            <th>Major</th>
                            <th>Location</th>
                            <th>Field</th>
                            <th>الحصول على الشهادة التطوعية</th>

                        </tr>
                        @foreach ($MyWorks as $MyWork)
                            <tr>
                                <input hidden="{{$MyWork->WorkID}}">
                                <td>{{$MyWork->Name}}</td>
                                <td>{{$MyWork->Description}}</td>
                                <td>{{$MyWork->Skills}}</td>
                                <td>{{$MyWork->Tasks}}</td>
                                <td>{{$MyWork->Benefits}}</td>
                                <td>{{$MyWork->Communication}}</td>
                                <td>{{$MyWork->StartDate}}</td>
                                <td>{{$MyWork->EndDate}}</td>
                                <td>{{$MyWork->Duration}}</td>
                                <td>{{$MyWork->volunteer_hours}}</td>
                                <td>{{$MyWork->Gender}}</td>
                                <td>{{$MyWork->Major}}</td>
                                <td>{{$MyWork->Location}}</td>
                                <td>{{$MyWork->Field}}</td>

                                <td><a href="http://127.0.0.1:8000/storage/{{$MyWork->WorkID}}/cer{{Auth::user()->id}}.jpg">Get My Certificate</a></td>
                            </tr>
                        @endforeach

                    </table>
                    <div id="account" class="col-lg-6 col-md-12 col-sm-12">
                        <button class="collapse_small_btn" type="button" data-toggle="collapse" data-target="#collapseAccount" aria-expanded="false" aria-controls="collapseExample">
                            Account information
                        </button>
                        <div class="form toBeCollapse" id="collapseAccount">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12" >




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

            </div>





            <footer>

            </footer>


        </div>







        <grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </div></div></body></html>
