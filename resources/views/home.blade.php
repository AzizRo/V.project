<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>home</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/home")}}">Home</a>
                </li>
                @if (Auth::check())

                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/profile")}}">Profile</a>
                    </li>
                    @can("isAdmin")


                        <li class="nav-item">
                            <a class="nav-link" href="{{url("/CreateWork")}}">Create work</a>
                        </li>
                    @endcan


                @endif


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    {{ __('You are logged in!') }}

                </div>

            </div>
            <table class="table table-hover">
                <thead>
                <th>Name  </th>
                <th>Description  </th>
                <th>Volunteernum</th>
                <th>Goals</th>
                <th>Period</th>
                <th>Communication</th>
                <th>SpecializeId</th>
                <th>LocationId</th>
                <th>Gender</th>
                <th>Actions</th>

                </thead>
                <tbody>
                @if (is_array($list) || is_object($list))

                @foreach($list as $list)
                <tr>
                <td>{{ $list ->Name }} </td>
                <td> {{ $list->Description }} </td>
                    <td> {{ $list->Volunteernum }} </td>
                    <td> {{ $list->Goals }} </td>
                    <td> {{ $list->Period }} </td>
                    <td> {{ $list->Communication }} </td>
                    <td> {{ $list->SpecializeId }} </td>
                    <td> {{ $list->LocationId }} </td>
                    <td> {{ $list->Gender }} </td>
                    <td>
                    <div class = "btn-group">
                        <a href="#" class="btn btn-success btn-xs">accept</a>
                        @can("isAdmin")
                        <a href="delete/{{{$list->id}}}" class="btn btn-danger btn-xs">Delete</a>
                        <a href="edit/{{{$list->id}}}" class="btn btn-primary btn-xs">Edit</a>
                        @endcan
                    </div>
                    </td>


                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

