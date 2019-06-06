<div class="header">
    <div class="logo"><a href="/"><img src="" alt="logo"> Названия сайта</a></div>
    @if (Auth::check())
        <div><a href="{{ url('/logout') }}">Выход</a></div>
    @else
        <div class="logIn"><a href="{{ url('/login') }}">Вход</a></div>
        <div class="logIn"><a href="{{ url('/register') }}">регистрация</a></div>
    @endif
</div>