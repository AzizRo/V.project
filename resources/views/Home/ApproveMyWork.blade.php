<html lang="ar"  dir="rtl"><head>
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
    <link rel="stylesheet" href="{{asset('css/kendo/kendo.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/Profile.css')}}">
    <script src=//code.jquery.com/jquery-3.5.1.slim.min.js integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin=anonymous></script>

    <style>


    </style>
    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/ltr.css')}}">
    <style></style></head>
<body >

<!-- Google Tag Manager (noscript) -->

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

<!--This message appear when provider who has certificate role approve his opportunity  -->
@if (session('approval.MyOp') )
    <div class="container ">
        <div class="row container justify-content-center">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="alert alert-success  text-center">
                    {{ session('approval.MyOp') }}
                </div>
            </div>
        </div>
    </div>
@endif

<!--This message appear when provider who has certificate role decline his opportunity  -->
@if (session('decline.MyOp') )
    <div class="container ">
        <div class="row container justify-content-center">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="alert alert-success  text-center">
                    {{ session('decline.MyOp') }}
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

                <!-- cards start -->


                @foreach ($works as $work)
                    <div class="col-lg-4 col-md-1 col-sm-10">

                        <div  id="60d65e86-8e5a-46d0-1bc1-08d998986fd4" style="cursor: pointer;" class="card" data-step="2" data-intro="If you would like a specific opportunity, you can view its details here">

                            <div  class="card_image" > <img src="/img/NajranLogoBig6.jpeg" style="border-radius: 10px;"></div>

                            <div class="complete" style="background-color:transparent !important;">
                                <p class="completed_text"></p>
                            </div>         <span class="text_on_image" style="color: #ffffff">{{ $work->Name }} </span>
                            <p class="card_location">
                                {{ $work->Location }}                    </p>
                            <p data-toggle="tooltip" data-placement="top" title="" style="padding-bottom: 25px" class="card_title" data-original-title="توزيع سلال غذائية">{{ $work->Description }}</p>
                            <p class="card_text">{{ $work->Gender }}</p>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <p class="days_number" data-date="5">تاريخ التسجيل</p>
                                    <p class="dates">{{ $work->StartDate }} - <br>{{ $work->EndDate }}</p> <!-- End date - Start date -->
                                </div>
                                <div class="col-4">
                                    <p class="seats_number">{{$work->Volunteernum }} المقاعد</p>
                                    <p class="statuse">باقي من الوقت</p>
                                </div>
                                <div class="col-4 ">
                                    <div data-step="3" data-intro="What are you waiting for! Click here to register for the opportunity">

                                        <a class="join_btn btn_to_a mb-1"  href="MyVolunteerWorks/show/{{{$work->WorkID}}}">عرض الفرصة</a>
                                    </div>

                                        <input type="hidden" name="businessID" value="$work->WorkID"/>
                                        <a class="join_btn btn_to_a mb-1" href="MyOpportunity/decline/{{$work->WorkID}}" onclick="return confirm('هل انت متأكد؟')" >
                                            الغاء الفرصة
                                        </a>




                                        <a class="join_btn btn_to_a" href="MyOpportunity/Approve/{{$work->WorkID}}"  onclick="return confirm('هل انت متأكد؟')" >
                                            الموافقة
                                        </a>



                                </div>
                                </div>

                            </div>
                        </div>
                    </div>

            @endforeach


            <!-- cards end -->

                <!--this one has the real information -->
                <div class="center-block text-center">


                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $works->links() !!}
                    </div>

                </div>




                <div id="account" class="col-lg-6 col-md-12 col-sm-12">

                    <div id="account" class="col-lg-6 col-md-12 col-sm-12">
                        <button class="collapse_small_btn" type="button" data-toggle="collapse" data-target="#collapseAccount" aria-expanded="false" aria-controls="collapseExample">
                            Account information
                        </button>
                        <div class="form toBeCollapse" id="collapseAccount">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12" >






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

                </div>
            </div>
        </div>
    </div>

</body>
</html>
