
<template>
	<div>
              <center><span style="color:green;font-size:bold"> {{pagetitle}} </span></center>
              <div class="text-right" style="color:orange"> الصف:  
                    <span style="color:green">{{getgradename}} </span> >>>  المادة : 
                    <span style="color:green">{{getsubjectname}} </span> >>>  الترم :
                     <span style="color:green">{{gettermname}} </span> 
               </div>

<br>           
<!--               {{gra}}----{{subj}}-----{{term}}
 -->              <center><span> {{dowhat}} </span></center>



         <div class="container cox mb-2" v-if="step1" >
          <div class="row p-3 " style="background:white;border-radius:10px">
<br>
                <select v-model="gra" class="form-control">
                  <option v-for="(item,index) in gradevuex" :key="index" :value="item.id"  >  {{item.name}}  </option>
                </select>

               <div class="text-center col-12 mt-1">
                   <button @click="nextstep1" class="btn-sm btn-success" > التالى  </button>
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
                   <button @click="nextstep3" class="btn-sm btn-success" >  (الامتحان )  التالى  </button>
               </div> 


          </div>
       </div>  

<!--  -->
<!-- exam -->

         <div class="container cox mb-2" v-if="stepq"  >
          <div class="row p-3 " style="background:white;border-radius:10px">
<br>
              <div v-if="examq && examq!=''" class="col-12" >
<!--  /////////////////           //////////////exam////////////////// -->
<br><br>
                <examquestions class="qx"  :quest="examq"></examquestions>
 



<!-- //////////////////////end exam//////btn at end/////////////   -->                 <!--   <button @click="finishexam"  class="btn-sm btn-success">
                    save </button> -->
                   <button @click="cancelexam" class="btn-sm btn-primary" > cancel </button>
               </div>
<!--  ////////////////////if no questions in db////////////  -->   
            <div v-else class="col-12">
                  <center>
                    <span> please wait .....</span>

                   <button @click="cancelexam" class="btn-sm btn-primary" > cancel </button>
                  </center>
               </div>

          </div>
       </div>  

<!--  -->


</div>
</template>



<script>
   import examquestions from './Examquestions.vue';

export default {
     components:{examquestions},
       data(){
         return{
             pagetitle:'اختر امتحان ',
             dowhat:' اختر الصف الدراسى ' ,
             getgradename:'',
             getsubjectname:'',
             gettermname:'',
             step1:true,
             step2:false,
             step3:false,
             stepq:false,
             gra:'',
             subj:'',
             term:'',
             exid:'',
 
             errors:[],

         }
       },
       computed:{
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
         examq:function() {
            return this.$store.getters.examq;         
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
       },
       methods:{
        dirr(){
          $(".qx").css({"direction":"rtl","text-align":"right"});
        },
        dirl(){
          $(".qx").css({"direction":"ltr","text-align":"left"});
        },
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
            this.dowhat = 'اختر الصف الدراسى ' ;
            this.hideall(); this.step1=true; 
        },        
        backstep2(){
            this.dowhat = ' اختر المادة الدراسية   '  ;
            this.hideall(); this.step2=true;
        },        
        nextstep3(){
             if(this.term){
             this.dowhat = '  الامتحان  ' ;
             this.hideall() ; this.stepq=true;
                          //// choose random exam func//////
             this.randomexam(); 
             console.log('hii');
             };

        },
        backstep3(){
             this.dowhat = ' اختر الصف الدراسى '  ;
             this.hideall(); this.step1=true ;
        },
        // backstep4(){
        //      this.dowhat = ' اختر الصف الدراسى '  ;
        //      this.hideall(); this.step3=true ; 
        // },
        cancelexam(){
            this.dowhat = ' اختر الصف الدراسى '  ;
            this.hideall(); this.step1=true; 
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
///////////////////////////////////all questions ///////////////
          getquestions(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                axios.get('api/getquestions').then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update term in vuex store 
                     let qdb = response.data.data ;
                     this.$store.commit('setqall',qdb);   
               
                }
          });


         },     
//////////////////////////////////////////random exam ////////////////////////////////
          randomexam(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                axios.post('api/randomexam',{'gra':this.gra,'subj':this.subj,'term':this.term,'exid':this.exid}).then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save random exam in vuex
                     let rexam = response.data.data ;
                     console.log(rexam);
                      this.$store.commit('setexamq',rexam);   
               
                }
          });


         },     
////////////////////////////////////////////
         finishexam(){

         }
//////////////////////////////         


      },  

      created(){
        this.getsubjects();
        this.getgrades();
        this.getterms();
        this.getquestions();
      }
       
};

</script>