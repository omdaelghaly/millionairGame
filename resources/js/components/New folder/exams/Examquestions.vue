
<template>
	<div>
	
  <!-- marks -->
 <center>
   <span style="color:red;font-style:bold">
     {{marks}} /{{this.quest.length}}
   </span>
 </center>        
 
<!--  -->
         <div class="container mb-2" v-for="(item,i) in quest" :key="i" style="box-shadow:5px 5px 5px gray;" >
          <div class="row p-3 " style="background:white;border-radius:10px">
 
<!--  -->
<br><br>
            <div id="qqq">
            	 <div>
            	   <span id="n">{{i +1}}</span> 
                   <i id="f" hidden class="fa fa-times-circle" style="font-size:20px"></i>
                   <i id="t" hidden class="fas fa-check-circle" style="font-size:20px"></i>

                      <strong class="ml-2 mr-2">  {{item.q}}  </strong>
                </div>

                        <!-- questions option  -->

<!-- 
<div class="navbar col-1 p-0 m-0" >
<div class="dropdown"  >
  <button class="btn btn- dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" @click.prevent="deleteq(item.id)" href="#">delete</a>
    <a class="dropdown-item" @click.prevent="checkforedit(item)" href="#">edit</a>
   
  </div>
</div>   
</div> -->
                        <!-- /////////////// -->

            </div>                    

<!--  -->

<br><br>

            <div id="answer" class="mt-2">
    
                <div id="ans">
                    <span  :id="'a'+i" >a - </span>
                   <div class="aa"><input type="radio" id="a" :name="i" value="a"> 
                         {{item.a}} 
                   </div>
                </div>


                <div id="ans">
                     <span :id="'b'+i">b - </span>
                    <div class="aa"><input type="radio" id="b" :name="i" value="b"> 
                         {{item.b}} 
                     </div>
                </div>



                 <div id="ans">
                         <span :id="'c'+i">c -  </span>
                      <div class="aa"><input type="radio" id="c" :name="i" value="c"> 
                         {{item.c}} 
                     </div>
                 </div>


                 <div id="ans">
                       <span  :id="'d'+i">d - </span>
                     <div class="aa"><input type="radio" id="d" :name="i" value="d"> 
                         {{item.d}} 
                     </div>
                 </div>


</div>
                  <!-- information about question  -->
                 <div style="color:blue" class="col-12 text-center"
                           v-if="item.i && showqi">
                        <span>  {{item.i}}  </span>
                 </div>

</div>
</div>


<!-- btn -->
  <button @click="finishexam"  class="btn-sm btn-success">
                    save </button>
<!--  -->

</div>
</template>



<script type="text/javascript">
  export default{
        props:['quest'],
        data(){
           return{
                marks:0,
                checkempty:true,
                showqi:false,  
           }
        },
        computed:{
          //  qvuex:function() {
          //      return this.$store.getters.q;
          // },          
        },
        methods:{
              checkemptyans(){
                   this.checkempty=false;
                  for (var i = 0; i < this.quest.length; i++) {
                      var myanswer = $("input[name="+(i)+"]:checked").val();
                      var correctanswer = this.quest[i].x ;
                      if(myanswer){
                           
                      }else{
                        this.checkempty = true;
                         Toast.fire({
                         icon: 'warning',
                         title:'Please, Answer all the questions' ,
                         });
                      }
                  }
              }, 
              async finishexam(){
                  await this.checkemptyans(); //if error stop
                   if(this.checkempty == false){
                  for (var i = 0; i < this.quest.length; i++) {
                      var myanswer = $("input[name="+(i)+"]:checked").val();
                      var correctanswer = this.quest[i].x ;
                      // alert(myanswer +'-----'+ correctanswer);
                      if(myanswer){
                              if(myanswer === correctanswer){
                                  this.addmarks(); //if correctonly
                                  this.correctans(correctanswer+i);
                              }else{
                                  this.wrongans(myanswer+i);                    
                                  this.correctans(correctanswer+i);
                              }
                      }
                  }

                }else{
                  console.log('something wrong');
                }
             },
             correctans(elid){
                   this.showqi=true;
                    setInterval(()=> {
                        $('#'+elid).css({"background-color":'green',});
                          setTimeout(()=>{
                             $('#'+elid).css({"background-color":'gray',});
                          },1000);
                    },2000)
           },
           wrongans(elid){
                    this.showqi=true;
             $('#'+elid).css({"background-color":'red',});
           },
           addmarks(){
            this.marks = (this.marks + 1);
           },
           emptyq(){

           },  
        },


  };

  </script>
