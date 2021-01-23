<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Admin;

use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

class AdminController extends Controller
{
    public function index (){

       return view('admin.index');
    }

    public function login(Request $request){
        $email = $request->email;
        $pass = $request->password;

        $logincheck = Admin::select('username','email','password')->Where('email','=',$email)
                        ->where('password',$pass)->get();
        if($logincheck->count() == 1){
            foreach($logincheck as $el){
             $request->Session()->put('username',$el->username);
             $request->Session()->put('role',$el->role);

             return redirect()->route('dashboard');
            }

        }else {

        }
        return redirect()->back()->with('failed','invalid login!');
    }


    public function logout(Request $request){
       $request->Session()->flush();
       return redirect()->route('index');
    }


    public function dashboard (){
        return view('admin.dashboard');
    }

    public function show_users(){
       $admins = Admin::get();

    //    foreach ($admins as $admin){
    //     //    if($admin->role == 1){
    //     //         $admin->role = 'admin';
    //     //    }else{
    //     //         $admin->role = 'super admin';
    //     //    }
    //     $admin->role = $admin->role ==1 ? 'Super Admin' : 'Admin';
    //    }

       return $admins;
    }


    public function create_category(){
        $categories = Category::paginate(3); //insteat of get() to paginate
        return view('admin.layout.create_category',compact('categories'));
    }

    public function create_product(){
        $categories = Category::get();
        return view('admin.layout.create_product',compact('categories'));
    }
}
