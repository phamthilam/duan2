<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>list danh muc</h1>
    <a href="{{route('categories.create')}}">them moi</a>
    @if(session('msg'))
    <h2>{{session('msg')}}</h2>

    @endif
    <table>
        <tr>
            <th>id </th>
            <th>name </th>
            <th>create at </th>
            <th>update at </th>
            <th>action</th>
        </tr>
        @foreach($data as $item)
        <tr>
<th>{{$item->id }} </th>
<th>{{$item->name }} </th>
<th>{{$item->created_at }} </th>
<th>{{$item->updated_at }} </th>
            <th><a href="{{route('categories.show', $item)}}">show</a>
            <a href="{{route('categories.edit', $item)}}">suwar</a>
            <form action="{{route('categories.destroy', $item)}}" method="post">
                @csrf
@method('DELETE') 
<button onclick="return confirm('cos muoons xoas ko')" type="submit">xoa</button>
</form>
            
        </tr>
        @endforeach
    </table>
{{$data->links()}};
</body>
</html>