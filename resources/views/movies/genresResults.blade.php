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
    @foreach($results as $result)
        <div>
            <p><a class="btn btn-primary" href="{{route("movies.permalink", ["movie" => $result->movies->title])}}">{{ $result->movies->title  }}</a></p>
        </div>


    @endforeach

@endsection
</body>
</html>
