<template>
  <div>
    <!--  -->


    <div class="col-12 p-0 m-0" style="">
      <div class="row p-0 m-0">
       
<!-- ================================================================================= -->
<!-- ============================choose opitions======================================= -->
     <div class="col-12" v-show="!startgame">
<br>
            <center>
              <span style="color:green;font-size:bold"> {{pagetitle}} </span>
            </center>      

<br><br>
              <div class="text-right " style="color:orange;direction:rtl"> 
                   الصف  :
                    <span style="color:green">{{getgradename}} </span> <br>  
                    المادة :
                    <span style="color:green">{{getsubjectname}} </span> <br>  
                        الترم  :
                     <span style="color:green">{{gettermname}} </span> 
              </div>

<br>           
                    <center><span class="m-0 p-2" > {{dowhat}} </span></center>


<!-- =======================================  -->
         <div class="container cox mb-2" v-if="step1" >
          <div class="row p-3 " style="background:white;border-radius:10px">
<br>
                <select v-model="gra" class="form-control">
                  <option v-for="(item,index) in gradevuex" :key="index" :value="item.id"  >  {{item.name}}  </option>
                </select>

               <div class="text-center col-12 mt-1">
                   <button @click="nextstep1" class="btn-sm btn-success"> 
                    التالى  </button>
               </div> 


          </div>
         </div> 
     <!-- -choose subject -->

         <div class="container cox mb-2" v-if="step2" >
          <div class="row p-3 " style="background:white;border-radius:10px">
<br>
                <select v-model="subj" class="form-control">
                  <option v-for="(item,index) in subjectvuex" :key="index" :value="item.id"  >  {{item.name}}  </option>
                </select>

               <div class="text-center col-12 mt-1">

                   <button @click="backstep1"  class="btn-sm btn-primary"  > رجوع  </button>
                   <button @click="nextstep2" class="btn-sm btn-success" > التالى  </button>
               </div> 


          </div>
       </div>  

<!-- choose term -->

         <div class="container cox mb-2" v-if="step3"  >
          <div class="row p-3 " style="background:white;border-radius:10px">
<br>
                <select v-model="term" class="form-control">
                  <option v-for="(item,index) in termvuex" :key="index" :value="item.id"  >  {{item.name}}  </option>
    
                </select>

               <div class="text-center col-12 mt-1">

                   <button @click="backstep2"  class="btn-sm btn-primary"  > رجوع  </button>
                   <button @click="nextstep3" class="btn-sm btn-success" > ابدا اللعبة  </button>
               </div> 


          </div>
       </div>  



     </div>

<!-- ================================================================================= -->
<!-- ================================================================================= -->
<!-- ================================================================================= -->
<!-- ================all game screen=================================================== -->

              <div id="allscreengame" v-show="startgame" class="col-12 p-0 m-0" 
               style="height:550px;">

                    <gamescreen></gamescreen>

                </div>    


                <!-- =========================================================== -->
   
              </div>
            </div>



            <!--  -->
          </div>
        </template>



        <script type="application/javascript">
          import gamescreen from './Gamescreen';
        export default {
          components:{gamescreen},
         data(){
           return{
             pagetitle:'NEW GAME',
             dowhat:' اختر الصف الدراسى ' ,
             step1:true,
             step2:false,
             step3:false,
             game:false,
             getgradename:'',
             getsubjectname:'',
             gettermname:'',
             gra:'',
             subj:'',
             term:'',
             exid:'',  
             errors:[],            
           }
         },
         computed:{
          startgame:function(){
            return this.$store.state.startgame;
          },
          authuser:function(){
             return this.$store.getters.user.token;
          },
          qvuex:function() {
               return this.$store.getters.q;
          },          
          gradevuex:function() {
            return this.$store.getters.grades;
          },  
          subjectvuex:function() {
            return this.$store.getters.subjects;         
          },
         termvuex:function() {
            return this.$store.getters.terms;         
          },
         },
         watch:{
          gra:function(gid){
            let graindex = this.gradevuex.findIndex(val=>val.id === gid);
              this.getgradename = this.gradevuex[graindex].name;
          },
          subj:function(sid){
            let subjindex = this.subjectvuex.findIndex(val=>val.id === sid);
            if(subjindex > -1){
              this.getsubjectname = this.subjectvuex[subjindex].name;
            }
          },
          term:function(tid){
              if(tid === 1){ this.gettermname=' الفصل الدراسى الاول        '; 
              }else if(tid === 2){
                 this.gettermname = '  الفصل الدراسى الثانى      ' ;
              };
          },
          authuser:function(val) {  // when reload page after login
              if(val){
                 this.getsubjects();
                 this.getgrades();
                 this.getterms();
               };  
          },

         },
         methods:{

        hideall(){
             this.step1=false;
             this.step2=false;
             this.step3=false;
             this.stepq=false;
        },           
        nextstep1(){// choose grade
             if(this.gra){
              this.dowhat = '  اختر المادة الدراسية  '; 
              this.hideall(); this.step2=true ;
             };
        }, 
        nextstep2(){// choose subject
             if(this.subj){
             this.dowhat = ' اختر الفصل الدراسى  ' ;
             this.hideall(); this.step3=true ;
             };
        },
        backstep1(){
            this.dowhat = ' اختر الصف الدراسى '  ;
            this.hideall(); this.step1=true; 
        },        
        backstep2(){
            this.dowhat = ' اختر المادة الدراسية   '  ;
            this.hideall(); this.step2=true;
        },      
        nextstep3(){
             if(this.term){
             this.dowhat = ' اختر الفصل الدراسى   ' ;
            // this.hideall() ;
             this.game=true;
             this.saveogamesettings();
             this.gamequestions();
             };
        },
        saveogamesettings(){
            var gamesettings ={'gra':this.gra,'subj':this.subj,'term':this.term};
              this.$store.commit('gamesettings',gamesettings);
        },
         ////////////get grades///////////////////////
          getgrades(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token; 
               axios.get('api/getgrades').then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update grade in vuex store 
                     let gradedb = response.data.data ;
                     this.$store.commit('setgradesall',gradedb);            
                }
          });
         },
        /////////////get subjects////////////////////
          getsubjects(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                axios.get('api/getsubjects').then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update subject in vuex store 
                     let subjectdb = response.data.data ;
                     this.$store.commit('setsubjectsall',subjectdb);            
                }
          });
         },        
       ////////////////////////////terms/////////
          getterms(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                axios.get('api/getterms').then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update term in vuex store 
                     let termdb = response.data.data ;
                     this.$store.commit('settermsall',termdb);             
                }
          });
         },    
//////////////////all game questions only gra-subj-term ///////////////
           gamequestions(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                var gamesettings = this.$store.state.gamesettings;
                axios.post('api/gamequestions',gamesettings).then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update term in vuex store 
                   this.gameresults();
                     let qdb = response.data.data ;
                     this.$store.commit('setgamequestions',qdb);   
               
                }
          });
         },     
//////////////////all game result  gra-subj-term ///////////////
           gameresults(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                var gamesettings = this.$store.state.gamesettings;
                axios.post('api/gameresults',gamesettings).then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update term in vuex store 
                     let rdb = response.data.data ;
                     console.log(rdb);
                     this.$store.commit('setgameresults',rdb);   
               
                }
          });
         },     



         },//end methods
         // if u navagate while playing and return ushould set start game false to start again 
            beforeCreate(){  
                 this.$store.commit('exitgame',false);
                 },
             created(){  //when navgate only / but watch onload
              if(this.authuser){
                 this.getsubjects();
                 this.getgrades();
                 this.getterms();
               };  
             },    

       };
       </script>