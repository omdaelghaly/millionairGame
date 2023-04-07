<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class Examcontroller extends Controller
{
    //
    public function randomexam(Request $request){
                
                $gradeid = $request->gra ;
                $subjid  = $request->subj ;
                $termid  = $request->term ;
                $exid    = $request->exid ;

               $q = Question::where(['grade_id'=>$gradeid,'subject_id'=>$subjid,'term_id'=>$termid])->inRandomOrder()->limit(3)->get(); ;

                     return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have posted successfully  ' ,
                       'data'=> $q ,
                            ]);    
    }
}
