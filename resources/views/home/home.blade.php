
@extends('layout.app')



@section('pagecontent')
    
    
		<div id="app">
  
      <div class="container-fluid m-0 p-0">
         <div class="raw">
             <mynavbar  class="col-12 p-0 m-0" mysite="{{config('app.name')}}" 
               :lang="{{ json_encode(trans('myauth')) }}"></mynavbar>
         </div>
      </div>

     
        <router-view :lang="{{ json_encode(trans('myauth')) }}"></router-view>

      <div class="container-fluid m-0 p-0">
         <div class="raw">
             <myfooter></myfooter>
         </div>
      </div>

  
		</div>
	
@endsection

@section('style')

<style >
body {
  /* Hide vertical scrollbar */
  /* overflow-y: hidden;  */
 /* Hide horizontal scrollbar */
 /* overflow-x: hidden;  */
}
</style>

@endsection
