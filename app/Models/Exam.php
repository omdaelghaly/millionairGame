<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $fillable = [
        'id', 'user_id','grade_id','subject_id','term_id','name','mark','unit',
     ];
 
    
     protected $hidden = [
        
     ];
 
      
        public $timestamps = false;
 
}
