<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABout</title>
</head>
<body>
    <h1>ABout</h1>
    <h1>List of user</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->id }}</li>
        @endforeach
    </ul>

</body>
</html>
