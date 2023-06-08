@extends('layouts.user')
@section('style')
<link rel="stylesheet" href="{{asset('styles/project-1-page.css')}}"/>
<style>
    .pop-head {
        background: #d9d9d9;
        padding: 6px;
        color: black;
    }
    .pop-head a {
        float: right;
        color: black;
    }
</style>
@endsection
@section('content')
<section class="fulfillment-center">
    @livewire('project-board',['user'=>auth()->guard('designer')->user()])
</section>
@endsection
