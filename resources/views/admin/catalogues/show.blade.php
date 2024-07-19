@extends('admin.layouts.master')
@section('title')
 Xem chi tiết danh mục sản phẩm: {{$model->name}}
@endsection
@section('content')
<table>
    <tr>
        <th>Trường</th>
        <th>Gía Trị</th>
    </tr>
    @foreach ($model->toArray() as $key=>$value )
         <tr>
        <td>{{$key}}</td>
        <td>
            @php
                if ($key=='cover') {
                    $url= \Storage::url($value);
                    echo "<img src=\"$url\" alt=\"\" width=\"50px\">";
                } elseif (\Str::contains($key,'is_')) {
                    echo $value
                    ?'<span class="badge bg-primary">Yes</span>'
                    :'<span class="badge bg-danger">No</span>';
                }
                else {
                    echo $value;
                }
            @endphp
               
        </td>
    </tr>
    @endforeach
   
</table>
@endsection

