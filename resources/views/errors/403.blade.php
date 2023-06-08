@extends('layouts.app')

@section('content')
<div class="error404-page">
    <!-- Banner -->
    <section class="error-page-banner" style="background: url('{{asset('assets/404bg.svg')}}');">
      <div class="wrapper">
        <div class="content">
          <h2>INVALID SIGNATURE</h2>
          <p>
            Error 403 - link expired.
          </p>
          <a href="{{route('home')}}" class="cta-button">Go to homepage</a>
        </div>
      </div>
    </section>
    <!-- Banner end -->
</div>
@endsection