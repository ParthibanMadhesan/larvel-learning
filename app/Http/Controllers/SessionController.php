<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
      return view('auth.login');
    }

    public function store(){
        // dd(request()->all());

        //validate
         
        $attributes=request()->validate([
          'email'=>['required','email'],
          'password'=>['required']
        ]);
       

        //attemt to login the user
       if(! Auth::attempt($attributes))
       {
          throw ValidationException::withMessages([
             'email'=>'sorry those credintials doesnot match'
          ]);
       }

        //regenerate session token
          request()->session()->regenerate();
        //redirect
        return redirect('/jobs');
    }

    public function destroy(){
      
      Auth::logout();
      return redirect('/home');
    }
}
