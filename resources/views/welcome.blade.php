@extends('layouts.app')

@section('content')

<div class="container">
    <div class='row header-baner-custom'>
        <h1 class=''>Готовые маркетинговые связки</h1>
    </div>
    <div class='row for-header-baner-custom'>
        <h4>Выбирайте – покупайте - запускайте</h4>
    </div>

    <br><br>
    @include('cart.filters')
</div>

@include('cart.sort')

<div class='container'>

    @include('cart.index')
    <br>
    <br>
    @include('cart.faq')
    <br>
    <br>
    @include('cart.contact')
</div>

@endsection

@section('after_scripts')
    <script src="{{ asset('js/app-helper.js') }}" defer></script>
    <script src="{{ asset('js/app-custom.js') }}" defer></script>
@endsection

@section('description', 'Готовые маркетинговые связки')
@section('keywords', 'Готовые маркетинговые связки')
@section('title', 'Готовые маркетинговые связки')