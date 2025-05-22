<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <nav>
        <a href="{{ route('users.index') }}">Users</a>
        <a href="{{ route('login-logs.index') }}">Logs</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
