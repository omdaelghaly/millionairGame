<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Changepwd;
use App\Models\User;
use App\Models\Verifyuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Forgetpwdcontroller extends Controller
{
   


////////////////////////creat token and save and send email link//////////////////////////// 

    public function pwdsendemail(Request $request)
    {
          
          $email = $request->email;

           //set token
           $code = rand(10000,1000000);
           $token = md5($code);
           
           //set time expire
           $timeex = 60 * 60;  //1hour
           $time=date("Y-m-d H:i:s",$timeex);
           $limittime= strtotime($time);
            //time now 
           $timenow =  date("Y-m-d H:i:s");
           $now= strtotime($timenow);
            //time now + expire time
           $expire  = $now + $limittime;

     
        
        $user = User::select(['id','email','name'])->where('email',$email)->first();
              
              if($user){
                        

                            if($user->getverifyuser )
                            {
                                     //     //check expire < now if u dont want to send many times
                                     //updateif exist 
                                     $user->getverifyuser->update([
                                                                 'user_id' => $user->id,
                                                                 'token'   => $token,
                                                                 'expire'  => $expire
                                                                 ]);
                                   $user = User::where('email',$email)->with('getverifyuser')->first();
                                     Mail::to($user->email)->send(new Changepwd($user));

                                      return response()->json([
                                        'status'=>'success',
                                        //'user'  => $user ,
                                        'msg'   => __('myauth.emailsentpwd'),
                                    ]);
                             
                            }else
                            {   //creat new one
                                       Verifyuser::create([
                                         'user_id' => $user->id,
                                         'code'    => '0' ,
                                         'token'   => $token,
                                         'expire'  => $expire,
                                       ]);
  
                                $user = User::where('email',$email)->with('getverifyuser')->first();
                                  Mail::to($user->email)->send(new Changepwd($user));

                                      return response()->json([
                                        'status'=>'success',
                                        //'user'  => $user ,
                                        'msg'   => __('myauth.emailsentpwd'),
                                    ]);
                            
                            }


              }else{
                  return response()->json([
                        'status' => 'error',
                         'msg'  => __('myauth.emailnotexist'),
                  ]);
              }
        
    }



///////////////////callback return from email to site///////////////////////////////////////////

     public function callback_pwd_check(Request $request)
     {
                    //time now 
                    $email   = $request->emailx;
                    $token   = $request->tokenx;

                    $timenow =  date("Y-m-d H:i:s");
                    $now     = strtotime($timenow);
                    $user = User::select(['id','email','name'])->where('email',$email)->first();

                    $emailDB    = $user->email ;


                    //check if row exists in verify
                    if($user->getverifyuser)
                    {  
                             //check expire 
                             $expire     = $user->getverifyuser->expire ;
                             $tokenDB    = $user->getverifyuser->token ;


                                 if($now < $expire )//link is ok
                                 {

                                                     
                                             if($emailDB == $email && $tokenDB == $token  )
                                             {//link is ok 
                                             
                                              return response()->json([
                                               'status' => 'success',
                                               'msg'  => __('myauth.linkok'),
                                                ]);

                                             }else
                                             { // هناك خطا فى الرابط 
                                              return response()->json([
                                               'status' => 'error',
                                               'msg'  => __('myauth.linkwrongnew'),
                                                ]);
           
                                             }



                                 }else // link is expired
                                 {
                                   return response()->json([
                                               'status' => 'error',
                                               'msg'  =>  __('myauth.linkexpired'),
                                                ]);
                                 }


                    }else //no row verify u shoud send row and token....
                    {  
                          return response()->json([
                                               'status' => 'error',
                                               'msg'  =>  __('myauth.sendlinkfirst'),
                                                ]);
                    
                    }
                        
                    
                      
     }




     //////////////save new password ///////////////////////////////////////////////////////////

     public function savenewpwd(Request $request){
        
          //time now 
          $timenow =  date("Y-m-d H:i:s");
          $now     = strtotime($timenow);
         
          //make sure of datasend and data in verifyuser token/email
          $emailx      = $request->emailx;
          $tokenx      = $request->tokenx;
          $password    = $request->password;
          $confirmpwd  = $request->confirmpwd;

          $user = User::select(['id','email','name'])->where('email',$emailx)->first();
            
          if($user){ //user exists ->get token / expire

               if($user->getverifyuser)
                 {  
                      $expire     = $user->getverifyuser->expire ;
                      $tokenDB    = $user->getverifyuser->token ;
                      $emailDB    = $user->email ;

                      if($now < $expire ) //link still work not expired 
                      {
                                   if($emailDB == $emailx && $tokenDB == $tokenx  )/// link ok token/email
                                   {
                                                     if( $password == $confirmpwd)//validate password
                                                     {
                                                                if(strlen($password) >= 5)//pass length is ok
                                                                {
                                                                      //change password 
                                                                      $user->update([
                                                                        'password' => Hash::make($password),
                                                                       ]);
                                                           ////////////delete link////
                                                                    $user->getverifyuser->delete();
                                                                    //////////////////
                                                                       return response()->json([
                                                                        'status'=>'success',
                                                                        'msg'   => __('myauth.changepwdok'),
                                                                      ]);                                                                      
                                                                }else //pass lenght is too short
                                                                {
                                                                          return response()->json([
                                                                            'status'=>'error',
                                                                            'as'  => 'pwdshort' ,
                                                                            'msg'   => __('myauth.confirmpwd.min'),
                                                                          ]);
                                                                }

                                                     }else //passwords are not the same 
                                                     {
                                                              return response()->json([
                                                                'status'=>'error',
                                                                'as'  => 'pwdconf' ,
                                                                'msg'   => __('myauth.password.same'),
                                                              ]);
                                                     }
                                    
                                   }else //link is wrong token or email
                                   {
                                               return response()->json([
                                                 'status'=>'error',
                                                 'as'  => 'linkdamage' ,
                                                 'msg'   => __('myauth.linkdamage'),
                                               ]);
                                   }

                      }else //link expired
                      {
                           return response()->json([
                                               'status' => 'error',
                                               'msg'  => __('myauth.linkexpired'),
                                             ]);
                         
                      }
                }else//no link
                {
                      return response()->json([
                                               'status' => 'error',
                                               'msg'  =>  __('myauth.sendlinkfirst'),
                                                ]);
                }
                   
          }else //user not found return to send email
          {
                    return response()->json([
                      'status'=>'error',
                      'as'  => 'noemail' ,
                      'msg'   => __('myauth.linkwrong2'),
                    ]);
          }
       


     }





}
