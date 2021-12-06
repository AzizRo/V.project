<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Sign-up</title>
    <link rel="stylesheet" href="css/sign-up.css">
    <link rel="stylesheet" href="{{asset('css/Styling.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title></title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar-dark py-3 " style="background-color: #39c095;">
    <div class="container">
        <a href="{{url('/')}}" class="navbar-brand ">منصة متطوع</a>
    </div>
</nav>


<!-- Sign-up form-->
<div class="container align-items-center justify-content-between mt-5">
    <div class="row ">
        <div class="col-md-6 d-none d-md-block iPadPro-custem">
            <img src="img/sign-in.svg" class="img-fluid middle-screen" style="margin-top: 9rem!important;" alt="">
        </div>

        <div class=" col-md-6 iPadPro-custem" >
            <form class="form-horizontal"  action="{{ route('Register') }}" method="POST">
                <fieldset>
                    @csrf
                    <div id="legend">
                        <legend class="">تسجيل</legend>
                    </div>
                    <!-- Regsiration -->
                    <div class="row">
                        <div class=" col-md-6">

                            <!-- First-Name -->
                            <div class="control-group">
                                <label class="control-label"  for="first_name">الاسم </label>
                                <div class="controls ">
                                    <input type="text" id="first_name" name="first_name"  class="input-xlarge @error('first_name') border-danger @endif" value="{{old('first_name')}}">
                                    @error('first_name')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">الاسم يحمل حروف فقط</p>
                                </div>
                            </div>

                            <!-- Middle-Name -->
                            <div class="control-group">
                                <label class="control-label"  for="middle_name">Middle Name</label>
                                <div class="controls small-screen">
                                    <input type="text" id="middle_name" name="middle_name"  class="input-xlarge @error('middle_name') border-danger @endif" value="{{old('middle_name')}}">
                                    @error('middle_name')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">اسم الاب يحمل حروف فقط</p>
                                </div>
                            </div>

                            <!-- Last-Name -->
                            <div class="control-group">
                                <label class="control-label"  for="family_name">اسم العائلة</label>
                                <div class="controls small-screen">
                                    <input type="text" id="family_name" name="family_name"  class="input-xlarge @error('family_name') border-danger @endif" value="{{old('family_name')}}">
                                    @error('family_name')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">اسم العائلة يحمل حروف فقط</p>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="control-group">
                                <label class="control-label"  for="username">اسم المستخدم</label>
                                <div class="controls small-screen">
                                    <input type="text" id="username" name="username"  class="input-xlarge @error('username') border-danger @endif" value="{{old('username')}}">
                                    @error('username')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">اسم المستخدم يمكن ان يحمل اي حرف او رقم, من غير مسافة</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6" >
                            <!-- E-mail -->
                            <div class="control-group" >
                                <label class="control-label" for="email">الايميل الجامعي</label>
                                <div class="controls small-screen">
                                    <input type="email" dir="ltr" id="email" name="email"  class="input-xlarge @error('email') border-danger @endif" value="{{old('email')}}">
                                    @error('email')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">الرجاء ادخال ايميلك الجامعي <br> مثال:438100234@nu.edu.sa</p>
                                </div>
                            </div>


                            <!-- Password-->
                            <div class="control-group">
                                <label class="control-label" for="password">كلمة المرور</label>
                                <div class="controls small-screen">
                                    <input type="password" id="password" name="password" class="input-xlarge @error('password') border-danger @endif">
                                    @error('password')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">يجب أن تتكون كلمة المرور الخاصة بك من 12 حرفًا على الأقل ، ويجب أن تحتوي على الأقل على حرف كبير واحد ، وحرف صغير واحد ، ورقم واحد ، وحرف خاص واحد</p>
                                </div>
                            </div>

                            <!-- Password-Confirm -->
                            <div class="control-group">
                                <label class="control-label"  for="password_confirmation">كلمة المرور (تأكيد)</label>
                                <div class="controls small-screen">
                                    <input type="password" id="password_confirmation" name="password_confirmation"  class="input-xlarge @error('password') border-danger @endif">

                                    <p class="help-block">الرجاء تأكيد كلمة المرور</p>
                                </div>
                            </div>

                            <!-- Select -->
                            <div>
                                <label class="control-label"  for="Major">التخصص</label>
                                <select class="form-select small-screen @error('Select') border-danger @endif" aria-label="Default select example" id="Major" name="Select" value="0" {{(old('Select') == '0') ? 'checked' : ''}}>
                                    <option value="">الرجاء تحديد تخصصك</option>
                                    <option value="Computer Sceience" @if (old('Select') == "Computer Sceience") {{ 'selected' }} @endif >علوم الحاسب</option>
                                    <option value="Information System" @if (old('Select') == "Information System") {{ 'selected' }} @endif>نظم المعلومات</option>
                                    <option value="Software Engneering" @if (old('Select') == "Software Engneering") {{ 'selected' }} @endif>هندسة البرمجيات</option>
                                </select>
                                @error('Select')
                                <div class="text-danger  text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                                <p class="help-block">الرجاء تحديد تخصصك</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Radio -->
                        <div class="col-md-6">
                            <label class="control-label"  for="Gender" >الجنس</label>
                            <div class="form-check small-screen">
                                <input class="form-check-input @error('gender') border-danger @endif" type="radio" name="gender" id="Male"  value="male" {{(old('gender') == 'male') ? 'checked' : ''}}>
                                <label class="form-check-label" for="Male">
                                    ذكر
                                </label>
                            </div>
                            <div class="form-check small-screen">
                                <input class="form-check-input small-screen @error('gender') border-danger @endif" type="radio" name="gender" id="Female"  value="female" {{(old('gender') == 'female') ? 'checked' : ''}}>
                                <label class="form-check-label" for="Female">
                                    انثى
                                </label>

                            </div>
                            @error('gender')
                            <div class="text-danger  text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Radio -->
                        <div class="col-md-6">
                            <label class="control-label"  for="Work" >العمل</label>
                            <div class="form-check">
                                <input class="form-check-input @error('work') border-danger @endif" type="radio" name="work" id="Student" value="student" {{(old('work') == 'student') ? 'checked' : ''}}>

                                <label class="form-check-label" for="Student">
                                    طالب
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('work') border-danger @endif" type="radio" name="work" id="Faculty member" value="faculty member" {{(old('work') == 'faculty member') ? 'checked' : ''}}>
                                <label class="form-check-label" for="Faculty member">
                                    عضو هيئة تدريس
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('work') border-danger @endif" type="radio" name="work" id="Administrative" value="administrative" {{(old('work') == 'administrative') ? 'checked' : ''}}>
                                <label class="form-check-label" for="Administrative">
                                    اداري
                                </label>

                            </div>
                            @error('work')
                            <div class="text-danger  text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Button -->
                        <div class="control-group pt-4 pt-md-0 ">
                            <div class="controls">
                                <button type="submit"  class="btn btn-success" style="background-color: #39c095;">تسجيل</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">لديك حساب مسبقا? <a href="{{route('Login')}}"
                                                                                                  style="color: #39c095;">دخول</a></p>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>


<!-- Copyright -->
<footer class="p-1 text-white text-center align-items-center mt-5 big-screen iPad iPad-Pro" style="background-color:#39c095 ;">
    <div class="container">
        <p class="p-2 mt-2">حقوق النشر © 2021 جامعة نجران</p>
    </div>
</footer>


<!-- Script -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous">
</script>


</body>
</html>
