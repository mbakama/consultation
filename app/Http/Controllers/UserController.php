<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->user_type == 1) {
                $all = User::where('user_type', '!=', '1');
                return view('docteur.index', compact('all'));
            } else {
                return view('patients.index');
            }

        } else {
            return redirect('login');
        }
    }
    public function messages()
    {
        if (Auth::check()) {
            if (Auth::user()->user_type == 1) {
                $all = User::where('user_type', '!=', '1')->paginate(10);
                return view('docteur.messages', compact('all'));
            } else {
                return view('patients.index');
            }

        }

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
        $i = User::find($id);
        $find = DB::table("messages")
        ->Join("users", function($join){
            $join->on("users.id", "=", "messages.sender_user");
        })
        ->join("users as u", function($join){
            $join->on("u.id", "=", "messages.sender_user");
        })
        // ->where("receiver_user",Auth::user()->id)
        // ->where("sender_user",$id)
        ->get();
        

        return view('docteur.show', compact('find','i'));
    }

    public function repondre($id)
    {
        $find = User::find($id);

        return view('docteur.repondre', compact('find'));
    }

    public function envoi(Request $request, $id)
    {
        $request->validate(
            [
                'message' => 'required'
            ]
        );

        $en = new Message;

        $en->message = $request->message;
        $en->sender_user = Auth::user()->id;
        $en->receiver_user = $id;
        // $en->users()->status = 1;

        $en->save();

        return redirect()->route('docteurs.show',$id);

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