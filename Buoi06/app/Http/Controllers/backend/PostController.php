<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
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
     * STATUS
     */ 
    public function status(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
    
        $post->status = ($post->status == 2) ? 1 : 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
    
        $post->save(); // Lưu
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::where('post.id', $id)
            ->join('topic', 'post.topic_id', '=', 'topic.id')
            ->select(
                'post.*',
                'topic.name as topicname'
            )
            ->first();

        if ($post == null) {
            return redirect()->route('admin.post.index');
        }

        return view("backend.post.show", compact('post'));
    }



    /**
     * DELETE
     */ 
    public function delete(string $id)
    {
        $post = Post::find($id);   

        if ($post == null) {
            return redirect()->route('admin.post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Bài viết không tồn tại.'
            ]);
        }

        $post->status = 0;
        $post->updated_at = date('Ymd H:i:s');
        $post->updated_by = Auth::id() ?? 1;

        if ($post->save()) {
            return redirect()->route('admin.post.index')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa bài viết thành công.'
            ]);
        } else {
            return redirect()->route('admin.post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa bài viết thất bại.'
            ]);
        }
    }


    /**
     * TRASH
     */ 
    public function trash()
    {
        $list = Post::where('post.status', '=', 0)
            ->join('topic', 'post.topic_id', '=', 'topic.id')
            ->select(
                'post.id',
                'post.title',
                'post.slug',
                'post.image',
                'post.detail',
                'post.description',
                'post.type',
                'topic.name as topicname',
                'post.status'
            )
            ->orderBy('post.created_at', 'desc')
            ->get();
        return view("backend.post.trash", compact('list'));
    }


     /**
     * RESTORE
     *  status restore status=2
     */   
    public function restore(string $id)
    {
        $post = Post::find($id);
    
        if ($post == null) {
            return redirect()->route('admin.post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Bài viết không tồn tại.'
            ]);
        }
    
        $post->status = 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;
    
        if ($post->save()) {
            return redirect()->route('admin.post.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Khôi phục bài viết thành công.'
            ]);
        } else {
            return redirect()->route('admin.post.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Khôi phục bài viết thất bại.'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if ($post == null)
        {
            return redirect()->route('admin.post.index');
        }
    
        $topics = Topic::where('status', '!=', 0)
            ->select('id', 'name')
            ->get();
        return view("backend.post.edit", compact('post', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::find($id);

        if ($post == null) {
            return redirect()->route('admin.post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Bài viết không tồn tại.'
            ]);
        }

        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;
        $post->status = $request->status;
        $post->updated_at = date('Y-m-d H:i:s');

        // Upload ảnh
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();

            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $post->slug . '.' . $extension;
                $request->image->move(public_path('images/posts'), $filename);
                $post->image = $filename;
            }
        }

        if ($post->save()) {
            return redirect()->route('admin.post.index')->with('message', [
                'type' => 'success',
                'msg' => 'Cập nhật bài viết thành công!'
            ]);
        } else {
            return redirect()->route('admin.post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Cập nhật bài viết thất bại.'
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ($post == null) {
            return redirect()->route('admin.post.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Bài viết không tồn tại.'
            ]);
        }

        if ($post->delete()) {
            return redirect()->route('admin.post.trash')->with('message', [
                'type' => 'warning',
                'msg' => 'Đã xóa bài viết khỏi CSDL.'
            ]);
        } else {
            return redirect()->route('admin.post.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa bài viết khỏi CSDL thất bại.'
            ]);
        }
    }
}
