<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Phone details</h1>
    <form action="/phones/{{$phone->id}}" method="post">
        @method('PUT')
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $phone->name}}">
        <label for="brand">Brand</label>
        <input type="text" name="brand" value="{{ $phone->brand}}">
        <button type="submit">Edit</button>
    </form>
</body>
</html>
