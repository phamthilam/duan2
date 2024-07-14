<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cap nhat danh muc {{$category->name}}</title>
</head>
<body>
    <h1>cap nhat danh muc {{$category->name}}</h1>
    @if(session('msg'))
    <h2>{{session('msg')}}</h2>

    @endif
    <form action="{{route('categories.update', $category)}}" method="post">
    @csrf
    @method('PUT')
    name: <input type="text" name="name" id="" value="{{$category->name}}">
    <button type="submit">update</button>
    </form>
</body>
</html>