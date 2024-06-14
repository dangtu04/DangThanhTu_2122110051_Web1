<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Brand::where('status', '!=', 0)
        ->select(
        "brand.id",
        "brand.image",
        "brand.name",
        "brand.slug",
        "brand.description",
        "brand.status")
        ->orderBy('brand.created_at', 'desc')
        ->get();
        $htmlsortorder = "";
        foreach ($list as $items) {
            $htmlsortorder .= "<option value='$items->id'>Sau:" . $items->name . "</option>";     
        }

        return view("backend.brand.index", compact('list','htmlsortorder'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        try {
            $brand = new Brand();
    
            $brand->name = $request->name;
            $brand->slug = Str::of($brand->name)->slug('-');
            $brand->description = $request->description;
            $brand->sort_order = $request->sort_order;
    
            // Upload image
            if ($request->hasFile('image')) {
                $exten = $request->file('image')->extension();
                if (in_array($exten, ['jpg', 'png', 'gif', 'webp'])) {
                    $filename = $brand->slug . "." . $exten;
                    $request->image->move(public_path("images/brands"), $filename);
                    $brand->image = $filename;
                } else {
                    return back()->withErrors(['image' => 'Loại file không hợp lệ, chỉ chấp nhận jpg, png, gif, webp']);
                }
            }
    
            $brand->status = $request->status;    
            $brand->created_at = date('Y-m-d H:i:s');
            $brand->created_by = Auth::id() ?? 1;
            $brand->save();
    
            return redirect()->route('admin.brand.index')->with('message', ['type' => 'success', 'msg' => 'Thương hiệu được thêm thành công.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Có lỗi xảy ra, vui lòng thử lại!']);
        }
    }
    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
    
        $brand->status = ($brand->status == 2) ? 1 : 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
    
        $brand->save(); // Lưu
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null)
        {
            return redirect()->route('admin.brand.index');
        }
        return view("backend.brand.show", compact('brand'));
    }

    /**
     * DELETE
     */ 
    public function delete(string $id)
    {
        $brand = Brand::find($id);

        if ($brand == null) {
            return redirect()->route('admin.brand.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Thương hiệu không tồn tại.'
            ]);
        }

        $brand->status = 0;
        $brand->updated_at = date('Ymd H:i:s');
        $brand->updated_by = Auth::id() ?? 1;

        if ($brand->save()) {
            return redirect()->route('admin.brand.index')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa thương hiệu thành công.'
            ]);
        } else {
            return redirect()->route('admin.brand.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa thương hiệu thất bại.'
            ]);
        }
    }

    /**
     * TRASH
     */ 

     public function trash()
     {
         $list = Brand::where('status', '=', 0)
         ->select('id', 'name', 'slug', 'image', 'status')
         ->orderBy('created_at', 'desc')
         ->get();
         return view("backend.brand.trash", compact('list'));
     }

    /**
     * RESTORE
     *  status restore status=2
     */   
    public function restore(string $id)
    {
        $brand = Brand::find($id);
    
        if ($brand == null) {
            return redirect()->route('admin.brand.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Thương hiệu không tồn tại.'
            ]);
        }
    
        $brand->status = 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1;
    
        if ($brand->save()) {
            return redirect()->route('admin.brand.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Khôi phục thương hiệu thành công.'
            ]);
        } else {
            return redirect()->route('admin.brand.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Khôi phục thương hiệu thất bại.'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null)
        {
            return redirect()->route('admin.brand.index');
        }
    
        $list = Brand::where('status', '!=', 0)
            ->select('id', 'name', 'slug', 'image','description', 'status')
            ->orderBy('created_at', 'desc')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $item) {
            if ($brand->sort_order - 1 == $item->sort_order)
            {
                $htmlsortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau: " . $item->name . "</option>";
            }
            else
            {
                $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau: " . $item->name . "</option>";
            }
        }
        return view("backend.brand.edit", compact('brand', 'htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        $brand = Brand::find($id);

        if ($brand == null) {
            return redirect()->route('admin.brand.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Thương hiệu không tồn tại.'
            ]);
        }

        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;

        // Upload ảnh
        if ($request->image) {
            $extension = $request->file('image')->extension();

            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $brand->slug . '.' . $extension;
                $request->image->move(public_path('images/brands'), $filename);
                $brand->image = $filename;
            }
        }
        // Kết thúc upload    
        $brand->status = $request->status;
        $brand->updated_at = date('Y-m-d H:i:s');

        if ($brand->save()) {
            return redirect()->route('admin.brand.index')->with('message', [
                'type' => 'success',
                'msg' => 'Cập nhật thương hiệu thành công!'
            ]);
        } else {
            return redirect()->route('admin.brand.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Cập nhật thương hiệu thất bại.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);

        if ($brand == null) {
            return redirect()->route('admin.brand.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Thương hiệu không tồn tại.'
            ]);
        }

        if ($brand->delete()) {
            return redirect()->route('admin.brand.trash')->with('message', [
                'type' => 'warning',
                'msg' => 'Đã xóa thương hiệu khỏi CSDL.'
            ]);
        } else {
            return redirect()->route('admin.brand.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa thương hiệu khỏi CSDL thất bại.'
            ]);
        }
    }

}
