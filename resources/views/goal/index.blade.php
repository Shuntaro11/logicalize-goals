@extends('layouts/app')

@section('title', 'Lozicalize Goals/トップページ')

@section('content')

<div class="top-container">

  @guest
    
      <div class="background-image"></div>
        <div class="main-text">Organize the goals in your head!!</div>
        <div class="main-text-sub">頭の中の目標を整理整頓しよう！！</div>
      
        <a href="{{ route('login') }}">
          <button class="btn" type="button">{{ __('Login') }}</button>
        </a>
        <a href="{{ route('register') }}">
          <button class="btn" type="button">{{ __('Register') }}</button>
        </a>

  @else

    @include("header")
    <a href="/goals/create">
      <button class="btn add-goal-btn" type="button">Add new goal</button>
    </a>

    <h4 >List of your goals</h4>

    <div class="goal-index">

      <a href="/" class="goal-link">ONEOKROCKのライブに行く</a>
      <a href="/" class="goal-link">両親の家を建てる</a>
      <a href="/" class="goal-link">Hawaii旅行へ行く</a>
      <a href="/" class="goal-link">IELTSでスコア6以上</a>
      <a href="/" class="goal-link">100万円貯金する</a>
      <a href="/" class="goal-link">ホノルルマラソンに出場する</a>
      <a href="/" class="goal-link">サザンのライブに行く</a>
      <a href="/" class="goal-link">10ヶ国旅をする</a>
      <a href="/" class="goal-link">Hawaii旅行へ行く</a>
      <a href="/" class="goal-link">IELTSでスコア6以上</a>
      <a href="/" class="goal-link">100万円貯金する</a>
      <a href="/" class="goal-link">ホノルルマラソンに出場する</a>

    </div>

  @endguest

</div>
@endsection