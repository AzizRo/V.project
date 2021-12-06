<html lang="en" dir="ltr"><head>
    <script src="https://script.crazyegg.com/pages/versioned/common-scripts/11.1.351.js" type="text/javascript" async=""></script><script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-PGJ397C"></script><script type="text/javascript" src="/js/7386.js" async="async"></script>
    <!-- Google Tag Manager -->

    <style>


    </style>
    <meta charset="utf-8">
    <title>Volunteer home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="NVG" name="description">
    <meta content="NVG" name="keywords">
    <meta content="NVG" name="author">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/kendo/kendo.rtl.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/Home.css")}}">

    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400&amp;display=swap" rel="stylesheet">

    <link href="{{asset("/css/ltr.css")}}" rel="stylesheet">
    <style></style>
</head>
<body data-dir="ltr" data-new-gr-c-s-check-loaded="14.1035.0" data-gr-ext-installed="">

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
            <a href="{{url("/")}}" class=" d-none d-sm-block
                ">
                <img height="100" src="img/logo.png">
            </a>
            <a href="{{url("/")}}" class=" d-block d-sm-none">
                <img height="75" src="img/logo.png">
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
                <ul class="navbar-nav ms-auto ">
                    <!-- Nav-item1 -->
                    <li class="nav-item dropdown">
                        <a href="opportunies" class="nav-link" data-bs-toggle="" role="button" aria-haspopup="true" aria-expanded="false" >Opportunies</a>

                    </li>

                    <!-- Nav-item2 -->
                    <li class="nav-item dropdown">
                        <a href="opportunies" class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >More</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">News</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Providers</a>
                        </div>
                    </li>

                    <!-- Nav-item3 -->
                    <li class="nav-item dropdown">
                        @auth()
                            <a href="opportunies" class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >{{ Auth::user()->username }}</a>
                        @endauth
                        <div class="dropdown-menu">
                            <a href="{{url("profile")}}" class="dropdown-item">Profile</a>
                            @auth()
                                @role("volunteer provider")
                                <div class="dropdown-divider"></div>
                                <a href="{{route("CreateWork")}}" class="dropdown-item">Create Work</a>
                                @endrole


                                <div class="dropdown-divider"></div>
                                <form action="{{route('logout')}}" method="post" >
                                    @csrf

                                    <button type="submit" class="nav-link"  style="background-color: #39c095;border: #39c095;color: rgba(255,255,255,.55);" role="button" aria-haspopup="true" aria-expanded="false" >Logout</button>

                                </form>

                            @endauth
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a href="main-rtl.html" class="nav-link " role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 2px;" >Arabic</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="main k-rtl">
    <div id="apprun-app">


        <div class="opportunities margin_top_small" id="opportunities_div">
            <div class="container form">




                <section>

                    <!--my code-->
                    <!-- cards start -->

                    <div class="cards container" style="margin-bottom: 50px;">

                        <div class="row justify-content-center">
                            @foreach ($works as $work)

                                <div class="col-lg-4 col-md-6 col-sm-12">

                                    <div onclick="location.href='/Opportunities/Details/60d65e86-8e5a-46d0-1bc1-08d998986fd4'" id="60d65e86-8e5a-46d0-1bc1-08d998986fd4" style="cursor: pointer;" class="card" data-step="2" data-intro="If you would like a specific opportunity, you can view its details here">

                                        <div  class="card_image" > <img src="img/NajranLogoBig6.jpeg" style="border-radius: 10px;"></div>

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
                                                <p class="days_number" data-date="5">{{ $work->Duration }} Days Left</p>
                                                <p class="dates">{{ $work->StartDate }} - <br>{{ $work->EndDate }}</p> <!-- End date - Start date -->
                                            </div>
                                            <div class="col-4">
                                                <p class="seats_number">{{ $work->Volunteernum }} seats</p>
                                                <p class="statuse">Remaining</p>
                                            </div>
                                            <div class="col-4">
                                                <div data-step="3" data-intro="What are you waiting for! Click here to register for the opportunity">
                                                    <a class=" join_btn btn_to_a" href="admin/show/{{{$work->WorkID}}}">Show</a>

                                                    <form method="post" action="{{route('admin.decline',$work->WorkID)}}">
                                                        @csrf
                                                        <input type="hidden" name="businessID" value="$work->WorkID"/>
                                                        <button class="delete"  data-confirm="Are you sure to decline this opportunity?" type="submit">
                                                            Decline
                                                        </button>
                                                    </form>

                                                    <form method="post" action="{{route('admin.approve',$work->WorkID)}}">
                                                        @csrf
                                                        <input type="hidden" name="businessID" value="$work->WorkID"/>
                                                        <button class="delete"  data-confirm="Are you sure to approve this opportunity?" type="submit">
                                                            Approve
                                                        </button>
                                                    </form>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>





                    </div>

                    <!-- cards end -->

                    <!--this one has the real information -->
                    <div class="center-block text-center">


                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center">
                            {!! $works->links() !!}
                        </div>

                    </div>

                </section>




                <!-- Page Specific JS (opportunities.js)-->

                <script>
                    // Get the modal
                    var modal = document.getElementById('id01');

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <script>
                    var deleteLinks = document.querySelectorAll('.delete');

                    for (var i = 0; i < deleteLinks.length; i++) {
                        deleteLinks[i].addEventListener('click', function(event) {
                            event.preventDefault();

                            var choice = confirm(this.getAttribute('data-confirm'));

                            if (choice) {
                                window.location.href = this.getAttribute('href');
                            }
                        });
                    }

                </script>

                <script type="text/javascript">
                    document.body.setAttribute("data-dir", "ltr")
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

            </div>
        </div>
    </div>
</div>
</body>
</html>
