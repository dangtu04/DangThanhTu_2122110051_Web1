<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
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
                    $filename = $banner->$slug . "." . $exten;
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
