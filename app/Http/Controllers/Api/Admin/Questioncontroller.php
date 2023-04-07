<?php



namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Term;
use App\Models\Question;
use App\Http\Requests\Questionreq;


class Questioncontroller extends Controller
{

	public function getquestions()
	{
       //ge questions
		    $userid   = auth('sanctum')->user()->id ;

	        $allq = Question::where('user_id',$userid)->get();
	         return response()->json([
                       'status'=>'success' ,
                       'msg' =>'  ' ,
                       'data'=> $allq,
                            ]);    
			
	}
    

   //saveq
	public function saveq(Questionreq $request)
	{
		      $userid      = auth('sanctum')->user()->id ;
		      $gradeid     = $request->gra;
		      $subjectid   = $request->subj;
		      $termid   = $request->term;
		      $examid   = $request->exid;
		      $q      = $request->q;
		      $a      = $request->a;
		      $b      = $request->b;
		      $c      = $request->c;
		      $d      = $request->d;
		      $x      = $request->x;
		      $i      = $request->i;

              $newq = Question::create([
                 'user_id'   =>  $userid ,
                 'grade_id'  =>  $gradeid ,
                 'subject_id'=>  $subjectid ,
                 'term_id'   =>  $termid ,
                 'exam_id'   =>  $examid ,
                 'q'         =>  $q ,
                 'a'         =>  $a ,
                 'b'         =>  $b ,
                 'c'         =>  $c ,
                 'd'         =>  $d ,
                 'x'         =>  $x ,
                 'i'         =>  $i ,
              ]);
                return response()->json([
                       'status'=>'success' ,
                       'msg' =>'saved successfully ' ,
                       'data'=> $newq,
                            ]);    
		
	}

	  //saveeditq
	public function saveeditq(Questionreq $request)
	{
		    //  $userid      = auth('sanctum')->user()->id ; //admin edit 
		      $userid      = $request->uid ;
		      $qid         = $request->qid ;
		      // $gradeid     = $request->gra;
		      // $subjectid   = $request->subj;
		      // $termid   = $request->term;
		      // $examid   = $request->exid;
		      $q      = $request->q;
		      $a      = $request->a;
		      $b      = $request->b;
		      $c      = $request->c;
		      $d      = $request->d;
		      $x      = $request->x;
		      $i      = $request->i;
              
              $neweditq = Question::find($qid);
              $neweditq->update([
                 // 'user_id'   =>  $userid ,
                 // 'grade_id'  =>  $gradeid ,
                 // 'subject_id'=>  $subjectid ,
                 // 'term_id'   =>  $termid ,
                 // 'exam_id'   =>  $examid ,
                 'q'         =>  $q ,
                 'a'         =>  $a ,
                 'b'         =>  $b ,
                 'c'         =>  $c ,
                 'd'         =>  $d ,
                 'x'         =>  $x ,
                 'i'         =>  $i ,
              ]);
                return response()->json([
                       'status'=>'success' ,
                       'msg' =>'edited successfully ' ,
                       'data'=> $neweditq,
                            ]);    
		
	}

	  //deleteq
	public function deleteq(Request $request)
	{
		      $userid      = auth('sanctum')->user()->id ;
		      $qid     = $request->qid;
             
              $q = Question::find($qid);
              $q->delete();
             
                return response()->json([
                       'status'=>'success' ,
                       'msg' =>'deleted successfully ' ,
                       'data'=> $qid,
                            ]);    
		
	}




}
