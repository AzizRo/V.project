<html lang="ar"  dir="rtl"><head>
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
    <style>


    </style>




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




    <nav class="navbar navbar-expand-lg  navbar-light py-3 f" dir="rtl">
        <div class="container">
            <a href="{{route('home')}}" class=" d-none d-sm-block
                " dir="rtl">
                <img height="100" src="/img/logoAr.png" >
            </a>
            <a href="" class=" d-block d-sm-none" >
                <img height="75" src="/img/logoAr.png" >
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




    <div id="apprun-app" dir="rtl" >


        <div class="container margin_top_small" id="result" style="" >



            <input type="hidden" name="teamIdAsLeader" value="0">
            <input type="hidden" id="opportunityId" value="5c4e23ec-9a80-4ace-ad42-08d9a391296a">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div style="background: linear-gradient(rgba(0,19,11,0.3), rgba(0,19,11,0.3)),url('/img/NajranLogoBig6.jpeg');" class="background_image text-center">
                        <!--Image text -->
                        <p class="location">جامعة نجران</p>
                        <!--Opportunity Name -->
                        <p class="volunteer_title" translate="no">{{ $work->Name }}</p>
                        <p class="details_title title_font">

                        </p>


                        <div id="enrollments_created_div" class="text-center" style="display: none;">
                            <br>
                            <br>
                            <i style="background-color: #fff; color: #006f43; width: 52px; height: 52px; padding: 15px; margin-bottom: 15px; border-radius: 50%;">
                                <svg width="25" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                            </i>
                            <br><br>
                            <p>تم تسجيلك بنجاح في هذه الفرصة</p>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="white_background" data-step="" data-intro="معلومات الفرصة" data-position="">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <!--Opportunity Description -->
                                <p class="details_title title_font" >تفاصيل الفرصة التطوعية</p>
                                <p class="details_gry_text">{{ $work->Description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <!--Opportunity StartDate - EndDate -->
                                <p class="details_green_text"> بداية التسجيل  -  نهاية التسجيل</p>
                                <p class="details_gry_text">{{ $work->StartDate }} - {{ $work->EndDate}}</p>
                                <!--Opportunity Duration -->
                                <p class="details_green_text">مدة التسجيل في الفرصة</p>
                                <p class="details_gry_text">{{ $work->Duration }} ايام</p>
                                <!--Opportunity volunteer_hours -->
                                <p class="details_green_text"> عدد ساعات التطوع</p>
                                <p class="details_gry_text">{{ $work->volunteer_hours }} ساعات</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <!--Opportunity Volunteer.num required-->
                                <p class="details_green_text">المقاعد</p>
                                <p class="details_gry_text">{{$work->Volunteernum }}</p>
                                <!--Opportunity Field -->
                                <p class="details_green_text">نوع الفرصة</p>
                                <p class="details_gry_text" translate="no">{{ $work->Field }}</p>
                                <!--Opportunity Major required -->
                                <p class="details_green_text">التخصص المطلوب</p>
                                <p class="details_gry_text">{{ $work->Major }}</p>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <!--Opportunity Gender required -->
                                <p class="details_green_text"  dir="ltr">الجنس المطلوب</p>
                                <p class="details_gry_text" translate="no">{{ $work->Gender }}</p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <!--Opportunity Benefits -->
                                <p class="details_green_text">الفوائد المكتسبة من الفرصة</p>
                                <p class="details_normal_text" translate="no">{{ $work->Benefits }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <!--Opportunity Skills required -->
                                <p class="details_green_text">المهارات المطلوبة</p>
                                <p class="details_normal_text" translate="no">{{ $work->Skills }}</p>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <!--Opportunity Tasks -->
                                <p class="details_green_text">المهام</p>
                                <p class="details_normal_text pre-wrap" translate="no">{{ $work->Tasks }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <!--Opportunity Location -->
                                <p class="details_green_text">موقع الفرصة</p>
                                <p class="details_normal_text" translate="no">{{ $work->Location }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <!-- Communication between provider and volunteer -->
                                <p class="details_green_text">طريقة التواصل</p>
                                <p class="details_normal_text" translate="no">{{ $work->Communication }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="white_background text-center with_iframe" data-step="3" data-intro="معلومات المنظمة" data-position="top">
                        <!--Provider first_name -middle_name -family_name -->
                        <p class="details_name">بيانات صاحب العمل</p>
                        <p class="initiatives_number" translate="no">{{$work->first_name}}   {{$work->middle_name}} {{$work->family_name}}</p>
                        <hr>
                        <!--Provider Major -->
                        <p class="details_information">{{$work->Select}}</p>
                        <hr>
                        <!--Provider work -->
                        <p class="details_information">{{$work->work}}</p>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">

                <div class="modal-body">

                    <br>
                    <br>
                    <p class="title_text larg_title text-success with_underline">جدول الفترات للفرصة</p>
                    <br>
                    <br>

                    <div id="shifts-div">
                        <!-- Dynamic Content -->
                        <div class="loader_element">
                            <lines class="shine"></lines>
                            <lines class="shine"></lines>
                            <lines class="shine"></lines>
                            <lines class="shine"></lines>
                            <lines class="shine"></lines>

                        </div>
                        <br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!--

    <footer>
    <hr>
    <div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-12 col-sm-12">
        <ul>
            <li>
                <a class="copy_right" href="/About/Faq">الأسئلة الشائعة</a>
            </li>
            <li>
                <a class="copy_right" href="/About/TutorialGuides">مساعدة</a>
            </li>
            <li>
                <a class="copy_right" href="/About/Agreement">الميثاق الأخلاقي للتطوع</a>
            </li>
            <li>
                <a class="copy_right" target="_blank" href="/files/VolunteerUserManual.pdf">دليل المستخدم</a>
            </li>
            <li>
                <a class="copy_right" href="/AbpLocalization/ChangeCulture?cultureName=ar-SA&amp;returnUrl=Home">Arabic</a>
            </li>
            <li>
                <a class="copy_right" href="/AbpLocalization/ChangeCulture?cultureName=en-US&amp;returnUrl=Home">English</a>
            </li>

        </ul>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 text-center">
        <p class="copy_right">كل الحقوق محفوظة. منصة العمل التطوعي  2021  <br> Powered by Tamkeen Technologies</p>
    </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 text-center">
                        </div>
                    </div>
                </div>
            </footer>
    -->
    <!-- Page Specific JS (opportunities.js)-->






















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>
