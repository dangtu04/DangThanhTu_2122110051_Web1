<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
