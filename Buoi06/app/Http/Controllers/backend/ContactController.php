<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Contact::where('contact.status','!=', 0)
        ->join('user', 'contact.user_id', '=', 'user.id')
        ->select(
        "contact.id",
        "user.name as username",
        "contact.name",
        "contact.email",
        "contact.phone",
        "contact.title",
        "contact.content",
        "contact.replay_id",
        "contact.status")
        ->orderBy('contact.created_at', 'desc')
        ->get();

        return view("backend.contact.index", compact('list'));
    }

    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
    
        $contact->status = ($contact->status == 2) ? 1 : 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
    
        $contact->save(); // Lưu
        return redirect()->route('admin.contact.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Contact::where('contact.id', $id)
            ->join('user', 'contact.user_id', '=', 'user.id')
            ->select(
                "contact.id",
                "user.name as username",
                "contact.name",
                "contact.email",
                "contact.phone",
                "contact.title",
                "contact.content",
                "contact.replay_id",
                "contact.status",
                "contact.created_at",
                "contact.updated_at"
            )
            ->first();

        if ($contact == null) {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Liên lạc không tồn tại.'
            ]);
        }

        return view('backend.contact.show', compact('contact'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = Contact::where('contact.id', $id)
            ->join('user', 'contact.user_id', '=', 'user.id')
            ->select(
                "contact.id",
                "user.name as username",
                "contact.name",
                "contact.email",
                "contact.phone",
                "contact.title",
                "contact.content",
                "contact.replay_id",
                "contact.status",
                "contact.created_at",
                "contact.updated_at"
            )
            ->first();

        if ($contact == null) {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Liên lạc không tồn tại.'
            ]);
        }

        return view('backend.contact.edit', compact('contact'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
    
        if ($contact == null) {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Liên lạc không tồn tại.'
            ]);
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|integer'
        ]);
    
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->status = $request->status;
        $contact->updated_at = now();
    
        if ($contact->save()) {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'success',
                'msg' => 'Cập nhật liên lạc thành công!'
            ]);
        } else {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Cập nhật liên lạc thất bại.'
            ]);
        }
    }




     /**
     * DELETE
     */ 
    public function delete(string $id)
    {
        $contact = Contact::find($id);

        if ($contact == null) {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'danger',
                'msg' => 'liên lạc không tồn tại.'
            ]);
        }

        $contact->status = 0;
        $contact->updated_at = date('Ymd H:i:s');
        $contact->updated_by = Auth::id() ?? 1;

        if ($contact->save()) {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'success',
                'msg' => 'Xóa liên lạc thành công.'
            ]);
        } else {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa liên lạc thất bại.'
            ]);
        }
    }

     /**
     * TRASH
     */ 
    public function trash()
    {
        $list = Contact::where('contact.status', 0)
            ->join('user', 'contact.user_id', '=', 'user.id')
            ->select(
                "contact.id",
                "user.name as username",
                "contact.name",
                "contact.email",
                "contact.phone",
                "contact.title",
                "contact.content",
                "contact.replay_id",
                "contact.status",
                "contact.created_at",
                "contact.updated_at"
            )
            ->orderBy('contact.updated_at', 'desc')
            ->get();

        return view('backend.contact.trash', compact('list'));
    }


    /**
     * RESTORE
     *  status restore status=2
     */   
    public function restore(string $id)
    {
        $contact = Contact::find($id);
    
        if ($contact == null) {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Liên hệ không tồn tại.'
            ]);
        }
    
        $contact->status = 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1;
    
        if ($contact->save()) {
            return redirect()->route('admin.contact.trash')->with('message', [
                'type' => 'success',
                'msg' => 'Khôi phục liên hệ thành công.'
            ]);
        } else {
            return redirect()->route('admin.contact.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Khôi phục liên hệ thất bại.'
            ]);
        }
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);

        if ($contact == null) {
            return redirect()->route('admin.contact.index')->with('message', [
                'type' => 'danger',
                'msg' => 'Liên hệ không tồn tại.'
            ]);
        }

        if ($contact->delete()) {
            return redirect()->route('admin.contact.trash')->with('message', [
                'type' => 'warning',
                'msg' => 'Đã xóa liên hệ khỏi CSDL.'
            ]);
        } else {
            return redirect()->route('admin.contact.trash')->with('message', [
                'type' => 'danger',
                'msg' => 'Xóa liên hệ khỏi CSDL thất bại.'
            ]);
        }
    }

}
