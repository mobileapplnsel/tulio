@extends('layouts.admin')

@section('content')
@if(isset($variants))
@livewire('admin-product', ['product' => $product,'variants' => $variants])
@else
@livewire('admin-product', ['product' => $product])
@endif
@endsection