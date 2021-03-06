<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    protected $fillable = [
        'name', 'email', 'password','gender','age',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['likes','liked']);
    }
    
    public function likes(){
        return $this->belongsToMany(User::class, "user_like", "user_id","like_id")
               ->withPivot('status')
               ->withTimestamps();
    }
    
    public function liked(){
        return $this->belongsToMany(User::class, "user_like", "like_id","user_id")
               ->withPivot('status')
               ->withTimestamps();
    }
    
    public function chat(){
        return $this->belongsToMany(User::class, "chats", "user_id","friend_id")
        ->withPivot(['message','created_at','updated_at']);
    }
    
    public function is_like($userId)
    {

        return $this->likes()->where('like_id', $userId)->exists();
    }
    
    public function is_likee($userId)
    {

        return $this->likes()->where('like_id', $userId)->exists();
    }
    
    
    public function is_liked()
    {
        return $this->likes()->where('status',1)->exists();
    }
    
    public function is_friend()
    {
        return $this->likes()->where('status',2)->exists();
    }
    
    public function is_rejection()
    {
        return $this->likes()->where('status',3)->doesntExist();
    }
    
    
    
    
    public function is__null()
    {
        
       
    }
    
    
    public function like($userId)
    {

        $exist = $this->is_like($userId);

        $its_me = $this->id == $userId;
        

        if ($exist || $its_me) {

            return false;
        } else {
            $this->likes()->attach($userId,['status'=>1]);
            
            return true;
        }
    }
    
    public function unlike($userId)
    {
        // ????????????????????????????????????
        $exist = $this->is_like($userId);
        // ?????????????????????????????????
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            // ?????????????????????????????????????????????????????????????????????????????????
            $this->likes()->detach($userId);
            return true;
        } else {
            // ???????????????????????????????????????
            return false;
        }
    }
    
    public function rejection($userId)
    {
        $its_me = $this->id == $userId;

        if (!$its_me) {
            $this->likes()->attach($userId,['status'=>3]);
            $this->liked()->updateExistingPivot($userId,['status'=>3]);
            
            return true;
        } else {
            // ???????????????????????????????????????
            return false;
        }
    }
    
    public function approval($userId)
    {
        $its_me = $this->id == $userId;

        if (!$its_me) {
            $this->likes()->attach($userId,['status'=>2]);
            $this->liked()->updateExistingPivot($userId,['status'=>2]);
            
            return true;
        } else {
            // ???????????????????????????????????????
            return false;
        }
    }
    
    public function sendmessage($message , $friend_id){
        
        $this->chat()->attach($friend_id,['message'=>$message]);
        
        return back();
    }
    
    public function get_messages($user_id,$friend_id)
    {
        return $this->chat()->where([['user_id',$user_id],['friend_id',$friend_id]])
                            ->orwhere([['user_id',$friend_id],['friend_id',$user_id]])
                            ->orderBy('pivot_created_at')->get();
                            
    }
    
    public function get_user()
    {
        return $this->likes()->where('status',null)->get();
    }
    
    public function message_null($user_id,$friend_id)
    {
        return $this->chat()->where([['user_id',$friend_id],['friend_id',$user_id]])->exists();
    }
    

}
