<html lang="ar" dir="rtl"><head>


    <meta charset="utf-8">
    <title>Volunteer Work Gate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="NVG" name="description">
    <meta content="NVG" name="keywords">
    <meta content="NVG" name="author">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/kendo/kendo.rtl.min.css">
    <link rel="stylesheet" href="/css/Home.css">

    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400&amp;display=swap" rel="stylesheet">

    <link href="/css/ltr.css" rel="stylesheet" >
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
</head>
<body >

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








<footer>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <ul>
                    <li>
                        <a class="copy_right" href="/About/Faq">Common Questions</a>
                    </li>
                    <li>
                        <a class="copy_right" href="/About/TutorialGuides">Help</a>
                    </li>
                    <li>
                        <a class="copy_right" href="/About/Agreement">The Ethical Charter For Volunteering</a>
                    </li>
                    <li>
                        <a class="copy_right" target="_blank" href="/files/VolunteerUserManual.pdf">User Guide</a>
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
                <p class="copy_right">All rights reserved. Volunteer work platform  2021  <br> Powered by Tamkeen Technologies</p>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 text-center">
            </div>
        </div>
    </div>
</footer>

<!-- success message if he signed in the opportunity -->
@if (session('success'))
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


<!-- cards start -->

<div class="container">
    <div class="col-lg-12 col-md-6 col-sm-12 d-flex align-items-center">
        <table class="align-items-center">
            <tr>
                <th>id</th>
                <th>اسم المتطوع</th>
                <th>VolunteerId</th>
                <th>WorkId</th>
                <th>اسم الفرصة التطوعية</th>
                <th>بداية تاريخ الفرصة</th>
                <th>نهاية تاريخ الفرصة</th>
                <th>عدد الساعات االتطوعية</th>
                <th>اسم صاحب الفرصة</th>
                <th>حالة الشهادة</th>
                <th>اصدار الشهادة</th>

            </tr>
            @foreach ($Certificates as $Certificate)
                <tr>
                    <td>{{$Certificate->id}}</td>
                    <td>{{$Certificate->VolunteerName}}</td>
                    <td>{{$Certificate->VolunteerId}}</td>
                    <td>{{$Certificate->WorkId}}</td>
                    <td>{{$Certificate->WorkName}}</td>
                    <td>{{$Certificate->StartDate}}</td>
                    <td>{{$Certificate->EndDate}}</td>
                    <td>{{$Certificate->VolunteeringHours}}</td>
                    <td>{{$Certificate->ProviderName}}</td>
                    <td>{{$Certificate->Status}}</td>

                    <td>
                        <input type="hidden" name="businessID" value="$Certificate->id"/>
                        <a  onclick="return confirm('Are you sure?')" href="/GiveCertificates/{{$Certificate->id}}/{{$Certificate->VolunteerName}}/{{$Certificate->VolunteerId}}/{{$Certificate->WorkId}}/{{$Certificate->WorkName}}/{{$Certificate->StartDate}}/{{$Certificate->EndDate}}/{{$Certificate->VolunteeringHours}}/{{$Certificate->ProviderName}}">
                            Give Certificate to Volunteer
                        </a>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
</div>


<!-- cards end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body></html>
