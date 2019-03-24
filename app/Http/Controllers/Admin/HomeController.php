<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['login','logout']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = UserRole::getUserRoleName(Auth::id());
        if ($roles){
            $role =$roles[0];
        }else{
            $role = '普通用户';
        }
        return view('home.index',compact('role'));
    }

    public function welcome(){
        return view('home.welcome');
    }

    public function login(Request $request){
        if ($request->all()){
            $credentials = $this->validate($request,['username'=>'required','password'=>'required']);
            if (Auth::guard()->attempt($credentials)){
                return redirect()->route('home')->with('success',config('hint.welcome'));
            }else{
                return back() -> with('hint',config('hint.error'));
            }
        }
        return view('home.login');
    }

    public function logout(){
        Auth::guard()->logout();
        return redirect()->route('login')->with('success',config('hint.back'));
    }
}
