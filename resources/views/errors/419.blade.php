@extends('layouts.app')

@section('content')
<div class="error404-page">
    <!-- Banner -->
    <section class="error-page-banner" style="background: url('{{asset('assets/404bg.svg')}}');">
      <div class="wrapper">
        <div class="content">
          <h2>Page Expired </h2>
          <a href="javascript:void(0)" onclick="window.location.reload()" class="cta-button">Refresh Page</a>
        </div>
      </div>
    </section>
    <!-- Banner end -->
</div>
@endsection