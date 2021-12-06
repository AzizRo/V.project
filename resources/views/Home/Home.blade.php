<html lang="ar" dir="rtl"><head>


    <meta charset="utf-8">
    <title>بوابة المنصة</title>
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
    <style></style></head>
<body >

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
                                <form action="{{route('logout')}}" method="post" class=" ">
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









<footer>
</footer>






<!-- cards start -->

<div class="cards container" style="margin-bottom: 50px;">

    <div class="row justify-content-center">
        @foreach ($works as $work)
            <div class="col-lg-8 col-md-1 col-sm-10">

                <div  id="60d65e86-8e5a-46d0-1bc1-08d998986fd4" style="cursor: pointer;" class="card" data-step="2" data-intro="If you would like a specific opportunity, you can view its details here">

                    <div  class="card_image" > <img src="/img/NajranLogoBig6.jpeg" style="border-radius: 10px;"></div>

                    <div class="complete" style="background-color:transparent !important;">
                        <p class="completed_text"></p>
                    </div>         <span class="text_on_image" style="color: #ffffff">{{ $work->Name }} </span>
                    <p class="card_location">
                        {{ $work->Location }}                    </p>
                    <p data-toggle="tooltip" data-placement="top" title="" class="card_title" data-original-title="توزيع سلال غذائية">{{ $work->Description }}</p>
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
                        <div class="col-4">
                            <div data-step="3" data-intro="What are you waiting for! Click here to register for the opportunity">

                                <a class="join_btn btn_to_a"  href="home/show/{{{$work->WorkID}}}">عرض الفرصة</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        @endforeach


    </div>    </div>

<!-- cards end -->

<!--this one has the real information -->
<div class="center-block text-center">


    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $works->links() !!}
    </div>

</div>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body></html>
