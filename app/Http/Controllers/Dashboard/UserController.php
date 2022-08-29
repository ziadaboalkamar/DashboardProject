<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view("front.users.index",compact("users"));
    }

    public function create(){
        return view("front.users.create");
    }
    public function store(Request $request){
        //dd($request); return $request
        
        User::create([
            "name"=>$request->name,
            "password" =>bcrypt($request->password) ,
            "email" =>$request->email,
            "phone_number" =>$request->phone_number
        ]);

        return view("front.users.create");
      

    }
}
