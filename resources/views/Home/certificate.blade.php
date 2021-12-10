<html lang="ar" dir="rtl"><head>

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

        <span class="loading__anim"></span>
    </div>


</div>


<div class="">



    <!-- navbar -->
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
                <!-- Certificate table Starts -->
                <div id="account" class="col-lg-12 col-md-12 col-sm-12">
                    <table>
                        <tr>
                            <th>اسم الفرصة التطوعية</th>
                            <th>تاربخ بداية الفرصة</th>
                            <th>تاريخ نهاية الفرصة</th>
                            <th>ساعات التطوع</th>
                            <th>حالة الشهادة</th>
                            <th>الحصول على الشهادة التطوعية</th>
                        </tr>
                        @foreach ($MyWorks as $MyWork)
                            <tr>
                                <input hidden="{{$MyWork->WorkID}}">
                                <td>{{$MyWork->Name}}</td>
                                <td>{{$MyWork->StartDate}}</td>
                                <td>{{$MyWork->EndDate}}</td>
                                <td>{{$MyWork->volunteer_hours}}</td>
                                <td>{{$MyWork->Status}}</td>
                                <td><a href="http://127.0.0.1:8000/storage/{{$MyWork->WorkID}}/cer{{Auth::user()->id}}.jpg">الحصول على الشهادة</a></td>
                                @endforeach
                            </tr>

                    </table>

                    <!-- Certificate table ends -->

            <footer>

            </footer>


        </div>





                <!-- script -->

        <grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

            </div>
        </div>
    </div>
</div>
</body>
</html>
