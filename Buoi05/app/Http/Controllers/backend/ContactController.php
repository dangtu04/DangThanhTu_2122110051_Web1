<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

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
