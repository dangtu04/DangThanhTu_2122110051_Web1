<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Topic::where('topic.status','!=', 0)
        ->select(
        "topic.id",
        "topic.name",
        "topic.slug",
        "topic.description",
        "topic.status")
        ->orderBy('topic.created_at', 'desc')
        ->get();

        $htmlsortorder = "";
        foreach ($list as $items) {
            $htmlsortorder .= "<option value='$items->id'>Sau:" . $items->name . "</option>";     
        }
        return view("backend.topic.index", compact('list','htmlsortorder'));
    }
     /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        try {
            $topic = new Topic();    
            $topic->name = $request->name;
            $topic->slug = Str::of($topic->name)->slug('-');
            $topic->description = $request->description;
            $topic->sort_order = $request->sort_order;   
            $topic->status = $request->status;
            $topic->created_at = date('Y-m-d H:i:s');
            $topic->created_by = Auth::id() ?? 1;
            $topic->save();
    
            return redirect()->route('admin.topic.index')->with('message', ['type' => 'success', 'msg' => 'Chủ đề được thêm thành công.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Có lỗi xảy ra, vui lòng thử lại!']);
        }
    }

    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
    
        $topic->status = ($topic->status == 2) ? 1 : 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
    
        $topic->save(); // Lưu
        return redirect()->route('admin.topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null)
        {
            return redirect()->route('admin.topic.index');
        }
        return view("backend.topic.show", compact('topic'));
    }

    /**
     * DELETE
     */ 
    public function delete(string $id)
    {
        $topic = Topic::find($id);

        if ($topic == null) {
            return redirect()->route('admin.topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Chủ đề không tồn tại.'
            ]);
        }

        $topic->status = 0;
        $topic->updated_at = date('Ymd H:i:s');
        $topic->updated_by = Auth::id() ?? 1;

        if ($topic->save()) {
            return redirect()->route('admin.topic.index')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa chủ đề thành công.'
            ]);
        } else {
            return redirect()->route('admin.topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa chủ đề thất bại.'
            ]);
        }
    }


    /**
     * TRASH
     */ 

     public function trash()
     {
         $list = Topic::where('status', '=', 0)
         ->select('id', 'name', 'slug', 'description','sort_order','status')
         ->orderBy('created_at', 'desc')
         ->get();
         return view("backend.topic.trash", compact('list'));
     }


     /**
     * RESTORE
     *  status restore status=2
     */   
    public function restore(string $id)
    {
        $topic = Topic::find($id);
    
        if ($topic == null) {
            return redirect()->route('admin.topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Chủ đề không tồn tại.'
            ]);
        }
    
        $topic->status = 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;
    
        if ($topic->save()) {
            return redirect()->route('admin.topic.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Khôi phục chủ đề thành công.'
            ]);
        } else {
            return redirect()->route('admin.topic.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Khôi phục chủ đề thất bại.'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null)
        {
            return redirect()->route('admin.topic.index');
        }
    
        $list = Topic::where('status', '!=', 0)
            ->select('id', 'name', 'slug', 'description', 'sort_order', 'status')
            ->orderBy('created_at', 'desc')
            ->get();

        $htmlsortorder = "";
        foreach ($list as $items) {
            $htmlsortorder .= "<option value='$items->id'>Sau:" . $items->name . "</option>";     
        }

        return view("backend.topic.edit", compact('topic', 'htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
        $topic = Topic::find($id);

        if ($topic == null) {
            return redirect()->route('admin.topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Chủ đề không tồn tại.'
            ]);
        }

        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->updated_at = date('Y-m-d H:i:s');

        if ($topic->save()) {
            return redirect()->route('admin.topic.index')->with('message', [
                'type' => 'success',
                'msg' => 'Cập nhật chủ đề thành công!'
            ]);
        } else {
            return redirect()->route('admin.topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Cập nhật chủ đề thất bại.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::find($id);

        if ($topic == null) {
            return redirect()->route('admin.topic.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Chủ đề không tồn tại.'
            ]);
        }

        if ($topic->delete()) {
            return redirect()->route('admin.topic.trash')->with('message', [
                'type' => 'warning',
                'msg' => 'Đã xóa chủ đề khỏi CSDL.'
            ]);
        } else {
            return redirect()->route('admin.topic.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa chủ đề khỏi CSDL thất bại.'
            ]);
        }
    }

}
