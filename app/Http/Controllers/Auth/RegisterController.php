<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['guest']);  //loginliyken register girme diye
    }
    
    public function index(){
         return view('auth.register');
    } 

    public function store(Request $request){
        //dd('abc');  //die dumb
        //dd($request->email);

        $this->validate($request,[ 
        'name' => 'required|max:255',  
        'username' => 'required|max:255', 
        'email' => 'required|email|max:255',
        'password' => 'required|confirmed',                                   
        ]); //thorws expection if validation fails - redirect to user back   
        
        //dd('store');



        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        //sign in
        // dd($request->only('email' ,'password'))  to see what is giving us
        
        auth()->attempt($request->only('email' ,'password'));
         

        return redirect()->route('dashboard');
        
        //validation
        //store user
        //sign the user
        //redirect
    }
}   
