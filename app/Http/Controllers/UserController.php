<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get() ;
        return view('users', compact('users')) ;
    }

    public function toggleFollow(Request $request)
    {
        $user = User::find($request->user_id) ;
        $response = auth()->user()->toggleFollow($user) ;

        return response()->json(['success'=>$response]) ;
    }

   
}
