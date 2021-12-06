@extends('layouts.app')



@section('content')

    <div >

        <div >

            <div >

                <h2>Edit New User</h2>

            </div>

            <div >

                <a  href="{{ route('users.index') }}"> Back</a>

            </div>

        </div>

    </div>



    @if (count($errors) > 0)

        <div >

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

    <div >

        <div >

            <div >

                <strong>Name:</strong>

                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

            </div>

        </div>

        <div >

            <div >

                <strong>Email:</strong>

                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

            </div>

        </div>

        <div >

            <div >

                <strong>Password:</strong>

                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

            </div>

        </div>

        <div >

            <div >

                <strong>Confirm Password:</strong>

                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

            </div>

        </div>

        <div >

            <div >

                <strong>Role:</strong>

                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

            </div>

        </div>

        <div >

            <button type="submit" >Submit</button>

        </div>

    </div>

    {!! Form::close() !!}



@endsection
