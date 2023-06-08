@extends('layouts.app')
@section('style')
<style>
    .login-content .iti__flag-container{
        top: 14px !important;
    }
    .login-content .iti__arrow {
    margin-left: 36px !important;
    margin-top: -8px !important;
    }
    .login-content .iti__selected-flag{
        padding: 0 6px 0 0px !important;
    }
    #error-msg2 {
            color: red !important;
            margin-bottom: 12px;
            margin-top: -12px;
            font-size: 14px
        }

        #valid-msg2 {
            color: green !important;
            margin-bottom: 12px;
            margin-top: -12px;
            font-size: 14px
        }

        .hide {
    display: none;
}
</style>
<link rel="stylesheet" href="{{asset('styles/login-register.css')}}">
<script type="text/javascript">
     $(document).ready(function() {
         $('#showhide').hide();
         $(document).on('change','#design',function(){
             var selectOption = $(this).val();
             if(selectOption == 'Architect' || selectOption == 'Designer' || selectOption == 'Hotelier'){
                 $('#showhide').show();
             }
             else
             {
                $('#showhide').hide(); 
             }
             
             
         });
    });
    
</script>

@endsection
@section('content')
<section class="login-content">
    <div class="wrapper">
        <div class="banner image-settle">
        <div class="titleContent">
            <p class="cursive-title">Tulio Portal</p>
            <p class="sub-title">
              Your go-to process for servicing clients better
            </p>
</div>
            <div class="image-container">
              <img src="{{asset('assets/live/A-ID-Login.jpg')}}" alt="">
            </div>
        </div>
        <div class="signup-form">
            <h2>Sign up</h2>
            {!! Form::open(['route'=>'register','method'=>'post']) !!}
                <div>
                    {!! Form::text('name',null,['placeholder'=>'First Name']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <div>
                        {!! Form::text('last_name',null,['placeholder'=>'Last Name']) !!}
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                        {!! Form::select('design', ['Architect'=>'Architect','Designer'=>'Designer','Hotelier'=>'Hotelier','Homeowner'=>'Homeowner','Tulio Team'=>'Tulio Team','Dealer'=>'Dealer','Contractor/PMC'=>'Contractor/PMC'],
                    request('design'),['class'=>'design','id'=>'design','placeholder'=>'Please Select']) !!}
                    <div id="showhide">
                       {!! Form::select('size', ['1'=>'1 Cr - 5 Cr','2'=>'5 Cr - 10 Cr','3'=>'10 Cr - 20 Cr','4'=>'20+ Cr'],
                    request('size'),['class'=>'size','id'=>'size','placeholder'=>'Please Select Handling Size']) !!} 
                        
                    </div>
                        @if ($errors->has('design'))
                            <span class="help-block">
                                <strong>{{ $errors->first('design') }}</strong>
                            </span>
                        @endif
                        {!! Form::text('company_studio_name',null,['placeholder'=>'Company / Studio name']) !!}
                    @if ($errors->has('company_studio_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('company_studio_name') }}</strong>
                        </span>
                    @endif
                    {!! Form::email('email',null,['placeholder'=>'Email']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    {!! Form::tel('phone_number',null,['placeholder'=>'Phone Number','id'=> 'phone2']) !!}
                    <span id="valid-msg2" class="hide">✓ Valid</span>
                    <span id="error-msg2" class="hide"></span>
                    <input type="hidden" name="iti__selected-dial-code">
                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    {!! Form::password('password',['placeholder'=>'Password']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    {!! Form::password('password_confirmation',['placeholder'=>'Confirm Password']) !!}
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="buttons">
                    <button type="submit" style="margin-top:0px;" class="cta-button-black">Sign up</button>
                </div>
            {!! Form::close() !!}
            <div class="not-member">
                <p>Already member?</p>
                <a href="{{route('login')}}">Login</a>
            </div>
        </div>
    </div>
</section>
@endsection


