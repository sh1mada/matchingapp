<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CloudinaryUploadController extends Controller
{
     public function store(Request $request,$user_id)
    {
        $file=$request->file('image');
        if(!empty($file)){
             $upload = Cloudinary::upload($file->getRealPath());
             $user->img_url=$upload->getSecurePath();
        }
        
     
    }
}
