@extends('layouts.app')

@section('content')
<div class="error404-page">
    <!-- Banner -->
    <section class="error-page-banner" style="background: url('{{asset('assets/404bg.svg')}}');">
      <div class="wrapper">
        <div class="content">
          <h2>Internal server error</h2>
          <p>
            Error 500 - our servers are experiencing some issues, please try again in sometime. 
          </p>
          <a href="{{route('home')}}" class="cta-button">Go to homepage</a>
        </div>
      </div>
    </section>
    <!-- Banner end -->
</div>
@endsection