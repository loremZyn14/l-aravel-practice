<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phones</title>
</head>
<body>
    <h1>Phones</h1>
    <h1>List of Phone</h1>
    <ul>
        @foreach ($phones as $phone)
            <li>{{ $phone->name }} <a href="/phones/{{$phone->id}}/edit">edit</a></li>
        @endforeach
    </ul>
    <form action="/phones" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="brand">Brand</label>
        <input type="text" name="brand">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
