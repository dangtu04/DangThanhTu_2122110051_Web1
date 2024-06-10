<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
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
