<div class="header">

    @auth

        <a class="nav-link" href="/">{{Auth::user()->name}}</a>
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    @else

        <a class="nav-link" href="{{ route('login') }}">Sign in</a>

        @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">Sign up</a>
        @endif
        
    @endauth

</div>