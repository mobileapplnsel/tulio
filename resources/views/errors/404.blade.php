@extends('layouts.app')

@section('content')
<div class="error404-page">
    <!-- Banner -->
    <section class="error-page-banner" style="background: url('{{asset('assets/404bg.svg')}}');">
      <div class="wrapper">
        <div class="content">
          <h2>Page not found</h2>
          <p>
            Error 404 - The page you are looking for might have been removed had
            it’s name changed or is temporarily unavailable.
          </p>
          <a href="{{route('home')}}" class="cta-button">Go to homepage</a>
        </div>
      </div>
    </section>
    <!-- Banner end -->
</div>
@endsection