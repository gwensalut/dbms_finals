<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="{{ route('login.user') }}" method="post">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <button>Login</button>
        <p>Don't have account? <a href="{{ route('register.user') }}">Register</a> here</p>
    </form>
</body>

</html>