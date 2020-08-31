@extends('layouts/app')

@section('title', 'Lozicalize Goals/What is your goal')

@section('content')

<div class="top-container">

    @include("header")
    
    <form class="goal-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="main-text">What is your goal??</div>
        <div>
            <input id="email" class="input-group input-what" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="達成したい目標を入力してください">
          
            <div>
                @error('email')
                    <span role="alert">
                        <p class="form-error">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>
    </form>

</div>
@endsection