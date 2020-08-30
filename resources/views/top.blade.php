@extends('layouts/app')

@section('title', 'Lozicalize Goals/トップページ')

@section('content')

<div class="top-container">

  @guest
    
      <div class="background-image"></div>
        <div class="main-text">Organize the goals in your head!!</div>
        <div class="main-text-sub">頭の中の目標を整理整頓しよう！！</div>
      
        <a href="{{ route('login') }}">
          <button class="btn btn-secondary" type="button">{{ __('Login') }}</button>
        </a>
        <a href="{{ route('register') }}">
          <button class="btn btn-secondary" type="button">{{ __('Register') }}</button>
        </a>

  @else

  @include("header")

    
  
    <!-- <form class="goal-form" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="main-text">What is your goal??</div>
      <div>
          <input id="email" class="input-group input-what" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="あなたの目標を入力してください">
          
          <div>
              @error('email')
                  <span role="alert">
                      <p class="form-error">{{ $message }}</p>
                  </span>
              @enderror
          </div>
      </div>

    </form> -->

  @endguest

</div>
@endsection