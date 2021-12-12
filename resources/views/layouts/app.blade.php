<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CW2 | @yield('title')</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="{{route('posts.index')}}">CW2</a>
        <a href="{{route('posts.index')}}">Posts</a>
        <a href="{{route('groups.index')}}">Groups</a>
        <a href="{{route('profiles.index')}}">Profiles</a>
    </div>
    @if ($errors->any())
        <div>
            Error occurred!
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        @yield('content')
    </div>
</body>
</html>