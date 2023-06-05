<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Term;
use App\Models\Question;
use App\Models\Gameresult;
use App\Http\Requests\Questionreq;

class Gamecontroller extends Controller
{
    //
	public function gamequestions(Request $request)
	{
       //game questions
		    $gra = $request->gra;
		    $subj = $request->subj;
		    $term = $request->term;
		    $examid = $request->examid;
		    $userid   = auth('sanctum')->user()->id ;

	        $allq = Question::where(['grade_id'=>$gra,'subject_id'=>$subj,'term_id'=>$term])->get();
	         return response()->json([
                       'status'=>'success' ,
                       'msg' =>'  ' ,
                       'data'=> $allq,
                            ]);    
			
	}

//////add game marks//////////////////////////
		public function addmarks(Request $request)
	{
       //game questions
		    $marks = $request->marks;
		    $userid   = auth('sanctum')->user()->id ;
		    $gra = $request->gamesettings['gra'];
		    $subj = $request->gamesettings['subj'];
		    $term = $request->gamesettings['term'];
		    // $examid = $request->gamesettings->examid;
		    $userid   = auth('sanctum')->user()->id ;
		    $name   = auth('sanctum')->user()->name ;

	        $allr = Gameresult::where(['grade_id'=>$gra,'subject_id'=>$subj,'term_id'=>$term,
	        	'user_id'=>$userid])
	              // ->orderBy('id', 'DESC')
	              ->first();

	          if($allr){

	          	    $allr->update([
                       'mark' => $allr->mark + $marks ,
	          	    ]);
	          	  	  return response()->json([
                       'status'=>'success' ,
                       'msg' => $marks .' added to you' ,
                       'data'=> $marks ,
                            ]);    
	          }else{
	          	   Gameresult::create([
                        'grade_id'  =>$gra,
                        'subject_id'=>$subj,
                        'term_id'   =>$term,
                        'user_id'   => $userid,
                        'name'      => $name ,
                         'mark'     => $marks,
	          	  ]);
	          	   	  return response()->json([
                       'status'=>'success' ,
                       'msg' => $marks .' added to you' ,
                       'data'=>  $marks,
                            ]);   
	          }  
			
	}

	///////////////////////////////
		public function gameresults(Request $request)
	{
       //game questions
		    $gra = $request->gra;
		    $subj = $request->subj;
		    $term = $request->term;
		    $examid = $request->examid;
		    $userid   = auth('sanctum')->user()->id ;

	        $results = Gameresult::where(['grade_id'=>$gra,'subject_id'=>$subj,'term_id'=>$term,
	        	// 'user_id'=>$userid 
	            ])->with(['getuser'])->orderBy('mark', 'DESC')->get();	
	        	if($results) {
	              return response()->json([
                       'status'=>'success' ,
                       'msg' =>'  ' ,
                       'data'=> $results,
                            ]);    
				        		
	        	}        

	}

////////////////////////////////

}
