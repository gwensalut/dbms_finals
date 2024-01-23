<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="{{ route('register.user') }}" method="post">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <button>Register</button>
        <p>Already have account? <a href="{{ route('login.user') }}">Login</a> here</p>
    </form>
</body>

</html>