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
    <style></style></head>
<body >

<div class="">




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

</div>









<footer>

</footer>






<!-- cards start -->

<div class="card-body" >
    <div class="table-responsive">
        <table class=" table table-bordered ">
            <thead>
            <tr>
                <th>
                    اسم منشئ الفرصة
                </th>
                <th>
                    ايميل منشئ الفرصة
                </th>
                <th>
                    ادوار منشئ الفرصة
                </th>
                <th>
                    العمليات
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as  $user)
                <tr>
                    <td>
                        {{ $user->first_name ?? '' }}
                    </td>
                    <td>
                        {{ $user->email ?? '' }}
                    </td>
                    <td>
                        @foreach($user->roles()->pluck('name') as $role)
                            <span class="black-info">{{ $role }}-</span>
                        @endforeach

                    </td>
                    <td>

                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">عرض الادوار</a>


                    </td>



                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</div>
<!-- cards end -->

<!--this one has the real information -->
<div class="center-block text-center">


</div>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body></html>
