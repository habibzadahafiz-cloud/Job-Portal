<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login Lists</h1>
    @foreach ($login as $logins){
        <p>ID: {{ $logins->id }}<br> Name:{{ $logins->Name }}<br>Email:{{ $logins->email }}<br>Password:{{ $logins->Password }}</p>
    }
    <hr>

    @endforeach

</body>
</html>
