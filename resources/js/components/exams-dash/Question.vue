

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
                   <button @click="nextstep3" class="btn-sm btn-success" > التالى  </button>
               </div> 


          </div>
       </div>  

<!-- write  questions -->

         <div class="container cox mb-2" v-if="stepq"  >
          <div class="row p-3 " style="background:white;border-radius:10px">
              
              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                <input type="text" name="q" v-model="q" class="form-control mr-2 text-right" >
                  <label  class="col-3 text-center ">السؤال </label>
              </div>
            <div  class="text-danger text-center col-12" v-if="errors.q">{{errors.q[0]}}</div>


              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="a" ref="a" v-model="a" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center "> الاختيار الاول </label>
              </div>
     <div  class="text-danger text-center col-12" v-if="errors.a">{{errors.a[0]}}</div>


              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="b" v-model="b" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center "> الاختيار الثانى </label>
              </div>
       <div  class="text-danger text-center col-12" v-if="errors.b">{{errors.b[0]}}</div>

       
              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="c" v-model="c" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center "> الاختيار الثالث </label>
              </div>
        <div  class="text-danger text-center col-12" v-if="errors.c">{{errors.c[0]}}</div>

    
              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="d" v-model="d" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center ">الاختيار الرابع  </label>
              </div>
          <div  class="text-danger text-center col-12" v-if="errors.d">{{errors.d[0]}}</div>
        

              <div style="display:flex;" class="col-12 p-0 m-0 mb-2 mr-2">
                <select v-model="x" class="form-control  text-right">
                  <option value="a"  >  الاختيار الاول  </option>
                  <option value="b"  >  الاختيار الثانى  </option>
                  <option value="c"  >  الاختيار الثالث  </option>
                  <option value="d"  >  الاختيار الرابع  </option>
                </select>
                  <label class="col-3 text-center "> الاختيار الصحيح</label>
              </div>

              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="i" v-model="i" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center "> معلومه  </label>
              </div>
        <div  class="text-danger text-center col-12" v-if="errors.i">{{errors.i[0]}}</div>
     


               <div class="text-center col-12 p-0 m-0 mb-2 mt-1">
                   <button @click="backstep4"  class="btn-sm btn-primary"  > رجوع  </button>
                   <button class="btn-sm btn-success" @click.prevent="savequestion" >  اضافة سؤال   </button>
               </div> 


          </div>
       </div>  

<!--                     show all questions      -->

    <div v-if="qvuex"> 
           <div class="col-12">
               <button style="float:left;margin-right:20px" id="l" 
                  @click="dirl"  >L << </button>
               <button style="float:right;margin-left:20px" id="r"
                  @click="dirr">  R>> </button>         
           </div>

<br><br>
                <allquestions class="qx"  :quest="qvuex"></allquestions>
 

    </div>   
    <div v-else>
        <center> 
         <span style="color:green">
           لم يتم اضافة اى اسئلة حتى الان 
         </span>
       </center>
    </div>




<!--    \\\\\\\\\\\\\\\\\\\\\                 /////////////////////////  - -->

	</div>
</template>

<style type="text/css">
  .cox{
    box-shadow:5px 5px 5px gray;
  }
</style>

<script>
  import allquestions from './Allquestions.vue'

export default {
    components:{allquestions},
       data(){
         return{
             pagetitle:'اضافة اسئلة ',
             dowhat:' اختر الصف الدراسى ' ,
             step1:true,
             step2:false,
             step3:false,
             stepq:false,
             getgradename:'',
             getsubjectname:'',
             gettermname:'',
             data:{
                 id:'',
                 name:'',
             },
             gra:'',
             subj:'',
             term:'',
             exid:'',
             q:'',
             a:'',
             b:'',
             c:'',
             d:'',
             x:'',
             i:'',
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
          qinput:function (val) {return this.q ;},
          ainput:function (val) {return this.a ;},
          binput:function (val) {return this.b ;},
          cinput:function (val) {return this.c ;},
          dinput:function (val) {return this.d ;},
          iinput:function (val) {return this.i ;},
          

       },
       watch:{
          qinput:function(val){
            if(val.length > 150){
              alert('اقصى عد احرف او ارقام هو 150');
            }
          },
          ainput:function(val){
           if(val.length > 50){
              alert('اقصى عد احرف او ارقام هو 50');
            }
           },
            
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
        clearqinputs(){
          this.q = '';
          this.a = '';
          this.b = '';
          this.c = '';
          this.d = '';
          this.x = '';
          this.i = '';
        },
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
            this.dowhat = ' اختر الصف الدراسى '  ;
            this.hideall(); this.step1=true; 
        },        
        backstep2(){
            this.dowhat = ' اختر المادة الدراسية   '  ;
            this.hideall(); this.step2=true;
        },      
        nextstep3(){
             if(this.term){
             this.dowhat = '  اضف الاسئلة   ' ;
             this.hideall() ; this.stepq=true;
             };
        },
        backstep3(){
             this.dowhat = ' اختر المادة الدراسية   '  ;
             this.hideall(); this.step3=true ; 
        },
        backstep4(){
             this.dowhat = ' اختر الفصل الدراسى  ' ;
             this.hideall(); this.step3=true ; 
        },
       ////////////save question////////////////
         savequestion(){
            window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                   let newq = new FormData();
                   let that = this;

            newq.append('gra',this.gra);
            newq.append('subj',this.subj);
            newq.append('term',this.term);
            newq.append('exid',this.exid);
            newq.append('q',this.q);
            newq.append('a',this.a);
            newq.append('b',this.b);
            newq.append('c',this.c);
            newq.append('d',this.d);
            newq.append('x',this.x);
            newq.append('i',this.i);
        
         axios.post('api/saveq',newq).then((response)=>{
               if(response.data.status=='error')
               {
                      Toast.fire({
                      icon: 'error',
                      title:response.data.msg,
                     });
               }else if(response.data.status=='success')
               {
                  this.errors =[];
                // save and update q in vuex store 
                     let newqdb = response.data.data ;
                     this.$store.commit('savenewq',newqdb);
                     this.clearqinputs();   
                    // console.log(response.data.data)
                     Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });  
                }
          }).catch(err=>{
            console.log(err.response.data.errors);
            this.errors = err.response.data.errors ;
          });


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



      },  

      created(){
        this.getsubjects();
        this.getgrades();
        this.getterms();
        this.getquestions();
      }

   };
 </script>        