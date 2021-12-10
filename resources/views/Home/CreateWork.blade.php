<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
          referrerpolicy="no-referrer" />
    <style>
        button {
            background-color: white !important;
            margin-top: -8px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/Create-VolunteeringWork.css')}}">
    <title>إنشاء عمل تطوعي</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar-dark py-3 fixed-top" style="background-color: #39c095;" >
    <div class="container">
        <a href="{{url("/")}}" class="navbar-brand " >منصة متطوع</a>
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
                    </div>
                </li>


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
<br><br><br><br>

<!-- Heading-->
<div class="container container-body-iPad-Pro">
    <div class="row pt-5">
        <div class="col-12 text-center">
            <p class="pb-2" style="font-size: 24px;   font-weight: bold;  color: #036A3B; ">لوحة الفرص  التطوعية</p>
            <p class=" mb-3">
                هل تود أن تكون من بين  المتطوعين شاركوا معنا بفكرة عمل تطوعي يساهم في تفعيل العمل التطوعي
                وتسمح بالمشاركة التطوعية من خلال فكرتك التي تتبناها الجامعة وستكون أنت الرائد والمرجعية في تنفيذها
            </p>
            <hr>
        </div>
    </div>
</div>


<form method="POST" action="{{route('CreateWork')}}">
    @csrf
    <div class="container container-body-iPad-Pro">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form">
                <!-- First row-->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 align-items-left text-left">
                        <p class="pt-3 " style="font-size: 24px;   font-weight: bold;  color: #036A3B; ">  انشاء فرصة جديدة </p>
                    </div>
                </div>
                <!-- Second row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Name" id="Name"  type="text" placeholder="اسم الفرصة التطوعية*" value="{{old('Name')}}" >
                    </div>
                </div>
                @error('Name')
                <div class="text-danger  Validation_message">
                    {{ $message }}
                </div>
                @enderror

            <!-- Third row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea class="update_input with_placeholder"type="text" name="Description" placeholder="شرح موجز للفرصة التطوعية*" maxlength="200" style="resize: none; height: 150px;" >{{{ old('Description') }}}</textarea>
                    </div>
                </div>
                @error('Description')
                <div class="text-danger  Validation_message">
                    {{ $message }}
                </div>
                @enderror

            <!-- Fourth row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea class="update_input with_placeholder"  name="Skills" placeholder="المهارات المطلوبة للفرصة*" maxlength="200" style="resize: none; height: 150px;" >{{{ old('Skills') }}}</textarea>
                    </div>
                </div>
                @error('Skills')
                <div class="text-danger  Validation_message">
                    {{ $message }}
                </div>
                @enderror

            <!-- Fifith row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea class="update_input with_placeholder"  name="Tasks" placeholder="المهام المطلوبة للفرصة*" maxlength="200" style="resize: none; height: 150px;" >{{{ old('Tasks') }}}</textarea>
                    </div>
                </div>
                @error('Tasks')
                <div class="text-danger  Validation_message">
                    {{ $message }}
                </div>
                @enderror


            <!-- Sixth row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Benefits"  type="text" placeholder="الفوائد المكتسبة من الفرصة*" value="{{old('Benefits')}}">
                    </div>
                </div>
                @error('Benefits')
                <div class="text-danger  Validation_message">
                    {{ $message }}
                </div>
            @enderror
            <!-- Seven row -->
                <div class="row">
                    <!--First column-->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Communication"  type="text" placeholder="طريقة التواصل*" value="{{old('Communication')}}">
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>

                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Volunteernum"  type="text" placeholder="عددد المتطوعين المطلوبين في الفرصة*" value="{{old('Volunteernum')}}">
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    @error('Communication')
                    <div class="text-danger  Validation_message_first">
                        {{ $message }}
                        @error('Volunteernum')
                        <span class="text-danger  Validation_message_third">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    @enderror


                </div>

                <!-- eight row -->
                <div class="row">
                    <!--First column-->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input name="StartDate" placeholder="بداية التسجيل في الفرصة*" class="form-control update_input with_select" type="text" onfocus="(this.type='date')" id="date" value="{{old('StartDate')}}"
                               min="<?php $NewDate=date('m-d-Y', strtotime('+0 days')); echo $NewDate;?>" max="<?php $NewDate=date('m-d-Y', strtotime('+120 days')); echo $NewDate;?>">
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input name="EndDate" placeholder="نهاية التسجيل في الفرصة*" class="form-control update_input with_select" type="text" onfocus="(this.type='date')" id="date"  value="{{old('EndDate')}}"
                               min="<?php $NewDate=date('m-d-Y', strtotime('+0 days')); echo $NewDate;?>" max="<?php $NewDate=date('m-d-Y', strtotime('+120 days')); echo $NewDate;?>">
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <!--Third column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="volunteer_hours"  type="text" placeholder="عدد ساعات التطوع*" value="{{old('volunteer_hours')}}">
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>

                    @error('StartDate')
                    <div class="text-danger  Validation_message_first">
                        {{ $message }}
                        @error('EndDate')
                        <span class="text-danger  Validation_message_second">
                            {{ $message }}
                            </span>
                        @enderror
                            @error('volunteer_hours')
                            <span class="text-danger  Validation_message_third">
                            {{ $message }}
                            </span>
                            @enderror
                        </div>
                    @enderror
                </div>


                <!-- nine row -->
                <div class="row">
                    <!--First column-->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select  id="inputState" name="Gender" class="form-control update_input with_select">
                            <option disabled="" selected="">الجنس *</option>
                            <option value="Male"  @if (old('Gender') == 'Male') selected="selected" @endif>ذكر</option>
                            <option value="Female" @if (old('Gender') == 'Female') selected="selected" @endif>انثى</option>
                            <option value="Both" @if (old('Gender') == 'Both') selected="selected" @endif>كلاهما</option>
                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select class="selectpicker form-control update_input with_select " multiple  id="inputState" name="Major[]">
                            <option disabled="" selected="">التخصصات المطلوبه في الفرصة*</option>



                            <option value="CS" @if (old('Major') == 'CS') selected="selected" @endif>علوم الحاسب</option>
                            <option value="IS" @if (old('Major') == 'IS') selected="selected" @endif>نظم المعلومات</option>
                            <option value="MD" @if (old('Major') == 'MD') selected="selected" @endif>الطب</option>
                            <option value="DS" @if (old('Major') == 'DS') selected="selected" @endif>طب الأسنان</option>
                            <option value="NS" @if (old('Major') == 'NS') selected="selected" @endif>التمريض</option>
                            <option value="TS" @if (old('Major') == 'TS') selected="selected" @endif>اللغات والترجمة</option>
                            <option value="EN" @if (old('Major') == 'EN') selected="selected" @endif>الهندسة</option>
                            <option value="AD" @if (old('Major') == 'AD') selected="selected" @endif>الادارة</option>
                            <option value="All" @if (old('Major') == 'All') selected="selected" @endif>كل التخصصات</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>

                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <div>
                    @error('Gender')
                    <div class="text-danger  Validation_message_first">
                        {{ $message }}
                        @error('Major')
                        <span class="text-danger  Validation_message_second">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    @enderror
                </div>


                <!-- ten row -->
                <div class="row">
                    <!--First column-->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select  id="inputState" name="Location" class="form-control update_input with_select">
                            <option disabled="" selected="">موقع الفرصة التطوعية*</option>
                            <option value="كلية علوم الحاسب ونظم والمعلومات" @if (old('Location') == 'كلية علوم الحاسب ونظم والمعلومات') selected="selected" @endif>كلية علوم الحاسب ونظم والمعلومات</option>
                            <option value="كلية الطب" @if (old('Location') == 'كلية الطب') selected="selected" @endif>كلية الطب</option>
                            <option value="كلية طب الأسنان" @if (old('Location') == 'كلية طب الأسنان') selected="selected" @endif>كلية طب الأسنان</option>
                            <option value="كلية الصيدلة" @if (old('Location') == 'كلية الصيدلة') selected="selected" @endif>كلية الصيدلة</option>
                            <option value="كلية العلوم التطبيقية" @if (old('Location') == 'كلية العلوم التطبيقية') selected="selected" @endif>كلية العلوم التطبيقية</option>
                            <option value="كلية التمريض" @if (old('Location') == 'كلية التمريض') selected="selected" @endif>كلية التمريض</option>
                            <option value="كلية الهندسة" @if (old('Location') == 'كلية الهندسة') selected="selected" @endif>كلية الهندسة</option>
                            <option value="كلية العلوم والأداب" @if (old('Location') == 'كلية العلوم والأداب') selected="selected" @endif>كلية العلوم والأداب</option>
                            <option value="كلية الشريعة" @if (old('Location') == 'كلية الشريعة') selected="selected" @endif>كلية الشريعة</option>
                            <option value="كلية اللغات و الترجمة" @if (old('Location') == 'كلية اللغات و الترجمة') selected="selected" @endif>كلية اللغات و الترجمة</option>
                            <option value="كلية العلوم الإدارية" @if (old('Location') == 'كلية العلوم الإدارية') selected="selected" @endif>كلية العلوم الإدارية</option>
                            <option value="كلية التربية" @if (old('Location') == 'كلية التربية') selected="selected" @endif>كلية التربية</option>
                            <option value="كلية المجتمع" @if (old('Location') == 'كلية المجتمع') selected="selected" @endif>كلية المجتمع</option>
                            <option value="البرج" @if (old('Location') == 'البرج') selected="selected" @endif>البرج</option>
                            <option value="عمادة القبول و التسجيل" @if (old('Location') == 'عمادة القبول و التسجيل') selected="selected" @endif>عمادة القبول و التسجيل</option>
                            <option value="البوابة" @if (old('Location') == 'البوابة') selected="selected" @endif>البوابة</option>
                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select  id="inputState" name="Field" class="form-control update_input with_select">
                            <option disabled="" selected="">نوع الفرصة التطوعية*</option>
                            <option value="اجتماعي">اجتماعي</option>
                            <option value="صحي">صحي</option>
                            <option value="نفسي">نفسي</option>
                            <option value="ترفيهي">ترفيهي</option>
                            <option value="ثقافي">ثقافي</option>
                            <option value="تربوي">تربوي</option>
                            <option value="رياضي">رياضي</option>
                            <option value="فني">فني</option>
                            <option value="تقني">تقني</option>
                            <option value="عام">عام</option>
                            <option value="تعليمي">تعليمي</option>
                            <option value="تأهيلي">تأهيلي</option>
                            <option value="تدريبي">تدريبي</option>
                            <option value="خدمي">خدمي</option>
                            <option value="تنظيمي">تنظيمي</option>
                            <option value="إداري">إداري</option>
                            <option value="مالي">مالي</option>
                            <option value="إعلامي">إعلامي</option>
                            <option value="قانوني">قانوني</option>
                            <option value="بيئي">بيئي</option>
                            <option value="تسويقي">تسويقي</option>
                            <option value="الإغاثة">الإغاثة</option>
                            <option value="الأمن والسلامة">الأمن والسلامة</option>
                            <option value="هندسة">هندسة</option>
                            <option value="أخرى">أخرى</option>
                            <option value="عام">عام</option>
                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    @error('Location')
                    <div class="text-danger  Validation_message_first">
                        {{ $message }}
                        @error('Field')
                        <span class="text-danger  Validation_message_second">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    @enderror
                </div>
                <!-- Eleventh row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <button type="submit"  class="save_btn" style="background-color: #39c095!important;">نشر</button>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div></form>

<!-- Copyright -->
<footer class="p-2 text-white text-center align-items-center iPad-Pro" style="background-color:#39c095 ;">
    <div class="container">
        <p class="lead">حقوق النشر © 2021 جامعة نجران</p>
    </div>
</footer>


<!-- Script -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
