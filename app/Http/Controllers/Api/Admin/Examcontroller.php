<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Term;

class Examcontroller extends Controller
{
	////////grade//////////////
    //get all grades

    public function getgrades()
    {
     	$grades = Grade::orderBy('id', 'desc')->get();      
        return response()->json([
                       'status'=>'success' ,
                       'msg' =>'  ' ,
                       'data'=> $grades ,
                            ]);    
    }
/////save grade
    public function savegrade(Request $request)
    {
    	$id  = $request->id;
    	$name= $request->name;

    	$grade = Grade::create([
          'name'=>$name,
    	]);        
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have saved successfully  ' ,
                       'data'=> $grade ,
                            ]);    
    }
    ///save - edit- grade 
    public function saveeditgrade(Request $request)
    {
    	$id  = $request->id;
    	$name= $request->name;

    	$grade = Grade::find($id);
    	$grade->update([
             'name'=>$name,
    	 ]);
      
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have saved successfully  ' ,
                       'data'=> $grade ,
                            ]);    
    }
    //delete grade 
    public function deletegrade(Request $request)
    {
    	$id  = $request->id;
    	

    	$grade = Grade::find($id);
        $grade->delete();
          
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have deleted successfully  ' ,
                       'data'=> $id ,
                            ]);    
    }

/// subject ////////////////////////////////////////////////////////////////////////////

    public function getsubjects()
    {
     	$subjects = Subject::orderBy('id', 'desc')->get();      
        return response()->json([
                       'status'=>'success' ,
                       'msg' =>'  ' ,
                       'data'=> $subjects ,
                            ]);    
    }
/////save subject
    public function savesubject(Request $request)
    {
    	$id  = $request->id;
    	$name= $request->name;

    	$subject = Subject::create([
          'name'=>$name,
    	]);        
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have saved successfully  ' ,
                       'data'=> $subject ,
                            ]);    
    }
    ///save - edit- subject 
    public function saveeditsubject(Request $request)
    {
    	$id  = $request->id;
    	$name= $request->name;

    	$subject = Subject::find($id);
    	$subject->update([
             'name'=>$name,
    	 ]);
      
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have saved successfully  ' ,
                       'data'=> $subject ,
                            ]);    
    }
    //delete subject 
    public function deletesubject(Request $request)
    {
    	$id  = $request->id;
    	

    	$subject = Subject::find($id);
        $subject->delete();
          
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have deleted successfully  ' ,
                       'data'=> $id ,
                            ]);    
    }

///////////////////////////////////////term/////////////////////////////////////

    public function getterms()
    {
     	$terms = term::orderBy('id', 'desc')->get();      
        return response()->json([
                       'status'=>'success' ,
                       'msg' =>'  ' ,
                       'data'=> $terms ,
                            ]);    
    }
/////save term
    public function saveterm(Request $request)
    {
    	$id  = $request->id;
    	$name= $request->name;

    	$term = Term::create([
          'name'=>$name,
    	]);        
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have saved successfully  ' ,
                       'data'=> $term ,
                            ]);    
    }
    ///save - edit- term 
    public function saveeditterm(Request $request)
    {
    	$id  = $request->id;
    	$name= $request->name;

    	$term = Term::find($id);
    	$term->update([
             'name'=>$name,
    	 ]);
      
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have saved successfully  ' ,
                       'data'=> $term ,
                            ]);    
    }
    //delete term 
    public function deleteterm(Request $request)
    {
    	$id  = $request->id;
    	

    	$term = Term::find($id);
        $term->delete();
          
      return response()->json([
                       'status'=>'success' ,
                       'msg' =>' You have deleted successfully  ' ,
                       'data'=> $id ,
                            ]);    
    }










}
