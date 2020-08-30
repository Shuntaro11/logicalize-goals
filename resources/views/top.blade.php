@extends('layouts/app')

@section('title', 'Lozicalize Goals/トップページ')

@section('content')

  
 
  <a href="{{ route('login') }}">
    <button class="btn btn-secondary" type="button">{{ __('Login') }}</button>
  </a>
  <a href="{{ route('register') }}">
    <button class="btn btn-secondary" type="button">{{ __('Register') }}</button>
  </a>

@endsection