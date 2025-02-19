@php use App\Models\GenreModel;use Illuminate\Support\Facades\Session; @endphp
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
    <form action="{{route("movies.add")}}" method="POST">
        {{csrf_field()}}
        @if($errors->any())
            <p class="text-danger"> {{($errors->all())}}  </p>
        @endif
        @if(Session::has("success"))
            <p class="text-primary">{{Session::get("success")}}</p>
        @endif
        <input type="text" placeholder="Enter a title of movie" name="title">

        <textarea placeholder="Enter a description" name="description"></textarea>

        <input type="text" placeholder="Enter a director name" name="author">

        <button>Add movie</button>

        @endsection
    </form>
</body>
</html>
