@extends('admin.layouts.master')
@section('title')
 Danh sách danh mục sản phẩm
@endsection
@section('content')
<a class="btn btn-primary mb-3" href="{{route('admin.catalogues.create')}}">Thêm mới</a>
<table>
    <tr>
        <th>ID </th>
        <th>Name </th>
        <th>Cover </th>
        <th>Is Active</th>
        <th>Created at</th>
        <th>Update at</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $item)
       
    <tr>
       
       
                <td>{{$item->id}} </th>
                <td>{{$item->name }}</td>
                {{-- cách hiển thị hình ảnh chạy lệnh php artisan storage:link 
                 '{{\Storage::url( ) }}' --}}
                <td>
                    <img src="{{ \Storage::url($item->cover)}}" alt="" width="50px">
                </td>
            {{-- hiển thi dạng html '{!!  !!}' --}}
                <td>{!!$item->is_active ? ' <span class="badge bg-primary">Yes</span>' : ' <span class="badge bg-danger">No</span>'!!}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td><a class="btn btn-info mb-3" href="{{route('admin.catalogues.show',$item->id)}}">xem</a>
                    <a class="btn btn-warning mb-3" href="{{route('admin.catalogues.edit',$item->id)}}">sửa</a>
                    <a class="btn btn-danger mb-3" onclick="return confirm('bạn có muỗn xóa')" href="{{route('admin.catalogues.destroy',$item->id)}}">xóa</a>
                
                </td>
    </tr> 
    @endforeach
</table>
{{$data->links()}}
@endsection
