@php use Illuminate\Support\Facades\Session; @endphp
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
    <div>
    <h2> {{$movie->title}}</h2>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/pQab51QNjAU?si=iO_MEwJmxFVj7ZGx"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


    <form action="{{route("movies.comment", ["movie" => $movie->id])}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="hidden" name="movie_id" value="{{$movie->id}}">

        <textarea placeholder="Enter a comment for this movie.." name="comment"></textarea>
        <button>Send</button>
    </form>
    @if(Session::has("success"))
        <p class="text-success">{{Session::get("success")}}</p>
    @endif
    </div>

    <div>
        @foreach($movie->comments as $comments)
        <p>User:  {{$comments->user->name}}
        <p class="text-secondary fs-6 small">{{$comments->created_at}}</p>

        <p>Comment: {{$comments->content}}</p>
        @endforeach</p>




    </div>
@endsection
</body>
</html>
