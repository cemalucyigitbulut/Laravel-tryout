<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);  //diyer şekil (web.php bak)
    }
    
    public function index(){
        
        //dd(auth()->user()->posts);

        return view('dashboard');
    }
}
