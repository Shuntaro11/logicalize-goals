<div id="header" class="header">

    <a class="nav-link" href="/goals">目標一覧</a>
    <a class="nav-link" href="/goals/achievedindex">達成済み</a>
    <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</div>