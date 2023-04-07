<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    
    protected $fillable = [
        'id', 'user_id','grade_id','subject_id','term_id','exam_id','q','a','b',
        'c','d','x','i',
     ];
 
    
     protected $hidden = [
        
     ];
 
      
        public $timestamps = false;
 
}
