<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRule;
use App\Models\prospects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class index extends Controller
{
    public function index(){
        if(Auth::check()){
            $prospect=prospects::with('hasPuesto')->paginate(15);
            return view("admin/home",compact(["prospect"]));
        }
        else{
            return view("welcome");
        }
    }
    public function login(loginRule $request){
        $email=$request->input("email",null);
        $password=$request->input("password",null);
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route("welcome");
        }
        else{
            return redirect()->route("login");
        }
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route("welcome");
        }
        else{
            return redirect()->route("welcome");
        }
    }
}
