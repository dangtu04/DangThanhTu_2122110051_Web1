<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Post::where('post.status','!=', 0)
        ->join('topic', 'post.topic_id', '=', 'topic.id')
        ->select(
        "post.id",
        "post.image",
        "post.title",
        "post.slug",
        "topic.name as topicname",
        "post.description",
        "post.detail",
        "post.type",
        "post.status")
        ->orderBy('post.created_at', 'desc')
        ->get();

        return view("backend.post.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $topics = Topic::where('status', '!=', 0)
        ->select('id', 'name')
        ->get();
    return view("backend.post.create", compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try {
            $post = new Post();

            $post->title = $request->title;
            $post->slug = Str::of($post->title)->slug('-');
            $post->detail = $request->detail;
            $post->description = $request->description;
            $post->topic_id = $request->topic_id;
            $post->type = $request->type;
            $post->status = $request->status;

            // Upload image
            if ($request->hasFile('image')) {
                $exten = $request->file('image')->extension();
                if (in_array($exten, ['jpg', 'png', 'gif', 'webp'])) {
                    $filename = Str::slug($post->title) . "." . $exten;
                    $request->image->move(public_path("images/posts"), $filename);
                    $post->image = $filename;
                } else {
                    return back()->withErrors(['image' => 'Loại file không hợp lệ, chỉ chấp nhận jpg, png, gif, webp']);
                }
            }

            $post->created_at = date('Y-m-d H:i:s');
            $post->created_by = Auth::id() ?? 1;
            $post->save();

            return redirect()->route('admin.post.index')->with('message', ['type' => 'success', 'msg' => 'Bài viết được thêm thành công.']);
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
