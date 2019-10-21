<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct(){
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(Request $request){
        $credentials = $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials,$request->has('remember'))){
            session()->flash('success','登录成功,欢迎回来');
            $fallback = route('users.show',Auth::user());
            return redirect()->intended($fallback);

        }else{
            session()->flash('danger','登录失败，抱歉');
            return redirect()->back()->withInput();
        }

    }


    public function destroy(){
        Auth::logout();
        session()->flash('success','您已经成功退出，返回到登录界面');
        return redirect('login');
    }
}
