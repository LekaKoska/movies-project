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
   <h2> {{$movie->title}}</h2>
<iframe width="560" height="315" src="https://www.youtube.com/embed/pQab51QNjAU?si=iO_MEwJmxFVj7ZGx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<form action="" method="">


<textarea placeholder="Enter a comment for this movie.." name="comment"></textarea>
<button>Send</button>
</form>

@endsection
</body>
</html>
