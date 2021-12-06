<!DOCTYPE html>
<html lang="en" dir="ltr">
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
        <a href="{{route('Main')}}" class="navbar-brand ">Mutwae</a>
    </div>
</nav>


<!-- Sign-up form-->
<div class="container align-items-center justify-content-between mt-5">
    <div class="row ">
        <div class="col-md-6 d-none d-md-block iPadPro-custem">
            <img src="img/sign-in.svg" class="img-fluid middle-screen" style="margin-top: 9rem!important;" alt="">
        </div>

        <div class=" col-md-6 iPadPro-custem">
            <form class="form-horizontal"  action="{{ route('SignUp') }}" method="POST">
                <fieldset>
                    @csrf
                    <div id="legend">
                        <legend class="">Register</legend>
                    </div>
                    <!-- Regsiration -->
                    <div class="row">
                        <div class=" col-md-6">

                            <!-- First-Name -->
                            <div class="control-group">
                                <label class="control-label"  for="first_name">First Name</label>
                                <div class="controls ">
                                    <input type="text" id="first_name" name="first_name" placeholder="Enter Your First Name" class="input-xlarge @error('first_name') border-danger @endif" value="{{old('first_name')}}">
                                    @error('first_name')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">First Name Contains Letters Only</p>
                                </div>
                            </div>

                            <!-- Middle-Name -->
                            <div class="control-group">
                                <label class="control-label"  for="middle_name">Middle Name</label>
                                <div class="controls small-screen">
                                    <input type="text" id="middle_name" name="middle_name" placeholder="Enter Your Middle Name" class="input-xlarge @error('middle_name') border-danger @endif" value="{{old('middle_name')}}">
                                    @error('middle_name')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">Middle Name Contains Letters Only</p>
                                </div>
                            </div>

                            <!-- Last-Name -->
                            <div class="control-group">
                                <label class="control-label"  for="family_name">Last Name</label>
                                <div class="controls small-screen">
                                    <input type="text" id="family_name" name="family_name" placeholder="Enter Your Last Name" class="input-xlarge @error('family_name') border-danger @endif" value="{{old('family_name')}}">
                                    @error('family_name')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">Last Name Contains Letters Only</p>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="control-group">
                                <label class="control-label"  for="username">Username</label>
                                <div class="controls small-screen">
                                    <input type="text" id="username" name="username" placeholder="Enter Your Username" class="input-xlarge @error('username') border-danger @endif" value="{{old('username')}}">
                                    @error('username')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <!-- E-mail -->
                            <div class="control-group">
                                <label class="control-label" for="email">E-mail</label>
                                <div class="controls small-screen">
                                    <input type="email" id="email" name="email" placeholder="University Email" class="input-xlarge @error('email') border-danger @endif" value="{{old('email')}}">
                                    @error('email')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">Please provide your University <br>E-mail example:438100234@nu.edu.sa</p>
                                </div>
                            </div>


                        <!-- Password-->
                            <div class="control-group">
                                <label class="control-label" for="password">Password</label>
                                <div class="controls small-screen">
                                    <input type="password" id="password" name="password" placeholder="" class="input-xlarge @error('password') border-danger @endif">
                                    @error('password')
                                    <div class="text-danger  text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <p class="help-block">Your password must be at least 12 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character</p>
                                </div>
                            </div>

                            <!-- Password-Confirm -->
                            <div class="control-group">
                                <label class="control-label"  for="password_confirmation">Password (Confirm)</label>
                                <div class="controls small-screen">
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="" class="input-xlarge @error('password') border-danger @endif">

                                    <p class="help-block">Please confirm password</p>
                                </div>
                            </div>

                            <!-- Select -->
                            <div>
                                <label class="control-label"  for="Major">Major</label>
                                <select class="form-select small-screen @error('Select') border-danger @endif" aria-label="Default select example" id="Major" name="Select" value="0" {{(old('Select') == '0') ? 'checked' : ''}}>
                                    <option value="">Please Select Your Major</option>
                                    <option value="CS" @if (old('Select') == "CS") {{ 'selected' }} @endif >Computer Sceience</option>
                                    <option value="2" @if (old('Select') == "2") {{ 'selected' }} @endif>Information System</option>
                                    <option value="3" @if (old('Select') == "3") {{ 'selected' }} @endif>Software Engneering</option>
                                </select>
                                @error('Select')
                                <div class="text-danger  text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                                <p class="help-block">Please Select Your Major</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Radio -->
                        <div class="col-md-6">
                            <label class="control-label"  for="Gender" >Gender</label>
                            <div class="form-check small-screen">
                                <input class="form-check-input @error('gender') border-danger @endif" type="radio" name="gender" id="Male"  value="male" {{(old('gender') == 'male') ? 'checked' : ''}}>
                                <label class="form-check-label" for="Male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check small-screen">
                                <input class="form-check-input small-screen @error('gender') border-danger @endif" type="radio" name="gender" id="Female"  value="female" {{(old('gender') == 'female') ? 'checked' : ''}}>
                                <label class="form-check-label" for="Female">
                                    Female
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
                            <label class="control-label"  for="Work" >Work</label>
                            <div class="form-check">
                                <input class="form-check-input @error('work') border-danger @endif" type="radio" name="work" id="Student" value="student" {{(old('work') == 'student') ? 'checked' : ''}}>

                                <label class="form-check-label" for="Student">
                                    Student
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('work') border-danger @endif" type="radio" name="work" id="Faculty member" value="faculty member" {{(old('work') == 'faculty member') ? 'checked' : ''}}>
                                <label class="form-check-label" for="Faculty member">
                                    Faculty member
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('work') border-danger @endif" type="radio" name="work" id="Administrative" value="administrative" {{(old('work') == 'administrative') ? 'checked' : ''}}>
                                <label class="form-check-label" for="Administrative">
                                    Administrative
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
                                <button type="submit"  class="btn btn-success" style="background-color: #39c095;">Register</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Already  have an account? <a href="{{route('SignIn')}}"
                                                                                                  style="color: #39c095;">Login</a></p>
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
        <p class="p-2 mt-2">Copyright &copy; 2021 Najran University</p>
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
