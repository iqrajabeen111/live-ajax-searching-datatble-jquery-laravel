<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function index()
    {
        // $branch = new Branches;
        // $TodoItem = User::all();
        // return view('Listusers', ['TodoItem' => $TodoItem]);
        
        return view('Listusers');
        //
    }

    public function showuser(Request $request)
    {
        $users = User::all();
        if($request->keyword != ''){
        $users = User::where('name','LIKE','%'.$request->keyword.'%')->get();
        }
        return response()->json([
           'employees' => $users
        ]);
      
    }
    // public function searchdata($id)
    // {
    //     // return $id;

    //     $user = User::find($id);
  
    //     return response()->json($user);
    // }

}
