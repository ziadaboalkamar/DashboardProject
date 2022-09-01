<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view("front.users.index",compact("users"));
    }

    public function create(){
        return view("front.users.create");
    }
    public function store(UserRequest $request){
        //dd($request); return $request
        // $validator = Validator::make($request->all(), [
        //     'email' => ['required', 'string', 'email','unique:users'],
        //     'password' => ['required', 'string'],
        //     'password_confirm' => ['required', 'string'],
        //     'name' => ['required','max:255'],
        //     "phone_number" =>['required']
        // ]); 
        // return redirect()->back()->with(["errors" => $validator ]);
 if($request){
            if($request->password == $request->password_confirm && $request->password != null){
                User::create([
                    "name"=>$request->name,
                    "password" =>bcrypt($request->password) ,
                    "email" =>$request->email,
                    "phone_number" =>$request->phone_number
                ]);
                toastr()->success('تم انشاء المستخدم بنجاح');
                return redirect()->route("user.index");
                /*
                        return redirect()->url("/users");
                                return redirect()->back();
                */
            }else{
             
     toastr()->error('كلمة المرور غير متطابقة');
     return redirect()->route("user.create");   
            }

        }
}

//   public function edit(Request $request,$id){

//     $user = User::find($id);
//     return view("front.users.edit",compact("user"));

//   }

    // public function update(Request $request,$id){
    // return $request;
    //     //dd($request); return $request

    //     UserDB::update([
    //         "name"=>$request->name,
    //         "password" =>bcrypt($request->password) ,
    //         "email" =>$request->email,
    //         "phone_number" =>$request->phone_number
    //     ]);
    //     toastr()->success('تم انشاء المستخدم بنجاح');
    //     return redirect()->route("user.index");


    // }
}
