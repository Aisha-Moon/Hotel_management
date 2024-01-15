<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        if(Auth::id()){
            $userType=Auth()->user()->userType;

            if($userType=='admin'){
                return view('admin.index');

            }
            else if($userType=='user'){

                return view('dashboard');

            }else{
                return redirect()->back();
            }
        }
    }
    public function home(){
        $data['header_title']="Hotel Management";
        return view('home.index',$data);
    }
}
