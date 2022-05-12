<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLikeController extends Controller
{
    public function store($id){
        \Auth::user()->like($id);
        return back();
    }
    
    /*public function destroy($id){
        \Auth::user()->unlike($id);
        return back();
    }*/
    
    public function destroy($id){
        \Auth::user()->rejection($id);
        return back();
    }
    
    public function approval($id){
        \Auth::user()->approval($id);
        return back();
    }
    

}