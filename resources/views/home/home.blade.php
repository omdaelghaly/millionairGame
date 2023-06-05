
@extends('layout.app')



@section('pagecontent')
    
    
		<div id="app" style="background: #d5dbdb">
  
      <div class="container-fluid m-0 p-0">
         <div class="raw">
             <mynavbar  class="col-12 p-0 m-0" mysite="{{config('app.name')}}" 
               :lang="{{ json_encode(trans('myauth')) }}"></mynavbar>
         </div>
      </div>

     <div id="vbody" class="">
        <router-view :lang="{{ json_encode(trans('myauth')) }}" ></router-view>
       
     </div>

      <div class="container-fluid m-0 p-0 " >
         <div class="raw">
             <myfooter id="vf"></myfooter>
         </div>
      </div>

  
		</div>
	
 <script type="text/javascript">
   var heightPAGE = $(window).height();
   var heightFOOTER = 300;
   var eh        = heightPAGE - heightFOOTER ;
   var minheight = eh+"px";   
   
   $("#vbody").css({"min-height":minheight})
 </script>

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
