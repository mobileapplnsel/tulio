@extends('layouts.user')
@section('style')
<style>
.fulfillment-center form {width: 600px;margin: 50px auto;}

form .form-group {display: flex;align-items: center;border-bottom: 1px solid #ccc;width: 100%;justify-content: center;flex-wrap:wrap}

form .form-group input {padding: 10px;width: 70%;}

form .form-group:last-child {border-bottom: 0;}

form .form-group label {width: 30%;color: #333;}

form .form-group input.btn.btn-primary {background: #000;color: #fff;margin-top: 10px;width: auto;padding: 15px;text-transform: uppercase;}
form .form-group p.text-danger {color: #f00;font-size: 12px;width: 100%;padding-left: calc(30% + 10px);padding-bottom: 10px;}
h3 {font-weight: 500;
    font-size: 18px;
    padding: 30px 0% 16px 0%;
    color: #333;
}
.update-btn{
    width: 100px !important;
}
@media only screen and (max-width: 770px){
    .fulfillment-center form {
    margin: 0px 0px 50px;
}
}

</style>

@endsection
@section('content')
@php
    $user = auth()->guard('designer')->user();
@endphp
<section class="fulfillment-center">
    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    
    <div class="row">
        
        {!! Form::open(['route'=>'designer.profile','method'=>'POST']) !!}
        <h3>Profile Information</h3>
    <div class="form-group">
       
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('company_studio_name','Company / Studio') !!}
        {!! Form::text('company_studio_name',$user->company_studio_name,['class'=>'form-control']) !!}
        @error('company_studio_name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('phone_number','Phone Number') !!}
        {!! Form::text('phone_number',$user->phone_number,['class'=>'form-control']) !!}
        @error('phone_number')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    {{-- <h3>Contact Information</h3>
    <div class="form-group">
        {!! Form::label('poc_name','Contact Name') !!}
        {!! Form::text('poc_name',$user->poc_name,['class'=>'form-control','readonly']) !!}
        @error('poc_name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('poc_number','Contact Number') !!}
        {!! Form::text('poc_number',$user->poc_number,['class'=>'form-control','readonly']) !!}
        @error('poc_number')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div> --}}

    <h3>Reset Password</h3>
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
        @error('password')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation','Confirm Password') !!}
        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update',['class'=>'cta-button-black update-btn']) !!}
    </div>
    {!! Form::close() !!}
    </div>

</section>
@endsection
