@extends('layouts.app')

@section('content')
@include("header")

<div class="register-container">

    <form class="register-form" method="POST" action="{{ route('login') }}">
        @csrf

            <!-- <label for="email">Address</label> -->

            <div>
                <input id="email" class="input-group" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email...">
                
                <div>
                    @error('email')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- <label for="password">Password</label> -->

            <div>
                <input id="password" class="input-group" type="password" name="password" required autocomplete="current-password" placeholder="Password...">

                @error('password')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Login
            </button>
        
    </form>
    
</div>
                
@endsection
