<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>theem mowis danh mucj</title>
</head>
<body>
    <form action="{{route('categories.store')}}" method="post">
    @csrf
    name: <input type="text" name="name" id="">
    <button type="submit">them</button>
    </form>
</body>
</html>