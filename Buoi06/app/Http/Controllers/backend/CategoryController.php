<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('category.status','!=', 0)
        ->select(
        "category.id",
        "category.image",
        "category.name",
        "category.slug",
        "category.description",
        "category.sort_order",
        "category.parent_id",
        "category.status")
        ->orderBy('category.created_at', 'desc')
        ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $items) {
            $htmlparentid .= "<option value='$items->id'>" . $items->name . "</option>";
            $htmlsortorder .= "<option value='$items->id'>Sau:" . $items->name . "</option>";     
        }

        return view("backend.category.index", compact('list','htmlparentid','htmlsortorder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = new Category();
    
            $category->name = $request->name;
            $category->slug = Str::of($category->name)->slug('-');
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            $category->sort_order = $request->sort_order;
    
            // Upload image
            if ($request->hasFile('image')) {
                $exten = $request->file('image')->extension();
                if (in_array($exten, ['jpg', 'png', 'gif', 'webp'])) {
                    $filename = $category->slug . "." . $exten;
                    $request->image->move(public_path("images/categories"), $filename);
                    $category->image = $filename;
                } else {
                    return back()->withErrors(['image' => 'Loại file không hợp lệ, chỉ chấp nhận jpg, png, gif, webp']);
                }
            }
    
            $category->status = $request->status;
            $category->created_at = date('Y-m-d H:i:s');
            $category->created_by = Auth::id() ?? 1;
            $category->save();
    
            return redirect()->route('admin.category.index')->with('message', ['type' => 'success', 'msg' => 'Danh mục được thêm thành công.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Có lỗi xảy ra, vui lòng thử lại!']);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category == null)
        {
            return redirect()->route('admin.category.index');
        }
        return view("backend.category.show", compact('category'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        if ($category == null)
        {
            return redirect()->route('admin.category.index');
        }
    
        $list = Category::where('status', '!=', 0)
            ->select('id', 'name', 'slug', 'image', 'status')
            ->orderBy('created_at', 'desc')
            ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $item) {
            if ($category->parent_id == $item->id)
            {
                $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            }
            else
            {
                $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
            if ($category->sort_order - 1 == $item->sort_order)
            {
                $htmlsortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau: " . $item->name . "</option>";
            }
            else
            {
                $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau: " . $item->name . "</option>";
            }
        }
        return view("backend.category.edit", compact('category', 'htmlparentid', 'htmlsortorder'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        if ($category == null) {
            return redirect()->route('admin.category.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Danh mục không tồn tại.'
            ]);
        }

        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;

        // Upload ảnh
        if ($request->image) {
            $extension = $request->file('image')->extension();

            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $category->slug . '.' . $extension;
                $request->image->move(public_path('images/categories'), $filename);
                $category->image = $filename;
            }
        }
        // Kết thúc upload    
        $category->status = $request->status;
        $category->updated_at = date('Y-m-d H:i:s');

        if ($category->save()) {
            return redirect()->route('admin.category.index')->with('message', [
                'type' => 'success',
                'msg' => 'Cập nhật danh mục thành công!'
            ]);
        } else {
            return redirect()->route('admin.category.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Cập nhật danh mục thất bại.'
            ]);
        }
    }

    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
    
        $category->status = ($category->status == 2) ? 1 : 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
    
        $category->save(); // Lưu
        return redirect()->route('admin.category.index');
    }

    
    /**
     * TRASH
     */ 

    public function trash()
    {
        $list = Category::where('status', '=', 0)
        ->select('id', 'name', 'slug', 'image', 'status')
        ->orderBy('created_at', 'desc')
        ->get();
        return view("backend.category.trash", compact('list'));
    }


    /**
     * DELETE
     */ 
    public function delete(string $id)
    {
        $category = Category::find($id);

        if ($category == null) {
            return redirect()->route('admin.category.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Danh mục không tồn tại.'
            ]);
        }

        $category->status = 0;
        $category->updated_at = date('Ymd H:i:s');
        $category->updated_by = Auth::id() ?? 1;

        if ($category->save()) {
            return redirect()->route('admin.category.index')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa danh mục thành công.'
            ]);
        } else {
            return redirect()->route('admin.category.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa danh mục thất bại.'
            ]);
        }
    }


    /**
     * RESTORE
     *  status restore status=2
     */   
    public function restore(string $id)
    {
        $category = Category::find($id);
    
        if ($category == null) {
            return redirect()->route('admin.category.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Danh mục không tồn tại.'
            ]);
        }
    
        $category->status = 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
    
        if ($category->save()) {
            return redirect()->route('admin.category.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Khôi phục danh mục thành công.'
            ]);
        } else {
            return redirect()->route('admin.category.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Khôi phục danh mục thất bại.'
            ]);
        }
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if ($category == null) {
            return redirect()->route('admin.category.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Danh mục không tồn tại.'
            ]);
        }

        if ($category->delete()) {
            return redirect()->route('admin.category.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa danh mục khỏi CSDL thành công.'
            ]);
        } else {
            return redirect()->route('admin.category.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa danh mục khỏi CSDL thất bại.'
            ]);
        }
    }

    
    
}
