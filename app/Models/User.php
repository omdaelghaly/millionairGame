<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
 
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name', 'email', 'password','verifyemail','job','about','image','getverifyuser'
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


      
      
    public function getverifyuser(){
        return $this->hasOne(Verifyuser::class, 'user_id','id');
  }


      
    public function getresults(){
        return $this->hasMany(Post::class, 'user_id','id');
  }

  //    public function getcomments(){
  //       return $this->hasMany(Comment::class, 'user_id','id');
  // }

  //      public function getreplys(){
  //       return $this->hasMany(Repl::class, 'user_id','id');
  // }




}
