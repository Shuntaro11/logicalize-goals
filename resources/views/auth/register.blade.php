@extends('layouts.app')

@section('content')
@include("gest-header")
<div class="register-container">

    <div class="background-image"></div>
    
    <form method="POST" class="register-form" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        
        <div>
            <input id="name" class="input-group" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name..." autofocus>

            <div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <p class="form-error">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <input id="email" class="input-group" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email...">
            
            <div>
                @error('email')
                    <span role="alert">
                        <p class="form-error">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <input id="password" class="input-group" type="password" name="password"  required autocomplete="current-password" placeholder="Password...">

            <div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <p class="form-error">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <input id="password-confirm" class="input-group" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation...">

        </div>

        <button type="submit" class="btn btn-primary">
            Sign up
        </button>


    </form>
    
</div>
@endsection
