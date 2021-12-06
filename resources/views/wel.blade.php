<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">    <title>welcome page</title>
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
        <a href="{{route("Main")}}" class="navbar-brand ">Mutwae</a>
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
                    <a href="opportunies" class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Opportunies</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Current Opportunies</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Finished Opportunies</a>

                    </div>
                </li>
                <!-- Nav-item3 -->
                <li class="nav-item dropdown">
                    <a href="opportunies" class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Workshops</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Introduction to Volunteer Work</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Volunteer and Communication</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Volunteer and Sustainability Concept</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Volunteer and Sustainability Tools</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Health Vokunteering Skills in Crises</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Measures to Prevent and Conrtol COVID-19 Infection</a>

                    </div>
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

                @auth()
                    <li class="nav-item ">
                        <a href="main-rtl.html" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" >{{ Auth::user()->username }}</a>
                    </li>

                    <!-- Nav-item4 -->
                    <form action="{{route('logout')}}" method="post" class="pb-2 inline " style="    background-color: #39c095;
    border: #39c095;
    color: rgba(255,255,255,.55);">
                        @csrf
                        <li class="nav-item " >
                            <button type="submit" class="nav-link"  style="background-color: #39c095;border: #39c095;color: rgba(255,255,255,.55);" role="button" aria-haspopup="true" aria-expanded="false" >Logout</button>
                        </li>
                    </form>

                @endauth


                @guest()
                    <li class="nav-item ">
                        <a href="{{route('SignUp')}}" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" >Register</a>
                    </li>

                    <!-- Nav-item4 -->
                    <li class="nav-item ">
                        <a href="{{route('SignIn')}}" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" >Login</a>
                    </li>
                @endguest

                <li class="nav-item ">
                    <a href="main-rtl.html" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" >Arabic</a>
                </li>
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
                <h1>Become a  <span style="color: #4a5d5c;">Volunteer</span></h1>
                <p class="lead my-4">“The best way to find yourself is to lose <br> yourself  in the service of others.” – Gandhi
                </p>
                <button class="btn btn-lg" style="background-color: #b1c3bd;">Start Your Journey</button>
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
                            Benefits of Volunteering
                        </h3>
                        <p class="card-text">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md" >
                <div class="card  text-light" style="background-color: #b1c3bd;">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <i class="bi bi-emoji-smile" style=" color: #39c095;"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            Benefits of Volunteering
                        </h3>
                        <p class="card-text">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,

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
                            Benefits of Volunteering
                        </h3>
                        <p class="card-text">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,

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
                <h2>talk about Volunteers here</h2>
                <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
                <h2>Most important Platform Characteristics And Features</h2>
                <p class="lead">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
    </div>
</section>



<!-- Questions Accordian-->
<section id="questions" class="p-5">
    <div class="container">
        <h2 class="text-center mb-4">
            Frequently Asked Questions
        </h2>
        <div class="accordion accordion-flush" id="questions">
            <!-- Item 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one">
                        Who Can Volunteer?
                    </button>
                </h2>
                <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae illo maxime ipsum natus itaque aspernatur tenetur sapiente sint hic vero cumque omnis corrupti ab officiis unde ullam similique quae officia magnam in nemo, obcaecati ea quasi nisi! Architecto fugiat animi a qui magnam perspiciatis dignissimos, deserunt iste distinctio dolorem minima?
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two">
                        Does Volunteering Has Certificate?
                    </button>
                </h2>
                <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae illo maxime ipsum natus itaque aspernatur tenetur sapiente sint hic vero cumque omnis corrupti ab officiis unde ullam similique quae officia magnam in nemo, obcaecati ea quasi nisi! Architecto fugiat animi a qui magnam perspiciatis dignissimos, deserunt iste distinctio dolorem minima?
                    </div>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three">
                        Can I Volunteer in a Different Feild of My Study?
                    </button>
                </h2>
                <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae illo maxime ipsum natus itaque aspernatur tenetur sapiente sint hic vero cumque omnis corrupti ab officiis unde ullam similique quae officia magnam in nemo, obcaecati ea quasi nisi! Architecto fugiat animi a qui magnam perspiciatis dignissimos, deserunt iste distinctio dolorem minima?
                    </div>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-four">
                        How Do I Sign For Volunteering Opportunity?
                    </button>
                </h2>
                <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae illo maxime ipsum natus itaque aspernatur tenetur sapiente sint hic vero cumque omnis corrupti ab officiis unde ullam similique quae officia magnam in nemo, obcaecati ea quasi nisi! Architecto fugiat animi a qui magnam perspiciatis dignissimos, deserunt iste distinctio dolorem minima?
                    </div>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-five">
                        How Can I Cancel My Volunteering Opportunity?
                    </button>
                </h2>
                <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae illo maxime ipsum natus itaque aspernatur tenetur sapiente sint hic vero cumque omnis corrupti ab officiis unde ullam similique quae officia magnam in nemo, obcaecati ea quasi nisi! Architecto fugiat animi a qui magnam perspiciatis dignissimos, deserunt iste distinctio dolorem minima?
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Best Volunteers -->
<section id="volunteers" class="p-5" style="background-color:#b1c3bd;">
    <div class="container">
        <h2 class="text-center ">Best Volunteers</h2>
        <p class="lead text-center  mb-5">
            These are the best Volunteers acroos the whole University
        </p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <img src="img/Faisal.jpeg" alt="" class="rounded-circle mb-3 w-50">
                        <h3 class="card-title mb-3">Faisal Alanazi</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni quos placeat ipsum exercitationem necessitatibus!</p>
                        <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <img src="img/Faisal.jpeg" alt="" class="rounded-circle mb-3 w-50">
                        <h3 class="card-title mb-3">Faisal Alanazi</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni quos placeat ipsum exercitationem necessitatibus!</p>
                        <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <img src="img/Faisal.jpeg" alt="" class="rounded-circle mb-3 w-50">
                        <h3 class="card-title mb-3">Faisal Alanazi</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni quos placeat ipsum exercitationem necessitatibus!</p>
                        <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <img src="img/Faisal.jpeg" alt="" class="rounded-circle mb-3 w-50">
                        <h3 class="card-title mb-3">Faisal Alanazi</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni quos placeat ipsum exercitationem necessitatibus!</p>
                        <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                        <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Statics-->
<section>
    <div class="container text-center">
        <h2 class=" pt-5">Statics</h2>
        <p class="lead pb-5">Here Are Some Statics About Volunteers And Faculties</p>
        <div class="row g-5 ">
            <div class="col-md-4 text-start">
                <img class="img-fluid w-5" src="img/S1.svg" alt="" >
            </div>
            <div class="col-md-4">
                <img class="img-fluid w-5" src="img/S2.svg" alt="" >
            </div>
            <div class="col-md-4 ">
                <img class="img-fluid w-5 " src="img/S3.svg" alt="" >
            </div>
        </div>
    </div>
</section>

<!-- footer -->
<footer class="p-5 text-white text-center position-relative" style="background-color:#4a5d5c ;">
    <div class="container">
        <p class="lead">Copyright &copy; 2021 Najran University</p>
        <a href="#" class="position-absolute bottom-0 end-0 p-5">
            <i class="bi bi-arrow-up-circle h1" style="color: #39c095;"></i>
        </a>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
