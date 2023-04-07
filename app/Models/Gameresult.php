<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gameresult extends Model
{
    //

    protected $fillable = [
        'id', 'user_id','grade_id','subject_id','term_id','mark','level','unit','name',
       
     ];
 
    
     protected $hidden = [
        
     ];
 
    public function getuser(){
      return $this->belongsTo(User::class, 'user_id','id');
    }

 
}
