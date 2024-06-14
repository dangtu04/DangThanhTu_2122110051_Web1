<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Order::where('order.status','!=', 0)
        ->join('user', 'order.user_id', '=', 'user.id')
        ->select(
        "order.id",
        "user.id as user_id",
        "order.delivery_name",
        "order.delivery_email",
        "order.delivery_phone",
        "order.delivery_address",
        "order.note",
        "order.status")
        ->orderBy('order.created_at', 'desc')
        ->get();

        return view("backend.order.index", compact('list'));
    }

    /**
     * STATUS
     */ 
    public function status(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
    
        $order->status = ($order->status == 2) ? 1 : 2;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1;
    
        $order->save(); // Lưu
        return redirect()->route('admin.order.index');
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
