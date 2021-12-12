<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CW2 | @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="{{route('posts.index')}}">CW2</a>
            <a href="{{route('posts.index')}}">Posts</a>
            <a href="{{route('groups.index')}}">Groups</a>
            <a href="{{route('profiles.index')}}">Profiles</a>
            @if(Auth::check())
                <form method="POST" action="{{ route('logout') }}" style="float: right;">
                    @csrf
                    <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            @else
                <a href="{{route('register')}}" style="float: right;"> Register </a>
            @endif
        </div>
        <div>
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
</div>
</body>
</html>