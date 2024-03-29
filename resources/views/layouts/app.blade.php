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
        <link rel="stylesheet" href="{{ asset('css/my.css') }}">
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"
        integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ=="
        crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="topnav">
            <a style="margin-right: 20px; font-size: 21px; background-color:none;">Coursework2</a>
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
                <a style="float:right; margin-right:4px;" href="{{route('profiles.show', ['id'=> Auth::user()->userprofile])}}"> {{Auth::user()->name}} </a>
            @else
                <a href="{{route('register')}}" style="float: right; margin-left: 3px;"> Register </a>
                <a href="{{route('login')}}" style="float: right;"> Login </a>
            @endif
        </div>
        @if ($errors->any())
            <div class="errorbox">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main>
            <div class="center-col">
                @yield('content')
            </div>
        </main>
    </body>
</html>
</div>
</body>
</html>