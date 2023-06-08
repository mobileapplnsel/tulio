@extends('layouts.app')
@section('style')

<link rel="stylesheet" href="{{asset('styles/login-register.css')}}">

@endsection
@section('content')
<section class="login-content">
    <div class="wrapper">
        <div class="banner">
            <div class="titleContent">
                <p class="cursive-title">Tulio Portal</p>
                <p class="sub-title">
                    Your go-to process for creating gorgeous spaces for your clients
                </p>
            </div>
            <div class="image-container">
                <img src="{{asset('assets/live/A-ID-Login.jpg')}}" alt="" />
            </div>
        </div>
        <div class="login-form">

            @if (session('success'))
            <div class="text-success">
                {{ session('success') }}
            </div>
            @endif

            <h2>Login</h2>
            {!! Form::open(['route'=>'login','method'=>'post']) !!}
                <div>
                    {!! Form::email('email',null,['placeholder'=>'Email']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    {!! Form::password('password',['placeholder'=>'Password']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <p><a href="{{route('password.request')}}">Forgot password?</a></p>
                <button type="submit">Login</button>
            {!! Form::close() !!}
            <div class="not-member">
                <p>Not a member?</p>
                <a href="{{route('register')}}">Sign up</a>
            </div>
        </div>
    </div>
</section>
@endsection
