<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','Api\Auth\Registercontroller@register')->name('register');
Route::post('/RTregister','Api\Auth\Registercontroller@RTregister')->name('RTregister');

Route::post('/login','Api\Auth\Logincontroller@login')->name('login');
Route::post('/RTlogin','Api\Auth\Logincontroller@RTlogin')->name('RTlogin');
//password verify
Route::post('/pwdsendemail', 'Api\Auth\Forgetpwdcontroller@pwdsendemail');
Route::post('callback_pwd_check', 'Api\Auth\Forgetpwdcontroller@callback_pwd_check')->name('callback_pwd_check');
Route::post('savenewpwd', 'Api\Auth\Forgetpwdcontroller@savenewpwd')->name('savenewpwd');
//home getposts
Route::get('/getposts','Api\User\Showcontroller@getposts')->name('getposts');

Route::group(['middleware'=>'auth:sanctum'], function(){

    Route::get('logout', 'Api\Auth\Logincontroller@logout');
    Route::post('/autologin', 'Api\Auth\Logincontroller@autologin');
    Route::post('refresh', 'Api\Auth\Logincontroller@refresh');
    Route::post('me', 'Api\Auth\Logincontroller@me');
    Route::post('sendverifyemail', 'Api\Auth\Verifyusercontroller@sendverifyemail');
    Route::post('callback_ve', 'Api\Auth\Verifyusercontroller@callback_ve')->name('callback_ve');

    Route::post('/savepost', 'Api\User\Postcontroller@savepost');
    Route::post('/savecomment', 'Api\User\Postcontroller@savecomment');
    Route::post('/deletepost', 'Api\User\Showcontroller@deletepost');
    Route::post('/deletecomment', 'Api\User\Showcontroller@deletecomment');
    Route::post('/like', 'Api\User\Postcontroller@like');
    Route::post('/comlike', 'Api\User\Postcontroller@comlike');
    Route::post('/savereply', 'Api\User\Postcontroller@savereply');
    Route::post('/deletereply', 'Api\User\Postcontroller@deletereply');
    Route::post('/editall', 'Api\User\Postcontroller@editall');
    //profile
    Route::post('/updatemyinfo', 'Api\User\Profilecontroller@updatemyinfo');
  //exam-setting
    Route::get('/getgrades', 'Api\Admin\Examcontroller@getgrades');
    Route::post('/savegrade', 'Api\Admin\Examcontroller@savegrade');
    Route::post('/saveeditgrade', 'Api\Admin\Examcontroller@saveeditgrade');
    Route::post('/deletegrade', 'Api\Admin\Examcontroller@deletegrade');
//subject
    Route::get('/getsubjects', 'Api\Admin\Examcontroller@getsubjects');
    Route::post('/savesubject', 'Api\Admin\Examcontroller@savesubject');
    Route::post('/saveeditsubject', 'Api\Admin\Examcontroller@saveeditsubject');
    Route::post('/deletesubject', 'Api\Admin\Examcontroller@deletesubject');
//term
    Route::get('/getterms', 'Api\Admin\Examcontroller@getterms');
    Route::post('/saveterm', 'Api\Admin\Examcontroller@saveterm');
    Route::post('/saveeditterm', 'Api\Admin\Examcontroller@saveeditterm');
    Route::post('/deleteterm', 'Api\Admin\Examcontroller@deleteterm');
//questions
    Route::get('/getquestions', 'Api\Admin\Questioncontroller@getquestions');
    Route::post('/saveq', 'Api\Admin\Questioncontroller@saveq');
    Route::post('/saveeditq', 'Api\Admin\Questioncontroller@saveeditq');
    Route::post('/deleteq', 'Api\Admin\Questioncontroller@deleteq');    

//exam
    Route::post('/randomexam', 'Api\User\Examcontroller@randomexam');
    Route::post('/sa', 'Api\User\Examcontroller@saveq');
    Route::post('/satq', 'Api\User\Examcontroller@saveeditq');
    Route::post('/deq', 'Api\User\Examcontroller@deleteq');    
//game
    Route::post('/gamequestions', 'Api\User\Gamecontroller@gamequestions');
    Route::post('/gameresults', 'Api\User\Gamecontroller@gameresults');
    Route::post('/addmarks', 'Api\User\Gamecontroller@addmarks');

    // Route::post('/deletetry', 'Api\User\Showcontroller@deletetry');
    
});

 // Route::get('callback_ve/e/{email}/t/{token}', 'Api\Auth\verifyusercontroller@callback_ve');
