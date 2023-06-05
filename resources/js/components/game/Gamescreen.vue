<template>
<div>
  <!--  -->


  <div class="col-12 p-0 m-0" style="">
    <div class="row p-0 m-0">

      <!-- ================all video screen======================== -->

      <div id="allscreengame"  class="col-12  p-0 m-0" style="height:550px;">

        <!-- ==================video ============================= -->
        <video id="vid1" controlsList="nodownload" preload class="p-0 m-0" 
        muted :src="mainvideosrc()"
        style="object-fit:cover;width:100%;height:100%;position:relative; ">

      </video>


      <!-- =========================head============== --> 
      <div id="ghead" class="container-fluid p-0 m-0" style="display:flex;position:absolute;top:1px" >
       <gameheader></gameheader>
     </div>
     <!--  -->
     <div id="prog" class="container-fluid p-0 m-0"
     style="display:flex;position:absolute;top:30px" >

     <div class="col-12 p-1">

       <div  style="border:">
         <span v-for="(item,index) in level1" v-show="serial <= level1 "         :class="colorx(index+1,prog)"    >
          <i id="istar"  class="fa-solid fa-star"  ></i>

        </span>
        <span  v-for="(item,index) in level2" v-show="serial > level1"
         :class="colorx(index+1,prog)" >
         <i  id="istar"  class="fa-solid fa-star"  ></i>

       </span>
     </div>
   </div>   

 </div>
 <!-- ===============================end head ====================== -->
 <!-- ===============================start btn ====================== -->


 <div style="width:100%;position:absolute;text-align:center;top:200px;">
<!--              
                     
                        <button id="startmainvideo" @click="startmainvideo()" 
                           style=" margin-top:10px;border-radius:70px 70px 70px 70px " class="btn btn-primary p-2" >
                          GO NOW 
                        </button> -->

                        <div id="startgbtn">
                         <strong>
                          <p style="color:green; ">Are you ready ?    </p>
                        </strong>

                        <button id="newquestion" @click="newquestion" style=" margin-top:10px " class="btn btn-info" >
                          START
                        </button>
                        </div>

                      <p id="omda" style="color:green; "> By <br>MR: Emad Salah   </p>


                      <div id="exitg">
                        <strong>
                          <p style="color:red; ">Questions aren't enough to play ....   </p>
                        </strong>

                        <button  @click="exitgame" style=" margin-top:10px " class="btn btn-danger" >
                          EXIT
                        </button>
                      </div>   

                    </div>

                    <!-- ===============================endstart btn ====================== -->
                    <!-- ===============================start questions ====================== -->

                    <div class="col-12 p-0 m-0" id="allgameq"style="position:absolute;top:60px">         
                      <div id="btndir">
                        <center>
                          <button id="l" @click="dirl()" > <= L <!-- {{proglevel +'--'+prog}} --></button>
                          <button id="r" @click="dirr()">R => </button>
                        </center>
                      </div>


                      <!-- dir  &&  question -->
                      <div  class="col-12 p-0 m-0" id="dir">

                        <div id="allq" class="col-12"  style="margin-top:30px;display: inline-flex;padding:5px  ">
                          <div id="numberq" class="my-auto p-2" style="background:   ">
                            <span id="numqq" style="width:50px;height:50px;border-radius:10px 0px 10px 0px;background:orange;padding:5px;color:white "> 
                            {{this.serial}} </span>
                          </div>

                          <div id="q1"  style="margin-left:5px;margin-right:5px;background:lightgray;padding:3px;
                          border-radius:20px;border:1px solid ">
                          <strong ><p id="q" class="col-12"  style="">{{newgq.q}} </p></strong>

                        </div>

                      </div>
                      <!-- end q -->
                      <br><br>

                      <div id="allan" class=" col-12 px-3 m-0" style="background:">
                       <!--    <center> -->


                        <div id="a1"class=" mx-1 col-xs-10 col-sm-10 col-md-5- col-lg-5 col-xl-5  " style="margin-bottom:10px ;display: inline-flex;">

                          <span class="my-auto p-2 " style="padding:5px;background:orange;height:30px;width:30px;border-radius:10px 0 10px 0 ;color: white ">
                            a
                          </span>
                          <input type="radio" id="aa" name="" value="a" v-model="myanswer" >
                          <div id="a" class="col-10" style="background:#ebedef;border-radius:10px;padding:5px;border:1px solid ">
                          {{newgq.a}} </div> 
                        </div>
                        


                        <div id="b2" class=" mx-1 col-xs-10 col-sm-10 col-md-5- col-lg-5 col-xl-5  " style="margin-bottom:10px ;display: inline-flex;">

                          <span class="my-auto p-2 " style="padding:5px;background:orange;height: 30px;width:30px;border-radius:10px 0 10px 0 ;color: white ">
                            b
                          </span>
                          <input type="radio" id="bb" name="" value="b" v-model="myanswer" >
                          <div id="b" class="col-10" style="background:#ebedef;border-radius:10px;padding:5px;border:1px solid">
                          {{newgq.b}} </div> 

                        </div>

                        

                        <div id="c3" class=" mx-1 col-xs-10 col-sm-10 col-md-5- col-lg-5 col-xl-5   " style="margin-bottom:10px ;display: inline-flex;">

                          <span  class="my-auto p-2 " style="padding:5px;background:orange;height: 30px;width:30px;border-radius:10px 0 10px 0 ;color: white ">
                            c
                          </span> 
                          <input type="radio" id="cc" name="" value="c" v-model="myanswer" >
                          <div id="c" class="col-10" style="background:#ebedef;border-radius:10px;padding:5px;border:1px solid">
                          {{newgq.c}} </div> 

                        </div>


                        <div id="d4" class=" mx-1 col-xs-10 col-sm-10 col-md-5- col-lg-5 col-xl-5  " style="margin-bottom:10px ;display: inline-flex;">

                          <span class="my-auto p-2" style="padding:5px;background:orange;height: 30px;width:30px;border-radius:10px 0 10px 0 ;color: white ">
                            d
                          </span> 
                          <input class="my-auto" type="radio" id="dd" name="" value="d" v-model="myanswer" >
                          <div id="d" class="col-10" style="background:#ebedef;border-radius:10px;padding:5px;border:1px solid">
                          {{newgq.d}} </div> 

                        </div>
                        <br>   
                        <div id="noti"></div>
                        <div id="info"  class=" mx-auto col-xs-10 col-sm-10 col-md-5- col-lg-5 col-xl-5 text-center" style="margin-bottom:10px ;background:white;border-radius:10px;border:1px solid ">
                         {{newgq.i}}  
                       </div>     
<!--                         </center>           
-->                      
</div>


<!--=======================-dir-->
</div>
<br>

<!--=====================================-btnanswer ============================-->
<div id="btnans">
      <button  id="sure"  class="btn btn-success" style="width:47%;float:right; "
data-toggle="modal" data-target="#exampleModalLong">تأكيد </button>
     <button  id="nextq" @click="nextquestion()" class="btn btn-info" style="width:47%; "> التالى  </button>
<br><br>

   <button @click="exitgame" id="exit" class="btn btn-danger" style="width:100%; ">خروج  </button>

</div>
<!-- allgameq -->
</div> 


<!-- ================end questions ====================== -->


</div>    

<!-- {{myanswer}}
-->                <!-- ====================================================== -->

</div>
</div>
<!-- ======================================model are u sure ====== -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
Launch demo modal
</button>
-->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header m-0 p-2" style="background: #8ab0bd ">
            <h5 class="modal-title m-0 p-0" id="exampleModalLongTitle"> Alert </h5>
            <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body p-2" v-if="myanswer" >
           <h3> ARE YOU SURE ?</h3>
         </div>
         <div class="modal-body p-2" v-if="!myanswer" >
           <h5> Choose an answer , please</h5>
         </div>      
         <div class="text-center p-2 bgbody">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"  v-if="myanswer"> WAIT </button>
          <button type="button" @click="checkmyanswer()" class="btn btn-primary ml-3"  v-if="myanswer"> 
          SURE </button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal"  v-if="!myanswer">close </button>

        </div>
      </div>
    </div>
  </div>
<!-- ============================================ -->
<audio id="intro"   preload="none" src="game/audio/intro.mp3" ></audio>
<audio id="think"   preload="none" src="game/audio/think.mp3"></audio>
<audio id="think2"   preload="none" loop src="game/audio/think2.mp3"></audio>
<audio id="think3"   preload="none" src="game/audio/think3.mp3"></audio>
<audio id="newq"   preload="none" src="game/audio/newq.mp3"></audio>
<audio id="newq2"   preload="none" src="game/audio/newq2.mp3"></audio>
<audio id="correctan"   preload="none" src="game/audio/correctan.mp3"></audio>
<audio id="wrongan"   preload="none" src="game/audio/wrongan.mp3"></audio>
<audio id="an1"   preload="none" src="game/audio/an3.mp3"></audio>
<audio id="an2"   preload="none" src="game/audio/an2.mp3"></audio>
<audio id="an3"   preload="none" src="game/audio/an3.mp3"></audio>
<audio id="an4"   preload="none" src="game/audio/an2.mp3"></audio>
<audio id="end"   preload="none" src="game/audio/end.mp3"></audio>
<audio id="waitan"   preload="none" src="game/audio/waitan.mp3"></audio>
<audio id="wait" loop  preload="none" src="game/audio/wait.mp3"></audio>
<!-- ============================================ -->

<!-- <hr>
{{this.prog}}
<hr>
{{this.proglevel}}  -->
<!--  -->
</div>
</template>


    <style type="text/css">
    @keyframes stars {
      0% {transform: rotate(0deg);}
      100% {transform: rotate(1000deg);}

    }
    h3,h5 {
      color: coral;
      text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
      border-radius:5px 5px 5px 5px; background:;width:100%;height:100%;
      padding:5px;     
    }

    .modal-body ,.bgbody{
      background:  #bfeef7;
    }

    .boxshadow{
      box-shadow: 10px 10px 5px gray;
    }



    .colorstars {
      color: orange;
      /* transition: 4s transform;*/
    }
    #istar{
      animation: stars 30s infinite ;
    }
        /*#xc:hover{
         transform:rotate(90deg); 
         }*/

         </style>





 <script type="application/javascript">
 import gameheader from './Gamehead.vue';
 export default {
  components:{gameheader},
  data(){
   return{
              numqallowgamestart:20 , // if q<  questions arenot enough to play 
              qrandnum:[],  // all randnumbers to prevevent repeat questions 
              newgq:'',/// new question
              randnum:'',
              serial:0,
              myanswer:'',
              intervalan:'',
              timeoutinterval:'',
              timerinterval:'',
              exitinterval: '', 
              errors:[],      
              questiontime:200,
              markl1:10,
              markl2:5,
              startgamevars:{
                serial:0,
                timer:0,
                level1:10,
                level2:5 ,
                prog:0,
                proglevel:1,
                extratime:300, 
              },

            }
          },
          computed:{
           myorder:function () {
            return this.$store.getters.myorder;
          },
          gametimer:function() {
              return this.$store.getters.gametimer ;//timer
            }, 
            gamesettings:function() {
              return this.$store.getters.gamesettings;
            },
            startgame:function(){
              return this.$store.getters.startgame; //set true-false
            },
            gamequestions:function() {
              return this.$store.getters.gamequestions; // ll questions
            },
            gameresults:function() {
              return this.$store.getters.gameresults; // all user result
            },
            myresult:function() {
              return this.$store.getters.myresult; // my resut
            },
            extratime:function() {
              return this.$store.getters.extratime; // my resut
            },  
         // level:function() {
         //      return this.$store.getters.level; // user level at this game or now 
         // },               
         level1:function() {
              return this.$store.getters.level1; // set level 1
            },               
            level2:function() {
              return this.$store.getters.level2; // set level2
            },               
            prog:function() {
              return this.$store.getters.prog; // progress user
            },               
            proglevel:function() {
              return this.$store.getters.proglevel; // user level now
            },                      
          },
          watch:{
            startgame:function(val) {
             this.stopallaudio();
             if(val){
              this.hideall();
              this.startmainvideo();
              this.gsettings();

            };
          },

        },
        methods:{
          settimer(){
                // this.timer = 200;
                this.$store.commit('settimer', this.questiontime);
                this.timerinterval =setInterval(()=>{
                  if(this.gametimer > 0){
                       // this.timer = this.timer -1;
                       this.$store.commit('timeron', 1);
                     }else{
                      console.log('stop');
                      clearInterval(this.timerinterval);
                      this.timeended(this.newgq.x);
                    }  
                  },1000);
              }, 
              colorx(i,prog){
               if(i <= this.prog){
                 return "colorstars ";
               }
               else{
                return "";
              }

            },
            async timeended(correctans){
             $('#sure').prop("disabled",true);
             $('#exit').prop("disabled",true);            
             this.stopallaudio();
             await $("#wrongan").trigger('play');

             $("#"+correctans).css({"background":"green"});
             this.showqinfo();
             this.intervalan= setInterval(()=>{
               $("#"+correctans).css({"background":"green"});
               this.timeoutinterval= setTimeout(()=>{
                $("#"+correctans).css({"background":"lightgreen"});
              },1000);
             },2000);
             setTimeout(()=>{
              this.hideallend();
            },7000)

           },
           showqinfo(){
             if(this.newgq.i){
               $("#info").show(3000);
             }
           },
           clearqinterval(){
            this.myanswer = '';
            clearInterval(this.intervalan);
            clearInterval(this.timeoutinterval);
            clearInterval(this.exitinterval);
            $("#a").css({"background":"white"});
            $("#b").css({"background":"white"});
            $("#c").css({"background":"white"});
            $("#d").css({"background":"white"});
          },
          youranweriscorrect(correctans){
           setTimeout(()=>{
            $("#correctan").trigger('play');
            $("#"+correctans).css({"background":"green"});
            this.showqinfo();
            this.intervalan= setInterval(()=>{
              $("#"+correctans).css({"background":"green"});
              this.timeoutinterval=setTimeout(()=>{
               $("#"+correctans).css({"background":"lightgreen"});
             },1000);
            },2000);
            $('#nextq').prop("disabled",false);

                       if( this.proglevel === 1){   // level 1    10q = 10 marks
                         if(this.serial < this.level1){
                                      // this.prog = this.prog +1;
                                      this.$store.commit('addprog',1);
                                        // this.addmarks(10);// save marks 
                                      }else if(this.serial === this.level1){
                                      // this.prog = this.prog +1;
                                      this.$store.commit('addprog',1);
                                      this.$store.commit('addproglevel',2); // set new level
                                       this.$store.commit('addmarks',this.markl1); // add marks

                                      this.addmarks(this.markl1);// save marks 

                                    } 
                                  }else if( this.proglevel === 2){
                                    if(this.prog +1 < this.level2){
                                      // this.prog = this.prog +1;                                
                                      this.$store.commit('addprog',1);

                                    }else if(this.prog+1 === this.level2){
                                      this.$store.commit('addprog',1);
                                      this.$store.commit('addmarks',this.markl2); // add marks
                                     // this.proglevel = 3 ; //u can set more levels
                                       this.addmarks(this.markl2);// save marks 


                                     }
                                   }
                                 },16000);

         },
         youransweriswrong(myans,correctans){

           setTimeout(()=>{
             $("#wrongan").trigger('play');
             $("#"+correctans).css({"background":"green"});
             $("#"+myans).css({"background":"red"}); 
             this.showqinfo();
             this.intervalan= setInterval(()=>{
               $("#"+correctans).css({"background":"green"});
               this.timeoutinterval= setTimeout(()=>{
                $("#"+correctans).css({"background":"lightgreen"});
              },1000);
             },2000);
             this.exitinterval= setTimeout(()=>{
              this.hideallend();
            },10000);
           },16000 );

         },
        async checkmyanswer(){
          $("#btnextratime").prop("disabled",true); 
          $("#sure").prop("disabled",true); 
          $("#exit").prop("disabled",true); 
          $(".close").click();
          let myanswer = this.myanswer; 
          let correctanswer = this.newgq.x ;
          clearInterval(this.timerinterval);
          this.stopallaudio();
          await $("#waitan").trigger('play');              
            // console.log(myanswer);console.log(correctanswer);

            if(myanswer === correctanswer) {
             this.youranweriscorrect(correctanswer);
           }else{
             this.youransweriswrong(myanswer,correctanswer);
           } 

         },
         gsettings(){
          this.timer = 0 ; this.qrandnum=[];
          this.serial= 0 ; this.myanswer='';
              // this.prog=0 ; this.proglevel = 1 ;
              this.$store.commit('setgamevars',this.startgamevars);            

            },
            dirr(){
             $("#dir").css({"direction":"rtl","text-align":"right"});
           },
           dirl(){
             $("#dir").css({"direction":"ltr","text-align":"left"});
           },
           mainvideosrc(){
             return "game/video/main.mp4";
           },
           setaudiosrc(val){
             return val;
           },
           exitgame(){
            this.stopallaudio();
            var exitg = false;
            this.clearqinterval();
            this.$store.commit('exitgame',false);             
          },
          hideall(){
            $('#ghead').hide();
            $('#prog').hide();
            $('#startgbtn').hide();
            $('#omda').hide();
            $('#exitg').hide();
            $('#btndir').hide();
            $('#allq').hide();
            $('#a1').hide();
            $('#b2').hide();
            $('#c3').hide();
            $('#d4').hide();
            $('#info').hide();
            $('#btnans').hide();
            $('#nextq').prop("disabled",true);

          },

         startmainvideo(){ //// start game videooo.........
             let that = this ;// u shoud fix this func in func
            //$("#startmainvideo").hide(100);
            $("#vid1")[0].currentTime = 0;
            $("#intro")[0].currentTime = 0;
            $("#intro").trigger('play');
            // const intro = document.getElementById("intro");
            // intro.addEventListener('play',()=> {
              $("#vid1").trigger('play');
           // }); 
            setTimeout(function(){
             $("#omda").fadeIn(2000);
           },2000);
            setTimeout(function(){
              $("#omda").fadeOut(2000);
              $('#ghead').fadeIn(5000);
              $('#prog').fadeIn(5000);
            },10000);
            setTimeout(function(){
              if(that.gamequestions.length > that.numqallowgamestart ){
                $("#startgbtn").fadeIn(2000);
              }else {$("#exitg").fadeIn(2000);};
            },14000);  

            $("#intro").on('ended',()=>{
              $("#wait").trigger('play');
              //console.log(this.gameresults);
            });


          },
         getrandnum(){// get random question
          let max = this.gamequestions.length ; let min = 1 ;  
                let randomnum = Math.floor( Math.random() * (max - min) + min); // get rand number
                this.randnum = randomnum ;
                console.log("rand"+randomnum);
                if(this.qrandnum.includes(randomnum)){
                  console.log('found in array....');
                  this.getrandnum();                            
                }else{
                  this.qrandnum.push(randomnum);
                  this.randnum = randomnum ;
                  console.log('new r added'+randomnum)
                };
                   // console.log(this.gamequestions.length);
                 },
                 async chooserandq(){
               await this.getrandnum();  // get new random
              // choose rand question
              let newq = this.gamequestions.find(val=>val.id === this.randnum);
              if(newq){
                         this.newgq = newq ; // set new q
                         this.serial = this.serial + 1 ; //set q num  
                         //console.log(newq); 
                         //set levels 
                         if(this.proglevel == 1){
                           if(this.prog +1 > this.level1){
                                      this.$store.commit('setprog',0); // setprog
                                    };
                                  // console.log('set level1 prog to 0');
                                }else if(this.proglevel == 2){
                                 if(this.prog +1 > this.level2){
                                       this.$store.commit('setprog',0); // setprog
                                     };
                                   // console.log('set level2 prog to 0');

                                 }


                               }else{
                      this.chooserandq(); // choose anther one  
                    }
                  } ,
                async newquestion(){
                    $("#sure").prop("disabled",false); 
                    $("#exit").prop("disabled",false); 
                    $("#btnextratime").prop("disabled",false); 


                    $("#startgbtn").fadeOut();
                    this.stopallaudio();
                    this.chooserandq();
                    await $("#newq").trigger('play');


                    $('#btndir').show();
                    $('#allq').fadeIn(3000,function() {//set music 

                      $("#an1").trigger('play');                
                      $('#a1').fadeIn(1500,function() {

                        $("#an2").trigger('play');              
                        $('#b2').fadeIn(1500,function() {

                          $("#an3").trigger('play');            
                          $('#c3').fadeIn(1500,function() { 

                           $("#an4").trigger('play');         
                           $('#d4').fadeIn(1500,function(){         

                             $("#think2").trigger('play');
                             $('#btnans').fadeIn(3000,function() {
                                            // this.settimer();
                                          });
                           });
                         });
                        });                            
                      });

                    });
                    this.settimer();                    
                  },
                  nextquestion(){
                   this.clearqinterval();
                   this.hideall();
                   $('#ghead').show();
                   $('#prog').show();

                   this.newquestion();
                 },


                 stopallaudio(){
                   for (var i =0  ;i < $('audio').length ; i++) {
                     $('audio')[i].pause();
                     $('audio')[i].currentTime = 0;
              //console.log('okkkkk');
            }
          },       
          hideallend(){
            let that= this;
            this.stopallaudio(); 
            $("#end").trigger('play');
            $('#ghead').fadeOut(20000);
            $('#prog').fadeOut(20000);
            $('#exitg').fadeOut(1000);
            $('#btndir').fadeOut(15000);
            $('#allq').fadeOut(15000);
            $('#a1').fadeOut(15000);
            $('#b2').fadeOut(15000);
            $('#c3').fadeOut(15000);
            $('#d4').fadeOut(15000);
            $('#info').fadeOut(15000);
            this.clearqinterval();
            $('#btnans').fadeOut(10000);
            setTimeout(function(){
             $("#omda").fadeIn(3000);
           },18000);
            setTimeout(function(){
              $("#omda").fadeOut(5000);
            },25000);
            setTimeout(function(){
             that.$store.commit('exitgame',false);
           },30000);


          },
          addmarks(marks){
            window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.getters.user.token;
               // console.log(this.gamesettings);
            axios.post("api/addmarks",{'marks':marks,'gamesettings':this.gamesettings})
            .then((response)=>{
              // console.log(response.data.data);
              if(response.data.status=='success')
              {

                Toast.fire({
                  icon: 'success',
                  title: response.data.msg,
                });

              }
            });        
          },






         },//end methods
         created(){
           //this.hideall();
          this.gsettings();

         },


       };
       </script>