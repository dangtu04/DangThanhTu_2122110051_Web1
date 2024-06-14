<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('banner.status','!=', 0)
        ->select(
        "banner.id",     
        "banner.name",
        "banner.image",
        "banner.link",
        "banner.position",
        "banner.description",
        "banner.status")
        ->orderBy('banner.created_at', 'desc')
        ->get();
        return view("backend.banner.index", compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        try {
            $banner = new Banner();
    
            $banner->name = $request->name;
            $slug = Str::of($banner->name)->slug('-');
            $banner->description = $request->description;
            $banner->link = $request->link;
            $banner->position = $request->position;
    
            // Upload image
            if ($request->hasFile('image')) {
                $exten = $request->file('image')->extension();
                if (in_array($exten, ['jpg', 'png', 'gif', 'webp'])) {
                    $filename = Str::slug($banner->name) . "." . $exten;
                    $request->image->move(public_path("images/banners"), $filename);
                    $banner->image = $filename;
                } else {
                    return back()->withErrors(['image' => 'Loại file không hợp lệ, chỉ chấp nhận jpg, png, gif, webp']);
                }
            }
    
            $banner->status = $request->status;    
            $banner->created_at = date('Y-m-d H:i:s');
            $banner->created_by = Auth::id() ?? 1;
            $banner->save();
    
            return redirect()->route('admin.banner.index')->with('message', ['type' => 'success', 'msg' => 'Banner được thêm thành công.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Có lỗi xảy ra, vui lòng thử lại!']);
            // echo $e;
        }
    }


    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
    
        $banner->status = ($banner->status == 2) ? 1 : 2;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
    
        $banner->save(); // Lưu
        return redirect()->route('admin.banner.index');
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null)
        {
            return redirect()->route('admin.banner.index');
        }
        return view("backend.banner.show", compact('banner'));
    }

    /**
     * DELETE
     */ 
    public function delete(string $id)
    {
        $banner = Banner::find($id);

        if ($banner == null) {
            return redirect()->route('admin.banner.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Banner không tồn tại.'
            ]);
        }

        $banner->status = 0;
        $banner->updated_at = date('Ymd H:i:s');
        $banner->updated_by = Auth::id() ?? 1;

        if ($banner->save()) {
            return redirect()->route('admin.banner.index')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa Banner thành công.'
            ]);
        } else {
            return redirect()->route('admin.banner.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa Banner thất bại.'
            ]);
        }
    }


    /**
     * TRASH
     */ 
     public function trash()
     {
         $list = Banner::where('status', '=', 0)
         ->select('id', 'name', 'image', 'link', 'position', 'description',  'status')
         ->orderBy('created_at', 'desc')
         ->get();
         return view("backend.banner.trash", compact('list'));
     }


     /**
     * RESTORE
     *  status restore status=2
     */   
    public function restore(string $id)
    {
        $banner = Banner::find($id);
    
        if ($banner == null) {
            return redirect()->route('admin.banner.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Banner không tồn tại.'
            ]);
        }
    
        $banner->status = 1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
    
        if ($banner->save()) {
            return redirect()->route('admin.banner.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Khôi phục Banner thành công.'
            ]);
        } else {
            return redirect()->route('admin.banner.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Khôi phục Banner thất bại.'
            ]);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
    
        $list = Banner::where('status', '!=', 0)
            ->orderBy('position', 'asc')
            ->get();
    
        $htmlposition = "<option value='0'>None</option>";
        foreach ($list as $item) {
            if ($item->id != $banner->id) {
                $selected = ($banner->position == $item->position + 1) ? 'selected' : '';
                $htmlposition .= "<option value='" . ($item->position + 1) . "' $selected>Sau: " . $item->name . "</option>";
            }
        }
    
        return view("backend.banner.edit", compact('banner', 'htmlposition'));
    }
    



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, string $id)
{
    $banner = Banner::find($id);

    if ($banner == null) {
        return redirect()->route('admin.banner.index')->with('message', [
            'type' => 'danger',
            'msg' => 'Banner không tồn tại.'
        ]);
    }

    $banner->name = $request->name;
    $slug = Str::of($request->name)->slug('-');
    $banner->link = $request->link;
    $banner->description = $request->description;

    // Upload ảnh
    if ($request->image) {
        $extension = $request->file('image')->extension();

        if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
            $filename = $slug . '.' . $extension;
            $request->image->move(public_path('images/banners'), $filename);
            $banner->image = $filename;
        }
    }

    // Cập nhật vị trí
    $newPosition = $request->position;
    if ($banner->position != $newPosition) {
        // Tăng vị trí của các banner sau vị trí mới
        Banner::where('position', '>=', $newPosition)
            ->where('id', '!=', $banner->id)
            ->increment('position');

        // Cập nhật vị trí của banner hiện tại
        $banner->position = $newPosition;
    }

    $banner->status = $request->status;
    $banner->updated_at = date('Y-m-d H:i:s');

    if ($banner->save()) {
        return redirect()->route('admin.banner.index')->with('message', [
            'type' => 'success',
            'msg' => 'Cập nhật Banner thành công!'
        ]);
    } else {
        return redirect()->route('admin.banner.index')->with('message', [
            'type' => 'danger',
            'msg' => 'Cập nhật Banner thất bại.'
        ]);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);

        if ($banner == null) {
            return redirect()->route('admin.banner.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Banner không tồn tại.'
            ]);
        }

        if ($banner->delete()) {
            return redirect()->route('admin.banner.trash')->with('message', [
                'type' => 'warning',
                'msg' => 'Đã xóa Banner khỏi CSDL.'
            ]);
        } else {
            return redirect()->route('admin.banner.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa Banner khỏi CSDL thất bại.'
            ]);
        }
    }
}
