<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
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
