<div class="header">

    <a class="nav-link" href="{{ route('login') }}">Sign in</a>

    @if (Route::has('register'))
        <a class="nav-link" href="{{ route('register') }}">Sign up</a>
    @endif

</div>