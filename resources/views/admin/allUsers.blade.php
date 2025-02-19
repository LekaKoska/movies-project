<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
@extends("layout")
@section("content")
    @foreach($users as $user)
        <p>{{$user->name}}</p>
        <p>{{$user->email}}</p>
    @endforeach
@endsection
</body>
</html>
