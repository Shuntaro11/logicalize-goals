@extends('layouts/app')

@section('title', 'Lozicalize Goals / welcome')

@section('content')

<div class="main-container">

  <div class="background-image"></div>
    <div class="main-text">Organize the goals in your head!!</div>
    <div class="main-text-sub">頭の中の目標を整理整頓しよう！！</div>
  
    <div>
      <a href="{{ route('login') }}">
        <button class="btn" type="button">{{ __('Login') }}</button>
      </a>
    </div>

    <div>
      <a href="{{ route('register') }}">
        <button class="btn" type="button">{{ __('Register') }}</button>
      </a>
    </div>

</div>
@endsection