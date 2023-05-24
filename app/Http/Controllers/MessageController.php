<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function loadMessage(Request $request)
    // {
    //     if (!$request->id) {
    //         return;
    //     }

    //     $messages = Message::where(
    //         function ($query) use ($request) {
    //             $query->where('sender_user', Auth::user()->id)->where('receiver_user', $request->id);
    //         }
    //     )->orWhere(
    //             function ($query) use ($request) {
    //                 $query->where('sender_user', $request->id)->where('receiver_user', Auth::user()->id);
    //             }
    //         );

    //         return [];

    //         foreach ($messages as $message) {
    //             return [] = view('docteurs.message')->with('message',$message)->render();
    //         }
    // }
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
    public function envoyer()
    {
        return view('patients.envoyer');
    }
    public function envoi(Request $request)
    {
        $request->validate([
            'message'=>'required'
        ]);

        DB::table('messages')->insert(
            [
                'message'=>$request->message,
                'receiver_user'=>Auth::check(),
                'sender_user'=>Auth::user()->id
            ]
            );

        return back();
    }
}