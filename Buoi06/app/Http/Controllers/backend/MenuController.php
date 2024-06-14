<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Menu::where('status','!=', 0)
        ->select(
        "id",
        "name",
        "link",
        "parent_id",
        "type",
        "position",
        "table_id",
        "sort_order",
        "status")
        ->orderBy('created_at', 'desc')
        ->get();

        $list_category = Category::where('status', '!=', 0)
        ->orderBy('created_at', 'DESC')
        ->select('id', 'name')
        ->get();

        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id','name')
            ->get();

        $list_topic = Topic::where('status', '!=', 0)
            ->orderBy('created_at','DESC')
            ->select ('id','name')
            ->get();

        $list_page = Post::where(['status' => 0, ['type','=','page']])
            ->orderBy ('title','ASC')
            ->select ('id','title') 
            ->get();

        return view("backend.menu.index", compact('list','list_category','list_brand','list_topic','list_page'));
    }


    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
    
        $menu->status = ($menu->status == 2) ? 1 : 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
    
        $menu->save(); // Lưu
        return redirect()->route('admin.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->createCategory)) {
            $listid = $request->categoryid;
            if ($listid) {
                foreach ($listid as $id) {
                    $category = Category::find($id);
                    if ($category != null) {
                        $menu = new Menu();
                        $menu->name = $category->name;
                        $menu->link = 'danh-muc/' . $category->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'category';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "Không có";
            }
        }
        if (isset($request->createBrand)) {
            $listid = $request->brandid;
            if ($listid) {
                foreach ($listid as $id) {
                    $brand = Brand::find($id);
                    if ($brand != null) {
                        $menu = new Menu();
                        $menu->name = $brand->name;
                        $menu->link = 'thuong-hieu/' . $brand->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'brand';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "Không có";
            }
        }
        if (isset($request->createTopic)) {
            $listid = $request->topicid;
            if ($listid) {
                foreach ($listid as $id) {
                    $topic = Topic::find($id);
                    if ($topic != null) {
                        $menu = new Menu();
                        $menu->name = $topic->name;
                        $menu->link = 'chu-de/' . $topic->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'topic';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "Không có";
            }
        }
        if (isset($request->createPage)) {
            $listid = $request->pageid;
            if ($listid) {
                foreach ($listid as $id) {
                    $page = Post::where([['id', '=', $id], ['type', '=', 'page']])->first();
                    if ($page != null) {
                        $menu = new Menu();
                        $menu->name = $page->title;
                        $menu->link = 'trang-don/' . $page->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'page';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "Không có";
            }
        }
        
        if (isset($request->createCustom)) {
            if (isset($request->name, $request->link)) {
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->parent_id = 0;
                $menu->sort_order = 0;
                $menu->type = 'custom';                
                $menu->position = $request->position;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = auth()->id() ?? 1;
                $menu->status = $request->status;   
                $menu->save();
                return redirect()->route('admin.menu.index');
            }
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
