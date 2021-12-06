
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
<br><br><br><br>

<!-- Heading-->
<div class="container container-body-iPad-Pro">
    <div class="row pt-6">
        <div class="col-12 text-center">
            <p class="pb-2" style="font-size: 24px;   font-weight: bold;  color: #036A3B; ">لوحة الافكار الجديدة</p>
            <p class=" mb-3">
                هل تود أن تكون من بين  المتطوعين شاركوا معنا بفكرة عمل تطوعي يساهم في تفعيل العمل التطوعي
                وتسمح بالمشاركة التطوعية من خلال فكرتك التي تتبناها الجامعة وستكون أنت الرائد والمرجعية في تنفيذها
            </p>
            <hr>
        </div>
    </div>
</div>


<form method="POST" action="{{url('MyVolunteerWorks/update')}}">
    <input type="hidden" name="WorkID" value="{{ $work->WorkID }}">
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
                        <input class="update_input with_placeholder" name="Name" id="Name"  type="text" placeholder="اسم الفرصة التطوعية*" value="{{$work->Name}}" >
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
                        <input class="update_input with_placeholder"type="text" name="Description" value = "{{$work->Description}}"  maxlength="200" style="resize: none; height: 150px;" >
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
                        <input class="update_input with_placeholder"  name="Skills" value = "{{$work->Skills}}" placeholder="المهارات المطلوبة للفرصة*" maxlength="200" style="resize: none; height: 150px;" >
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
                        <input class="update_input with_placeholder"  name="Tasks" value = "{{$work->Tasks}}" placeholder="المهام المطلوبة للفرصة*" maxlength="200" style="resize: none; height: 150px;" >
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
                        <input class="update_input with_placeholder" name="Benefits"  type="text" placeholder="الفوائد المكتسبة من الفرصة*" value = "{{$work->Benefits}}">
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
                        <input class="update_input with_placeholder" name="Communication"  type="text" placeholder="طريقة التواصل*" value = "{{$work->Communication}}">
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>

                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Volunteernum"  type="text" placeholder="عددد المتطوعين المطلوبين في الفرصة*" value = "{{$work->Volunteernum}}">
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
                        <input name="StartDate" placeholder="بداية التسجيل في الفرصة*" class="form-control update_input with_select" type="text" onfocus="(this.type='date')" id="date" value="{{$work->StartDate}}"
                               min="<?php $NewDate=date('m-d-Y', strtotime('+0 days')); echo $NewDate;?>" max="<?php $NewDate=date('m-d-Y', strtotime('+120 days')); echo $NewDate;?>">
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input name="EndDate" placeholder="نهاية التسجيل في الفرصة*" class="form-control update_input with_select" type="text" onfocus="(this.type='date')" id="date"  value="{{$work->EndDate}}"
                               min="<?php $NewDate=date('m-d-Y', strtotime('+0 days')); echo $NewDate;?>" max="<?php $NewDate=date('m-d-Y', strtotime('+120 days')); echo $NewDate;?>">
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <!--Third column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="volunteer_hours"  type="text" placeholder="عدد ساعات التطوع المطلوبة *" value = "{{$work->volunteer_hours}}">
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
                            <option disabled="" selected="">Gender*</option>
                            <option value="Male" {{($work->Gender === 'Male') ? 'Selected' : ''}} >ذكر</option>
                            <option value="Female" {{($work->Gender === 'Female') ? 'Selected' : ''}}>انثى</option>
                            <option value="Both" {{($work->Gender === 'Both') ? 'Selected' : ''}}>كلاهما</option>
                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>

                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select class="selectpicker form-control update_input with_select " multiple  id="inputState" name="Major[]">
                            <option disabled="" selected="">التخصصات المطلوبه في الفرصة*</option>

                            <option value="CS" {{($work->Major === 'CS') ? 'Selected' : ''}}>علوم الحاسب</option>
                            <option value="IS" {{($work->Major === 'IS') ? 'Selected' : ''}}>نظم المعلومات</option>
                            <option value="MD" {{($work->Major === 'MD') ? 'Selected' : ''}}>الطب</option>
                            <option value="DS" {{($work->Major === 'DS') ? 'Selected' : ''}}>طب الأسنان</option>
                            <option value="NS" {{($work->Major === 'NS') ? 'Selected' : ''}}>التمريض</option>
                            <option value="TS" {{($work->Major === 'TS') ? 'Selected' : ''}}>اللغات والترجمة</option>
                            <option value="EN" {{($work->Major === 'EN') ? 'Selected' : ''}}>الهندسة</option>
                            <option value="AD" {{($work->Major === 'AD') ? 'Selected' : ''}}>الادارة</option>
                            <option value="All" {{($work->Major === 'All') ? 'Selected' : ''}}>كل التخصصات</option>
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
                                <option value="كلية علوم الحاسب ونظم والمعلومات" {{($work->Major === 'كلية علوم الحاسب ونظم والمعلومات') ? 'Selected' : ''}}>كلية علوم الحاسب ونظم والمعلومات</option>
                                <option value="كلية الطب" {{($work->Location === 'كلية الطب') ? 'Selected' : ''}}>كلية الطب</option>
                                <option value="كلية طب الأسنان" {{($work->Location === 'كلية طب الأسنان') ? 'Selected' : ''}}>كلية طب الأسنان</option>
                                <option value="كلية الصيدلة" {{($work->Location === 'كلية الصيدلة') ? 'Selected' : ''}}>كلية الصيدلة</option>
                                <option value="كلية العلوم التطبيقية" {{($work->Location === 'كلية العلوم التطبيقية') ? 'Selected' : ''}}>كلية العلوم التطبيقية</option>
                                <option value="كلية التمريض" {{($work->Location === 'كلية التمريض') ? 'Selected' : ''}}>كلية التمريض</option>
                                <option value="كلية الهندسة" {{($work->Location === 'كلية الهندسة') ? 'Selected' : ''}}>كلية الهندسة</option>
                                <option value="كلية العلوم والأداب" {{($work->Location === 'كلية العلوم والأداب') ? 'Selected' : ''}}>كلية العلوم والأداب</option>
                                <option value="كلية الشريعة" {{($work->Location === 'كلية الشريعة') ? 'Selected' : ''}}>كلية الشريعة</option>
                                <option value="كلية اللغات و الترجمة" {{($work->Location === 'كلية اللغات و الترجمة') ? 'Selected' : ''}}>كلية اللغات و الترجمة</option>
                                <option value="كلية العلوم الإدارية" {{($work->Location === 'كلية العلوم الإدارية') ? 'Selected' : ''}}>كلية العلوم الإدارية</option>
                                <option value="كلية التربية" {{($work->Location === 'كلية التربية') ? 'Selected' : ''}}>كلية التربية</option>
                                <option value="كلية المجتمع" {{($work->Location === 'كلية المجتمع') ? 'Selected' : ''}}>كلية المجتمع</option>
                                <option value="البرج" {{($work->Location === 'البرج') ? 'Selected' : ''}}>البرج</option>
                                <option value="عمادة القبول و التسجيل" {{($work->Location === 'عمادة القبول و التسجيل') ? 'Selected' : ''}}>عمادة القبول و التسجيل</option>
                                <option value="البوابة" {{($work->Location === 'البوابة') ? 'Selected' : ''}}>البوابة</option>
                            </select>
                            <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                        </div>
                        <!--Second column -->
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <select  id="inputState" name="Field" class="form-control update_input with_select">
                                <option disabled="" selected="">نوع الفرصة التطوعية*</option>
                                <option value="اجتماعي" {{($work->Field === 'اجتماعي') ? 'Selected' : ''}}>اجتماعي</option>
                                <option value="صحي" {{($work->Field === 'صحي') ? 'Selected' : ''}}>صحي</option>
                                <option value="نفسي" {{($work->Field === 'نفسي') ? 'Selected' : ''}}>نفسي</option>
                                <option value="ترفيهي" {{($work->Field === 'ترفيهي') ? 'Selected' : ''}}>ترفيهي</option>
                                <option value="ثقافي" {{($work->Field === 'ثقافي') ? 'Selected' : ''}}>ثقافي</option>
                                <option value="تربوي" {{($work->Field === 'تربوي') ? 'Selected' : ''}}>تربوي</option>
                                <option value="رياضي" {{($work->Field === 'رياضي') ? 'Selected' : ''}}>رياضي</option>
                                <option value="فني" {{($work->Field === 'فني') ? 'Selected' : ''}}>فني</option>
                                <option value="تقني" {{($work->Field === 'تقني') ? 'Selected' : ''}}>تقني</option>
                                <option value="عام" {{($work->Field === 'عام') ? 'Selected' : ''}}>عام</option>
                                <option value="تعليمي" {{($work->Field === 'تعليمي') ? 'Selected' : ''}}>تعليمي</option>
                                <option value="تأهيلي" {{($work->Field === 'تأهيلي') ? 'Selected' : ''}}>تأهيلي</option>
                                <option value="تدريبي" {{($work->Field === 'تدريبي') ? 'Selected' : ''}}>تدريبي</option>
                                <option value="خدمي" {{($work->Field === 'خدمي') ? 'Selected' : ''}}>خدمي</option>
                                <option value="تنظيمي" {{($work->Field === 'تنظيمي') ? 'Selected' : ''}}>تنظيمي</option>
                                <option value="إداري" {{($work->Field === 'إداري') ? 'Selected' : ''}}>إداري</option>
                                <option value="مالي" {{($work->Field === 'مالي') ? 'Selected' : ''}}>مالي</option>
                                <option value="إعلامي" {{($work->Field === 'إعلامي') ? 'Selected' : ''}}>إعلامي</option>
                                <option value="قانوني" {{($work->Field === 'قانوني') ? 'Selected' : ''}}>قانوني</option>
                                <option value="بيئي" {{($work->Field === 'بيئي') ? 'Selected' : ''}}>بيئي</option>
                                <option value="تسويقي" {{($work->Field === 'تسويقي') ? 'Selected' : ''}}>تسويقي</option>
                                <option value="الإغاثة" {{($work->Field === 'الإغاثة') ? 'Selected' : ''}}>الإغاثة</option>
                                <option value="الأمن والسلامة" {{($work->Field === 'الأمن والسلامة') ? 'Selected' : ''}}>الأمن والسلامة</option>
                                <option value="هندسة" {{($work->Field === 'هندسة') ? 'Selected' : ''}}>هندسة</option>
                                <option value="أخرى" {{($work->Field === 'أخرى') ? 'Selected' : ''}}>أخرى</option>
                                <option value="عام" {{($work->Field === 'عام') ? 'Selected' : ''}}>عام</option>
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
                            <button type="submit"  class="save_btn" style="background-color: #39c095!important;">تحديث</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></form>

<!-- Copyright -->
<footer class="p-2 text-white text-center align-items-center iPad-Pro" style="background-color:#39c095 ;">
    <div class="container">
        <p class="lead">Copyright &copy; 2021 Najran University</p>
    </div>
</footer>


<!-- Script -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
