<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('user.status','!=', 0)
        ->select(
        "user.id",
        "user.image",
        "user.name",
        "user.username",
        "user.email",
        "user.phone",        
        "user.address",
        "user.roles",
        "user.status")
        ->orderBy('user.created_at', 'desc')
        ->get();

        return view("backend.user.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $slug = Str::of($user->name)->slug('-');
            $user->username = $request->username;
            $user->password = sha1($request->password);
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->roles = $request->roles;
            $user->status = $request->status;

            // Upload image
           if ($request->hasFile('image')) {
                $exten = $request->file('image')->extension();
                if (in_array($exten, ['jpg', 'png', 'gif', 'webp'])) {
                    $filename = $user>$slug . "." . $exten;
                    $request->image->move(public_path("images/users"), $filename);
                    $user->image = $filename;
                } else {
                    return back()->withErrors(['image' => 'Loại file không hợp lệ, chỉ chấp nhận jpg, png, gif, webp']);
                }
            }

            $user->created_at = date('Y-m-d H:i:s');
            $user->created_by = Auth::id() ?? 1;
            $user->save();

            return redirect()->route('admin.user.index')->with('message', ['type' => 'success', 'msg' => 'Sản phẩm được thêm thành công.']);
        } catch (\Exception $e) {
            // return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Có lỗi xảy ra, vui lòng thử lại!']);
            echo $e;
        }
    }


    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
    
        $user->status = ($user->status == 2) ? 1 : 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
    
        $user->save(); // Lưu
        return redirect()->route('admin.user.index');
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
