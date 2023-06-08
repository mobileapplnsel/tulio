@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('styles/about-us.css')}}"/>

</style>

@endsection

@section('content')

{{-- html --}}
<h2 id="bannerheading" style="">details</h2>
@endsection

@section('script')
<script>
let c = document.cookie.split(";").reduce( (ac, cv, i) => Object.assign(ac, {[cv.split('=')[0]]: cv.split('=')[1]}), {});

console.log(c);
</script>
@endsection
