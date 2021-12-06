<html lang="ar"  dir="rtl"><head>
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
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




    <meta charset="utf-8">
    <title>المنصة الوطنية للعمل التطوعي</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="NVG" name="description">
    <meta content="NVG" name="keywords">
    <meta content="NVG" name="author">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/GetWork.css">

    <style>

    </style>
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
        <span id="wisdom">أعط من وقتك تطوعاً .. بما يخدم مجتمعك</span>
        <span id="author" class="loading__author">منصة العمل التطوعي</span>
        <br>
        <span class="loading__anim"></span>
    </div>


</div>




<style>

</style>




<nav class="navbar navbar-expand-lg  navbar-light py-3 f">
    <div class="container">
        <a href="" class=" d-none d-sm-block">
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




<div id="apprun-app">


    <div class="container margin_top_small" id="result" style="">



        <input type="hidden" name="teamIdAsLeader" value="0">
        <input type="hidden" id="opportunityId" value="5c4e23ec-9a80-4ace-ad42-08d9a391296a">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div style="background: linear-gradient(rgba(0,19,11,0.3), rgba(0,19,11,0.3)),url('/img/NajranLogoBig6.jpeg');" class="background_image text-center">
                    <p class="location">جامعة نجران</p>
                    <p class="volunteer_title" translate="no">{{$WorkName[1]}}</p>
                    <p class="details_title title_font">
                        <a     style="    background-color: transparent;border-radius: 6px;color: white;border: none;">المتطوعين المسجلين في الفرصة</a>


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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="white_background" data-step="2" data-intro="معلومات الفرصة" data-position="top">
                    <table>
                        <tr>
                            <th>Volunteer Number</th>
                            <th>id</th>
                            <th>اسم المسجل  </th>
                            <th>اسم الاب</th>
                            <th>اسم العائلة</th>
                            <th>تخصص المتطوع</th>
                            <th>جنس المتطوع</th>
                            <th>عمل المتطوع</th>
                            <th>ايميل المتطوع</th>
                            <th>اصدار الشهادة</th>

                        </tr>
                        @foreach ($work as $key=>$work)
                            <tr>
                                @if($key==0)
                                    <td>{{$key=1}}</td>
                                    <td>{{$work->id}}</td>
                                    <td>{{$work->first_name}}</td>
                                    <td>{{$work->middle_name}}</td>
                                    <td>{{$work->family_name}}</td>
                                    <td>{{$work->Select}}</td>
                                    <td>{{$work->gender}}</td>
                                    <td>{{$work->work}}</td>
                                    <td>{{$work->email}}</td>


                                <!--{! !nl2br  makes a space -->
                                    <td><a href="/GiveCertificate/{{$work->first_name }}  {{' '}}  {{$work->middle_name}}  {{' '}}  {{$work->family_name}}/{{$work->id}}/{{$WorkName[0]}}/{{$WorkName[1]}}/{{$WorkName[2]}}/{{$WorkName[3]}}/{{$WorkName[4]}}/{{$WorkName[5]}}">Give Certifacte</a></td>

                                @else
                                <td>{{$key}}</td>
                                <td>{{$work->id}}</td>
                                <td>{{$work->first_name}}</td>
                                <td>{{$work->middle_name}}</td>
                                <td>{{$work->family_name}}</td>
                                <td>{{$work->Select}}</td>
                                <td>{{$work->gender}}</td>
                                <td>{{$work->work}}</td>
                                <td>{{$work->email}}</td>
                                    @php
                                        $i = 1
                                    @endphp

                                    <td><a href="/GiveCertificate/{{$work->first_name }}  {{' '}}  {{$work->middle_name}}  {{' '}}  {{$work->family_name}}/{{$work->id}}/{{$WorkName[0]}}/{{$WorkName[1]}}/{{$WorkName[2]}}/{{$WorkName[3]}}/{{$WorkName[4]}}/{{$WorkName[5]}}">اصدر الشهادة</a></td>
                            </tr>
                            @endif
                        @endforeach

                    </table>

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
