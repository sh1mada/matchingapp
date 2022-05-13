<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UsersController extends Controller
{
    public function search($id){
        $user=User::findOrFail($id);
       if($user->gender == 'man'){
            $users=User::where('gender','woman')->get();
        }else{
            $users=User::where('gender','man')->get();
        }
       
        return view('users.search' , [
                'users'=>$users,
            ]);
        
    }
    
    public function index(){
        return view('welcome');
    }
    
    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show',[
            'user'=>$user,
            ]);
    }
    
    public function action(){
        return view('users.action');
    }
    
    public function liked($id){
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $liked=$user->liked()->paginate(10);
        return view('user_like.liked',[
            'user'=>$user,
            'users'=>$liked,
            ]);
    }
    
    public function likes($id){
    $user = User::findOrFail($id);
    $user->loadRelationshipCounts();
    $likes=$user->likes()->paginate(10);
    return view('user_like.likes',[
        'user'=>$user,
        'users'=>$likes,
        ]);
    }
    
    
    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit',[
            'user'=>$user,
            ]);
    }
    
    public function friend($id){
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $friend=$user->liked()->paginate(10);
        return view('users.friend',[
            'user'=>$user,
            'users'=>$friend,
            ]);
    }
    
    
    public function update(Request $request, $id)
    {
        $user=User::FindOrFail($id);
        
        
        $user->hobby=$request->hobby;
        $user->residence=$request->residence;
        $user->content=$request->content;
        $user->birthday=$request->birthday;
        $user->food=$request->food;
        $user->salary=$request->salary;
        $user->job=$request->job;
        
        $file=$request->file('image');
        if(!empty($file)){
             $upload = Cloudinary::upload($file->getRealPath());
             $user->img_url=$upload->getSecurePath();
            
        }
        $user->save();
        
        return view('users.show',[
        'user'=>$user,
        ]);
    }
}
