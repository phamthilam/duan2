<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.catalogues.';
    const PATH_UPLOAD = 'catalogues';
    public function index()
    {
        
        $data = Catalogue::query()->latest('id')->paginate(5);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('cover');

        // ?? là kiểm tra trường is_active có tích ko 
        //nếu có thì giá trị giữ nguyên còn ko có thì mặc định là defaut 
        $data['is_active']=$data['is_active'] ?? 0;
        
        //kiểm tra xem file có tồn tại nếu tồn tại đẩy lên
        if ($request->hasFile('cover')) {
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }
        // tạo dữ liệu bằng eloquent
        Catalogue::query()->create($data);

        return redirect()->route('admin.catalogues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Catalogue::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Catalogue::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Tìm bản ghi với ID tương ứng. Nếu không tìm thấy, ném sang trang 404.
        $model = Catalogue::query()->findOrFail($id);
        $data = $request->except('cover');

        // ?? là kiểm tra trường is_active có tích ko 
        //nếu có thì giá trị giữ nguyên còn ko có thì mặc định là defaut 
        $data['is_active']=$data['is_active'] ?? 0;
        
        //kiểm tra xem file có tồn tại nếu tồn tại đẩy lên
        if ($request->hasFile('cover')) {
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }
        //lưu amhr trước khi update ảnh mới để xóa ảnh đi tránh ghi đè
        $curentCover=$model->cover;
        // tạo dữ liệu bằng eloquent
        $model->update($data);
        // check nếu ảnh cũ có giá trị và có nằm trong mục storage thì xóa ảnh trong storage
        if ($curentCover && Storage::exists($curentCover)) {
            Storage::delete($curentCover);
        }
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model = Catalogue::query()->findOrFail($id);
        $model->delete();
        if ($model->cover && Storage::exists($model->cover)) {
            Storage::delete($model->cover);
        }
        return back();
    }
}
