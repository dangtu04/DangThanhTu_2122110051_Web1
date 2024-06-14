<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Product::where('product.status', '!=', 0)
    ->join('category', 'product.category_id', '=', 'category.id')
    ->join('brand', 'product.brand_id', '=', 'brand.id')
    ->select(
        "product.id",
        "product.image",
        "product.name",
        "category.name as categoryname",
        "brand.name as brandname",
        "product.price",
        "product.status"
    )
    ->orderBy('product.created_at', 'desc')
    ->get();

    return view("backend.product.index", compact('list'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $categories = Category::where('status', '!=', 0)
        ->select('id', 'name')
        ->get();
    $brands = Brand::where('status', '!=', 0)
        ->select('id', 'name')
        ->get();   
    return view("backend.product.create", compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = new Product();

            $product->name = $request->name;
            $product->slug = Str::of($product->name)->slug('-');
            $product->detail = $request->detail;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->price = $request->price;
            $product->pricesale = $request->pricesale;
            $product->status = $request->status;

            // Upload image
            if ($request->hasFile('image')) {
                $exten = $request->file('image')->extension();
                if (in_array($exten, ['jpg', 'png', 'gif', 'webp'])) {
                    $filename = Str::slug($product->name) . "." . $exten;
                    $request->image->move(public_path("images/products"), $filename);
                    $product->image = $filename;
                } else {
                    return back()->withErrors(['image' => 'Loại file không hợp lệ, chỉ chấp nhận jpg, png, gif, webp']);
                }
            }

            $product->created_at = date('Y-m-d H:i:s');
            $product->created_by = Auth::id() ?? 1;
            $product->save();

            return redirect()->route('admin.product.index')->with('message', ['type' => 'success', 'msg' => 'Sản phẩm được thêm thành công.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Có lỗi xảy ra, vui lòng thử lại!']);
        }
    }

    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
    
        $product->status = ($product->status == 2) ? 1 : 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
    
        $product->save(); // Lưu
        return redirect()->route('admin.product.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('product.id', $id)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->select(
                'product.*',
                'category.name as categoryname',
                'brand.name as brandname'
            )
            ->first();

        if ($product == null) {
            return redirect()->route('admin.product.index');
        }

        return view("backend.product.show", compact('product'));
    }

    /**
     * DELETE
     */ 
    public function delete(string $id)
    {
        $product = Product::find($id);

        if ($product == null) {
            return redirect()->route('admin.product.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Sản phẩm không tồn tại.'
            ]);
        }

        $product->status = 0;
        $product->updated_at = date('Ymd H:i:s');
        $product->updated_by = Auth::id() ?? 1;

        if ($product->save()) {
            return redirect()->route('admin.product.index')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa sản phẩm thành công.'
            ]);
        } else {
            return redirect()->route('admin.product.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa sản phẩm thất bại.'
            ]);
        }
    }


     /**
     * TRASH
     */ 

     public function trash()
     {
         $list = Product::where('product.status', '=', 0)
             ->join('category', 'product.category_id', '=', 'category.id')
             ->join('brand', 'product.brand_id', '=', 'brand.id')
             ->select(
                 'product.id',
                 'product.name',
                 'product.slug',
                 'product.image',
                 'category.name as categoryname',
                 'brand.name as brandname',
                 'product.status'
             )
             ->orderBy('product.created_at', 'desc')
             ->get();
         return view("backend.product.trash", compact('list'));
     }
     

     /**
     * RESTORE
     *  status restore status=2
     */   
    public function restore(string $id)
    {
        $product = Product::find($id);
    
        if ($product == null) {
            return redirect()->route('admin.product.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Sản phẩm không tồn tại.'
            ]);
        }
    
        $product->status = 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
    
        if ($product->save()) {
            return redirect()->route('admin.product.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Khôi phục sản phẩm thành công.'
            ]);
        } else {
            return redirect()->route('admin.product.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Khôi phục sản phẩm thất bại.'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if ($product == null)
        {
            return redirect()->route('admin.product.index');
        }
    
        $categories = Category::where('status', '!=', 0)
            ->select('id', 'name')
            ->get();
    
        $brands = Brand::where('status', '!=', 0)
            ->select('id', 'name')
            ->get();
    
        return view("backend.product.edit", compact('product', 'categories', 'brands'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);

        if ($product == null) {
            return redirect()->route('admin.product.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Sản phẩm không tồn tại.'
            ]);
        }

        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->detail = $request->detail;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');

        // Upload ảnh
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();

            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $product->slug . '.' . $extension;
                $request->image->move(public_path('images/products'), $filename);
                $product->image = $filename;
            }
        }

        if ($product->save()) {
            return redirect()->route('admin.product.index')->with('message', [
                'type' => 'success',
                'msg' => 'Cập nhật sản phẩm thành công!'
            ]);
        } else {
            return redirect()->route('admin.product.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Cập nhật sản phẩm thất bại.'
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product == null) {
            return redirect()->route('admin.product.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Sản phẩm không tồn tại.'
            ]);
        }

        if ($product->delete()) {
            return redirect()->route('admin.product.trash')->with('message', [
                'type' => 'warning',
                'msg' => 'Đã xóa sản phẩm khỏi CSDL.'
            ]);
        } else {
            return redirect()->route('admin.product.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa sản phẩm khỏi CSDL thất bại.'
            ]);
        }
    }
}
