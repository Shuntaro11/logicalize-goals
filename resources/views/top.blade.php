@extends('layouts/app')

@section('title', 'Lozicalize Goals/トップページ')

@section('content')
<div class="top-container">
  <div class="background-image"></div>
    <div class="main-text">Organize the goals in your head!!</div>
    <div class="main-text-sub">頭の中の目標を整理整頓しよう！！</div>
  
    <a href="{{ route('login') }}">
      <button class="btn btn-secondary" type="button">{{ __('Login') }}</button>
    </a>
    <a href="{{ route('register') }}">
      <button class="btn btn-secondary" type="button">{{ __('Register') }}</button>
    </a>
</div>
@endsection