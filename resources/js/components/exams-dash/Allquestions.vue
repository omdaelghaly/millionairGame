
<template>
	<div>
	
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


<div class="navbar col-1 p-0 m-0" >
<div class="dropdown"  >
  <button class="btn btn- dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" @click.prevent="deleteq(item.id)" href="#">delete</a>
    <a class="dropdown-item" @click.prevent="checkforedit(item)" href="#">edit</a>
   
  </div>
</div>   
</div>
                        <!-- /////////////// -->

            </div>                    

<!--  -->

<br><br>

            <div id="answer" class="mt-2">
    
                <div id="ans">
                    <span  id="a" >a - </span>
                   <div class="aa"><input type="radio" id="" name="1" value="a"> 
                         {{item.a}} 
                   </div>
                </div>


                <div id="ans">
                     <span id="b">b - </span>
                    <div class="aa"><input type="radio" id="" name="1" value="b"> 
                         {{item.b}} 
                     </div>
                </div>



                 <div id="ans">
                         <span id="c">c -  </span>
                      <div class="aa"><input type="radio" id="" name="1" value="c"> 
                         {{item.c}} 
                     </div>
                 </div>


                 <div id="ans">
                       <span  id="d">d - </span>
                     <div class="aa"><input type="radio" id="" name="1" value="d"> 
                         {{item.d}} 
                     </div>
                 </div>


</div>

</div>
</div>






<!-- model edit  -->

<!-- Button trigger modal -->
<button type="button" hidden id="modelbtnedit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <!-- model button -->
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit question </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- ////////////////////////////////////////edit qqqqqqqqqqqqq////////// -->

         <div class="container mb-2"   >
          <div class="row p-2 " style="background:white;border-radius:10px">
              
              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                <input type="text" name="q" v-model="allq.q" class="form-control mr-2 text-right" >
                  <label  class="col-3 text-center ">السؤال </label>
              </div>
            <div  class="text-danger text-center col-12" v-if="errors.q">{{errors.q[0]}}</div>


              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="a" ref="a" v-model="allq.a" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center "> الاختيار الاول </label>
              </div>
     <div  class="text-danger text-center col-12" v-if="errors.a">{{errors.a[0]}}</div>


              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="b" v-model="allq.b" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center "> الاختيار الثانى </label>
              </div>
       <div  class="text-danger text-center col-12" v-if="errors.b">{{errors.b[0]}}</div>

       
              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="c" v-model="allq.c" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center "> الاختيار الثالث </label>
              </div>
        <div  class="text-danger text-center col-12" v-if="errors.c">{{errors.c[0]}}</div>

    
              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="d" v-model="allq.d" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center ">الاختيار الرابع  </label>
              </div>
          <div  class="text-danger text-center col-12" v-if="errors.d">{{errors.d[0]}}</div>
        

              <div style="display:flex;" class="col-12 p-0 m-0 mb-2 mr-2">
                <select v-model="allq.x" class="form-control  text-right">
                  <option value="a"  >  الاختيار الاول  </option>
                  <option value="b"  >  الاختيار الثانى  </option>
                  <option value="c"  >  الاختيار الثالث  </option>
                  <option value="d"  >  الاختيار الرابع  </option>
                </select>
                  <label class="col-3 text-center "> الاختيار الصحيح</label>
              </div>

              <div style="display:flex;" class="col-12 p-0 m-0 mb-2">
                  <input type="text" name="i" v-model="allq.i" class="form-control mr-2 text-right" > 
                  <label class="col-3 text-center "> معلومه  </label>
              </div>
        <div  class="text-danger text-center col-12" v-if="errors.i">{{errors.i[0]}}</div>
     



          </div>
       </div>  

<!-- //////////////////////////////////////////// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" @click="closeedit" id="closeeditbtn" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="saveeditq" >Save changes</button>
      </div>
    </div>
  </div>
</div>
              

<!-- end omdel edit/////////////////////////////// -->

	</div>
	</template>	



<style type="text/css">
    #qqq{width:100%;display: flex;}
    #n{padding:5px;background:blue;height: 35px;width:40px;border-radius:20px 0 20px 0 ;
        color: white;font-size:18px;display:inline  }   
    #ans{display: inline-flex;margin-left:5px;margin-right:5px}  
    #ans span{ padding:5px;background:gray;height: 30px;width:30px;border-radius:10px 0 10px 0    }
    .aa{padding:5px;background:white;border-radius:10px 10px ;margin:2px   }
     

    #inf{margin-right:10%;margin-left:10% ;  }
   
</style>


<script type="text/javascript">
	export default{
        props:['quest'],
        data(){
    	     return{
                  allq:{},
                  errors:[],
    	     }
        },
        computed:{
          //  qvuex:function() {
          //      return this.$store.getters.q;
          // },          
        },
        methods:{ 
        	closeedit(){
             this.allq ={};
             this.errors =[];
        	},
            checkforedit(question){
                  this.allq= question;
                //  console.log(this.allq);
                  $("#modelbtnedit").click();
            },
       ////////////save question////////////////
         saveeditq(){
            window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                   let neweditq = new FormData();
                   let that = this;

                   neweditq.append('qid',this.allq.id);
                   neweditq.append('uid',this.allq.user_id);
                   neweditq.append('gra',this.allq.grade_id);
                   neweditq.append('subj',this.allq.subject_id);
                   neweditq.append('term',this.allq.term_id);
                   neweditq.append('exid',this.allq.exam_id);
                   neweditq.append('q',this.allq.q);
                   neweditq.append('a',this.allq.a);
                   neweditq.append('b',this.allq.b);
                   neweditq.append('c',this.allq.c);
                   neweditq.append('d',this.allq.d);
                   neweditq.append('x',this.allq.x);
                   neweditq.append('i',this.allq.i);
        
                axios.post('api/saveeditq',neweditq).then((response)=>{
                    if(response.data.status=='error')
                    {
                         Toast.fire({
                         icon: 'error',
                         title:response.data.msg,
                         });
                    }else if(response.data.status=='success')
                    {
                 
                // save and update q in vuex store 
                         let newqdb = response.data.data ;
                         this.$store.commit('saveeditq',newqdb);
                         $("#closeeditbtn").click(); 
                         this.closeedit(); 
                     console.log(response.data.data)
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
       ////////////delete question////////////////
         deleteq(qid){
            window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
        
                axios.post('api/deleteq',{'qid':qid}).then((response)=>{
                    if(response.data.status=='error')
                    {
                         Toast.fire({
                         icon: 'error',
                         title:response.data.msg,
                         });
                    }else if(response.data.status=='success')
                    {
                 
                // save and update q in vuex store 
                         let qid = response.data.data ;
                         this.$store.commit('deleteq',qid);
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




        }, //methods
        
     
     
     
	};

</script>