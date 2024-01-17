<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
       //dd($user);
        if ($user->role_id==2){
            return view('admin.admin');
        } 
        elseif ($user->role_id==1){
            return view('superadmin.superadmin');
        }        
        
        elseif ($user->role_id==3){
            return view('vendeur.vendeur');
        }  //return view('home');
        else {
            redirect()->back();
        }
    }
    public function adminHome()

    {

        return view('adminHome');
    }

}
