<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = [];
        $items = Chat::where(function ($query) {
            $query->where('receiver_id', Auth::user()->id)
                ->orWhere('sender_id', Auth::user()->id);
        })
        // So the messages appear in order.
        ->orderByDesc('created_at')
        ->get()
        ->groupBy(function($item)  {
            return $item->sender_id == Auth::user()->id ? $item->receiver_id : $item->sender_id;
        });
        foreach($items as $item){
            array_push( $chats,$item);
        }
        Chat::where('receiver_id', Auth::user()->id)->update(['isRead' => true]);
        return view('dashboard.chat',compact('chats'));
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
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
