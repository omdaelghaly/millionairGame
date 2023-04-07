





<template>
    <div>
        
   <!-- nav togl for options -->
<div class="pos-f-t p-0 m-0  col-xs-12 col-sm-12 d-md-none">
    <nav class="navbar navbar-dark bg-primary p-0 m-0">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-primary p-4">
                <ul class="navbar-nav mr-auto">
                            <center>
                             <span >Settings</span> 
                            </center>
                    <li class="nav-item active">

                      <button @click.prevent="getcomp('addquestions')" class="
                      dropdown-item" >Question  </button>
                      <button @click.prevent="getcomp('term')" class="dropdown-item" >Terms  </button>
                      <button @click.prevent="getcomp('grade')" class="dropdown-item" >Grades   </button>
                      <button @click.prevent="getcomp('subject')" class="dropdown-item" > Subjects  </button>

                    </li>             
                </ul>    
    </div>
  </div>

</div>
   <!--  -->
     <div class="container-fluid p-0 m-0" style="background:#D5DBDB;">
    <div class="row p-0 m-0  " >


        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 m-0 p-0 "   >
                 
                 <component v-bind:is="currentComponent"></component>
             
        </div>
        <!--  -->
        <div class="m-0 p-0  d-none d-md-block col-md-4 " >
                        
            <div class="container mt-3">

             <div style="background:white;border-radius:20px" class="p-3">
                <ul class="navbar-nav mr-auto">
                            <center>
                             <span >Settings</span> 
                            </center>
                    <li class="nav-item active">

                      <button @click.prevent="getcomp('addquestions')" class="
                      dropdown-item" >Question  </button>
                      <button @click.prevent="getcomp('term')" class="dropdown-item" >Terms  </button>
                      <button @click.prevent="getcomp('grade')" class="dropdown-item" >Grades   </button>
                      <button @click.prevent="getcomp('subject')" class="dropdown-item" > Subjects  </button>

                    </li>             
                </ul>                           
             </div>

            </div>
        </div>      


    </div>
    </div>
</div>
</template>


<script>
import term from './Term.vue'
import grade from './Grade.vue'
import subject from './Subject.vue'
import addquestions from './Question.vue'


export default {
    components:{
    grade,subject,addquestions,term,
    },
        data(){
            return{
                currentComponent:'addquestions',
                

            }  
      },
    
     methods:{
          getcomp(val){
            this.currentComponent = val;
          }
        
      },
      
      created(){
      
       },
      
          
 
}
</script>

