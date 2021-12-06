<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/VolunteerWork.blade.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        @media only screen
        and (min-device-width : 1024px)
        and (max-device-width : 1366px)
        and (orientation:portrait)
        {
            .iPad-Pro{
                margin-top: 10rem!important;

            }
            .iPadPro-custem{
                margin-top: 15rem!important;
                font-size: large;

            }
            .control-label{
                padding-bottom: 2px;
            }
            .container-body-iPad-Pro{
                padding-top: 51px;
            }
        }


        .form .with_placeholder {
            font-size: 20px;
            padding: 14px 22px !important;
        }
        .form .update_input {
            width: 100%;
            height: 48px;
            border-radius: 24px;
            border: solid 1px #d5d5d5;
            margin-bottom: 17px;
            padding-top: 21px;
            padding-right: 23px;
        }
        .form .with_select {
            font-size: 20px;
            padding: 9px 22px !important;
            text-align: left;
            margin-top: 0;
        }
        .form .update_input {
            width: 100%;
            height: 48px;
            border-radius: 24px;
            border: solid 1px #d5d5d5;
            margin-bottom: 17px;
            padding-top: 21px;
            padding-right: 23px;
        }
        .save_btn, .transparent_btn {
            font-size: 16px;
            font-weight: bold;
            margin-top: 31px;
            color: #fff;
            background-color: #39c095;
            border-radius: 24px;
            border: none;
            width: 100%;
            height: 48px;
            margin-bottom: 20px;
        }

    </style>
    <title>إنشاء عمل تطوعي</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar-dark py-3" style="background-color: #39c095;">
    <div class="container">
        <a href="#" class="navbar-brand ">Mutawe</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item ">
                <a href="{{route('Main')}}" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" > Go back to main page</a>
            </li>
            <li class="nav-item ">
                <a href="" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" >Arabic</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Heading-->
<div class="container container-body-iPad-Pro">
    <div class="row pt-5">
        <div class="col-12 text-center">
            <p class="pb-2" style="font-size: 24px;   font-weight: bold;  color: #036A3B; ">Create Volunteer Idea</p>
            <p class=" mb-3">
                Would you like to be among a million volunteers who participated with us with an idea of ​​volunteer work that contributes to activating volunteer work
                and allows volunteer participation through your idea that is adopted by the authorities and you will be the pioneer and reference in its implementation
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
                        <p class="pt-3 " style="font-size: 24px;   font-weight: bold;  color: #036A3B; ">  Suggest New Idea </p>
                    </div>
                </div>
                <!-- Second row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Name" value="" type="text" placeholder="The brand name of the volunteer idea*" required>
                    </div>
                </div>
                <!-- Third row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea class="update_input with_placeholder" required="" name="Description" placeholder="A brief explanation of the volunteer idea*" maxlength="200" style="resize: none; height: 150px;"></textarea>
                    </div>
                </div>
                <!-- Four row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea class="update_input with_placeholder" name="Goals" placeholder=" Suggest New Idea Goals*" style="resize: none; height: 150px;" maxlength="50" required=""></textarea>
                    </div>
                </div>
                <!-- Fifith row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Targeted" value="" type="text" placeholder="Beneficiaries of the volunteer idea">
                    </div>
                </div>
                <!-- Sixth row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Volunteernum" value="" type="text" placeholder="Number of Volunteers needed*">
                    </div>
                </div>
                <!-- seventh row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Period" value="" type="text" placeholder="The proposed duration of the volunteer idea*">
                    </div>
                </div>
                <!-- eighth row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="update_input with_placeholder" name="Communication" value="" type="text" placeholder="Communication way*">
                    </div>
                </div>

                <!-- nine row -->
                <div class="row">
                    <!--First column-->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select required="" id="inputState" name="Gender" class="form-control update_input with_select">
                            <option disabled="" selected="">Gender*</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Both">Both</option>
                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select required="" id="inputState" name="SpecializeId" class="form-control update_input with_select">
                            <option disabled="" selected="">Volunteer Required Major*</option>



                            <option value="CS">Computer Science</option>
                            <option value="IS">Information System</option>
                            <option value="MD">Medicine</option>
                            <option value="DS">Dentistry</option>
                            <option value="NS">Nursing</option>
                            <option value="TS">Translition</option>
                            <option value="EN">Engneering</option>
                            <option value="AD">Adminstration</option>
                            <option value="All">All Majors</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <!--
                            <option value="علوم حاسب">علوم حاسب</option>
                            <option value="نظم معلومات">نظم معلومات</option>
                            <option value="طب الأسنان">طب الأسنان</option>
                            <option value="لصيدلة">الصيدلة</option>
                            <option value="العلوم التطبيقية">العلوم التطبيقية</option>
                            <option value="التمريض">التمريض</option>
                            <option value="الهندسة">الهندسة</option>
                            <option value="لعلوم والأداب">العلوم والأداب</option>
                            <option value="الشريعة">الشريعة</option>
                            <option value="للغات و الترجمة">اللغات و الترجمة</option>
                            <option value="لعلوم الإدارية">العلوم الإدارية</option>
                            <option value="لطب البشري">الطب البشري</option>
                            <option value="جميع التخصصات">جميع التخصصات</option>
                            -->
                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                </div>


                <!-- eighth row -->
                <div class="row">
                    <!--First column-->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select required="" id="inputState" name="LocationId" class="form-control update_input with_select">
                            <option disabled="" selected="">Location of VoluneerWork*</option>
                            <option value="كلية الحاسب">College of Computer Sceince and Information System</option>
                            <option value="كلية الطب">كلية الطب</option>
                            <option value="كلية طب الأسنان">كلية طب الأسنان</option>
                            <option value="كلية الصيدلة">كلية الصيدلة</option>
                            <option value="كلية العلوم التطبيقية">كلية العلوم التطبيقية</option>
                            <option value="كلية التمريض">كلية التمريض</option>
                            <option value="كلية الهندسة">كلية الهندسة</option>
                            <option value="كلية العلوم والأداب">كلية العلوم والأداب</option>
                            <option value="كلية الشريعة">كلية الشريعة</option>
                            <option value="كلية اللغات و الترجمة">كلية اللغات و الترجمة</option>
                            <option value="كلية العلوم الإدارية">كلية العلوم الإدارية</option>
                            <option value="كلية التربية">كلية التربية</option>
                            <option value="كلية المجتمع">كلية المجتمع</option>
                            <option value="البرج">البرج</option>
                            <option value="عمادة القبول و التسجيل">عمادة القبول و التسجيل</option>
                            <option value="البوابة">البوابة</option>
                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                    <!--Second column -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <select required="" id="inputState" name="FieldId" class="form-control update_input with_select">
                            <option disabled="" selected="">The Feild of Volunteer Idea*</option>
                            <option value="ديني">Techincal</option>
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
                            <option value="السياحة">السياحة</option>
                            <option value="الإغاثة">الإغاثة</option>
                            <option value="الأمن والسلامة">الأمن والسلامة</option>
                            <option value="هندسة">هندسة</option>
                            <option value="أخرى">أخرى</option>
                            <option value="عام">عام</option>
                        </select>
                        <span class="arrow_icon"><i class="fas fa-angle-down"></i></span>
                    </div>
                </div>
                <!-- nineth row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <button type="submit"  class="save_btn">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Copyright -->
<footer class="p-2 text-white text-center align-items-center iPad-Pro" style="background-color:#39c095 ;">
    <div class="container">
        <p class="lead">Copyright &copy; 2021 Najran University</p>
    </div>
</footer>


<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous">
</script>
</body>
</html>
