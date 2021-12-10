<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">    <title>main page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{asset('css/Styling.css')}}">
</head>
<body>
    <!-- navbark : a must use class to create navbar -->
    <!-- navbar-expand-lg  : a class for expanding the navbar based on size if it's for example navbar-exapnd-sm the navbar will be exapend intll it reach small screen-->
    <!-- bg-dark :  it change the background color of the navbar to dark-->
    <!-- navbark dark : change the text to white-->
    <!-- navbar-brand : it gives a brand or logo to the navbar-->
    <!-- navbar-light : it changes the color of the text in the navbar-->
    <!-- collapse (alone) : hides content-->
    <!-- .collapse.navbar-collapse : for grouping and hiding navbar contents by a parent breakpoint.-->
    <!-- navbar-nav : A navigation bar is a navigation header that is placed at the top of the page:-->
    <!-- nav-item : -->
    <!-- nav-link :  change the format ofthe link to look good at the navbar-->
    <!-- navbar-toggler : opens the windows when its clicked-->
    <!-- ms-auto: margin starts auto-->
    <!-- ms-auto: margin starts auto-->
    <!-- ms-auto: margin starts auto-->
    <!-- ms-auto: margin starts auto-->

<!-- Navbar-->
<nav class="navbar navbar-expand-lg  navbar-dark py-3 fixed-top" style="background-color: #39c095;">
    <div class="container">
        <a href="{{url("/")}}" class="navbar-brand ">منصة متطوع</a>
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
                @auth
                    <li class="nav-item dropdown">
                        <a href="opportunies" class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >الفرص التطوعية</a>
                        <div class="dropdown-menu">
                            <a href="{{route('home')}}" class="dropdown-item">الفرص الحالية</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('Finished')}}" class="dropdown-item">الفرص المنتهية</a>
                        </div>
                    </li>
                @endauth


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


                              @guest()
                       <!-- Nav-item3 -->
                 <li class="nav-item ">
                        <a href="{{route('Register')}}" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" >تسجيل</a>
                  </li>

                    <!-- Nav-item4 -->
                    <li class="nav-item ">
                        <a href="{{route('Login')}}" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" >دخول</a>
                    </li>
                           @endguest


            </ul>
        </div>
    </div>
</nav>
<!-- d-flex: flex box which makes the image and the text in a row side by side-->
<!-- d-sm-flex: when it is on small screen it will not be flex until it hits the small screen breakpoint-->
<!-- img-fluid: makes the image does not go out of it's breakpoint-->
<!-- lead: makes the text bigger-->
<!-- text-sm-start: makes the text on the start on the left when it is on smaller screen and above-->
<!-- d-none: set display to none-->
<!-- d-sm-block: set display to block on small screen and above-->
<!-- align-items-center: set items un the middle-->
<!-- justify-content-between: makes a the items doesn't go above the justify breakpoint -->



<!-- Showcase-->
<section class="text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start" style="background-color: #39c095;">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h1>كن  <span style="color: #4a5d5c;">متطوع</span></h1>
                <p class="lead my-4">“أفضل طريقة لتجد نفسك هي أن تجتهد  <br>  في خدمة الآخرين ". - غاندي
                </p>
                <a class="btn btn-lg" style="background-color: #b1c3bd;"href="{{route('Login')}}"> ابدأ رحلتك</a>
            </div>
            <img class="img-fluid w-50 d-none d-sm-block" src="img/Helping.svg" alt="">
        </div>
    </div>
</section>

<!-- Boxes -->

<section class="m-5">
    <div class="container ">
        <div class="row text-center g-5">
            <div class="col-md">
                <div class="card  text-light" style="background-color:#4a5d5c ;">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-hand-thumbs-up" style=" color: #39c095;"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            فوائد التطوع
                        </h3>
                        <p class="card-text">
                            إن كنت تفكر في مهنة جديدة، يمكن أن يساعدك التطوع في اكتساب خبرة في مجال اهتمامك والالتقاء بأشخاص يعملون في هذا المجال. حتى لو كنت لا تنوي تغيير مهنتك، يعطيك العمل التطوعي فرصة لتمارس مهارات هامة تستطيع أن تستخدمها في مكان العمل، كالعمل ضمن فريق، والتواصل، وحل المشكلات، والتخطيط للمشاريع، وإدارة المهام وتنظيمها.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md" >
                <div class="card  text-light" style="background-color: #4a5d5c;">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-emoji-smile" style=" color: #39c095;"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            فوائد التطوع
                        </h3>
                        <p class="card-text">
                            يتيح لك التطوع أن تتواصل مع مجتمعك وتسهم في تحويله إلى الأفضل. فالمساعدة في أداء مهمات مهما صغرت، يمكن أن تساعد في إحداث فرق في حياة الأشخاص، والحيوانات، والمنظمات المحتاجة. وفي الواقع، يوصف التطوع بأنه طريق باتجاهين، حيث يمكنك أن تستفيد أنت وعائلتك من التطوع، كما تستفيد منه القضية التي تريد أن تدعمها.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md" >
                <div class="card  text-light" style="background-color: #4a5d5c;">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-people" style=" color: #39c095;"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            فوائد التطوع
                        </h3>
                        <p class="card-text">
                            وفر التطوع الكثير من الفوائد للصحة النفسية والجسدية، إذ يزيد من الثقة بالنفس والرضى عن الذات. كما يمكن أن يمنحك التطوع إحساسا بالفخر والهوية. ومن الفوائد الأخرى للتطوع أنه يحد من خطر الإصابة بالاكتئاب، لأنه يبقيك على تواصل منتظم مع الآخرين ويساعدك في تطوير نظام قوي للدعم.

                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Learn Sections -->
<section id="Collap" class="p-5">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md p-5">
                <h2>حول التطوع </h2>
                <p class="lead">
                    العمل التطوعي سمة من سمات المجتمع النابض بالحياة لأنه يلعب دورًا في تنشيط الطاقة الاجتماعية وإثراء الوطن بإنجازات الاشخاص. من خلال منصة متطوع  ، يمكنك التطوع في المكان والوقت والميدان المناسب لمهنتك ومهاراتك ، كما يمكن للمنصة تسجيل ساعات عملك وإصدار شهادة التطوع الخاصة بك.
                </p>
            </div>
            <div class="col-md">
                <img src="img/Collab.svg"  alt="" class="img-fluid">
            </div>

        </div>
    </div>
</section>


<!-- Learn Sections -->
<section id="Collap" class="p-5 text-light" style="background-color: #4a5d5c;">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md">
                <img src="img/Collab.svg"  alt="" class="img-fluid">
            </div>
            <div class="col-md p-5">
                <h2>أهم خصائص وميزات المنصة</h2>
                <p class="lead">


                    *وصول المتطوعين للفرص التطوعية بكل يسر وسهولة.<br>



                    *رصد وتوثيق الساعات التطوعية.<br>


                    *توفير فرص تطوعية لكل المجالات  في الجامعة.<br>
                </p>
            </div>
        </div>
    </div>
</section>






<!-- Statics-->
<section>
    <div class="container text-center">
        <h2 class=" pt-5">الاحصائيات</h2>
        <p class="lead pb-5"> بعض الإحصائيات عن المتطوعين والكليات</p>
        <div class="row g-5 ">
            <div class="col-md-4 text-start">
                <img class="img-fluid w-5" src="img/S1.svg" alt="" >
                <h6 class=" pt-5">العددالكلي للفرص التطوعية في المنصة: {{\App\Models\volunteerwork::where("Volunteernum",0)->count()}}</h6>
            </div>

            <div class="col-md-4">
                <img class="img-fluid w-5" src="img/S2.svg" alt="" >
                <h6 class=" pt-5">العدد الكلي للمتطوعين في المنصة:     {{\App\Models\volunteerwork_user::count()}}</h6>
            </div>
            <div class="col-md-4 ">
                <img class="img-fluid w-5 " src="img/S3.svg" alt="" >
                <h6 class=" pt-5"> عدد الساعات الكلية في المنصة: {{\App\Models\volunteerwork::where("Volunteernum",0)->sum("volunteer_hours")}}  </h6>
            </div>
        </div>
    </div>
</section>

<!-- Questions Accordian-->
<section id="questions" class="p-5">
    <div class="container">
        <h2 class="text-center mb-4">
            أسئلة مكررة
        </h2>
        <div class="accordion accordion-flush" id="questions">
            <!-- Item 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one">
                        من يمكنه التطوع؟
                    </button>
                </h2>
                <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        كل من لديه بريد إلكتروني جامعي على المنصة                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two">
                        هل التطوع لديه شهادة؟
                    </button>
                </h2>
                <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        نعم, يتم إرسالها على المنصة لكل متطوع اكمل فرصة التطوع                    </div>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three">
                        هل يمكنني التطوع في مجال مختلف عن تخصصي؟
                    </button>
                </h2>
                <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        نعم                     </div>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-four">
                        ما المتوقع مني تقديمه كمتطوع ?
                    </button>
                </h2>
                <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        كل فرصة تطوعية لها مهام محددة وهي موضحة في معلومات الفرصة التطوعية المعروضة بالمنصة وفي حال وجود إستفسار يتم التواصل مع منسق الفرصة التطوعية
                    </div>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-five">
                        متى يمكنني إصدار الشهادة التطوعية؟                    </button>
                </h2>
                <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        بإمكانك إصدار الشهادة عن طريق المنصة بعد إعتماد الساعات التطوعية من قبل الجهة الموفرة للفرصة التطوعية وتقييمك للفرصة التطوعية
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<footer class="p-5 text-white text-center position-relative" style="background-color:#4a5d5c ;">
    <div class="container">
        <p class="lead">حقوق النشر © 2021 جامعة نجران</p>
        <a href="#" class="position-absolute bottom-0 end-0 p-5">
            <i class="bi bi-arrow-up-circle h1" style="color: #39c095;"></i>
        </a>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
