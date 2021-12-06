@extends('app')

@section('content')


<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar-dark py-3 fixed-top" style="background-color: #39c095;">
    <div class="container">
        <a href="main.html" class="navbar-brand ">Mutwae</a>
    </div>
</nav>


<!-- Sign-in Form -->
<section class="vh-100">
    <div class="container-fluid h-custom">

        <div class="row d-flex justify-content-center align-items-center h-100">

            <!-- Image -->
            <div class="col-md-4 col-lg-6 col-xl-5 d-none d-md-block  ">

                <img src="img/sign-in.svg" class="img-fluid" alt="">
            </div>

            <!-- Text -->
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <div>
                    @if($message = Session::get('fail'))
                        <div class="alert alert-success alert-block">
                            <strong>{{$message}}</strong>
                        </div>
                    @endif
                </div>
                <form action="{{ route('signin.custom') }}" method="POST">
                    {{csrf_field()}}
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Sign in </p>
                    </div>
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0"></p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">

                        <input type="text" id="email" name="email" class="form-control form-control-lg"  placeholder="Enter a valid email address" required autofocus >
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span><br>
                        @endif
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password" id="password" class="form-control form-control-lg"  placeholder="Enter password" required autofocus >
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span><br>
                        @endif
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <!-- Checkbox -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" name="remember"   >
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <a href="{{ route('forgot-password') }}" class="text-body">Forgot password?</a>
                    </div>

                    <!-- Text-->
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn text-light btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #39c095;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register1"
                                                                                          style="color: #39c095;">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <footer class="p-2 text-white text-center align-items-center" style="background-color:#39c095 ;">
        <div class="container">
            <p class="p-2 mt-2" >Copyright &copy; 2021 Najran University</p>
        </div>
    </footer>

</section>


<!-- Script -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous">
</script>

@endsection
