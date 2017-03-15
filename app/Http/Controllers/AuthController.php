<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller{
    public function home(){
        return view('home');
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        # code...
        $rules = array(
            'email' => 'required|max:255',
            'password'  => 'required',
        );
        $this->validate($request, $rules);

        $userData = array(
            'email' => $request->get('email'),
            'password'  => $request->get('password')
        );

        if(Auth::attempt($userData, $request->get('remember'))){
           return redirect()
                ->intended('/todo')
                ->with('flash_notification.message', 'Logged in successfully.')
                ->with('flash_notification.level', 'success');
        }else{

            //if error occurs display with erros
            return redirect()
                ->intended('/login')
                ->with('flash_notification.message', 'Wrong email or password.')
                ->with('flash_notification.level', 'danger');
        }

    }


    public function logout(){
        Auth::logout();

        return redirect('/')
        ->with('flash_notification.message', 'Logged out successfully.')
        ->with('flash_notification.level', 'success');
    }


}
