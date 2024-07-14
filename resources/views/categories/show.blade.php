<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hieenr thi danh muc {{$category->name}}</title>
</head>
<body>
    <ul>
        @foreach ($category->toArray() as $key=>$value)
        <li>{{$key}} : {{$value}}</li>
        @endforeach
    </ul>
</body>
</html>