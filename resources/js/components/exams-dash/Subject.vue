

<template>
    <div>

      <center><span> {{pagetitle}} </span></center>


         <div class="container cox">
          <div class="row p-3" style="background:white;border-radius:10px">

                  <input type="text" name="stage" v-model="data.name" ref="stage" class="form-control">

               <div class="text-center col-12 mt-1">

                   <button @click="freshsubject"  class="btn-sm btn-secondary" >  reset </button>
                   <button @click="saveeditsubject" v-if="data.id" class="btn-sm btn-primary"  >  تعديل  </button>
                   <button @click="addsubject" v-if="!data.id" class="btn-sm btn-success" > اضافة مادة جديده  </button>
               </div> 


          </div>
       </div>  


<!--  -->
      <center><span> {{subjects}} </span></center>

         <div class="container cox">
          <div class="row p-3" style="background:white;border-radius:10px">
        
       <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">م </th>
      <th scope="col">subject name </th>
      <th scope="col">options </th>
      
    </tr>
  </thead>
  <tbody>
    <tr   v-for="(item, index) in subjectvuex" :key="index" >
      <th scope="row">{{index+1}} </th>
      <td>{{item.name}}</td>
      <td> 
         <button @click="editsubject(item)"  class="btn-sm btn-primary" >  edit </button>
     </td>
      <td>
          <button @click="deletesubject(item.id)"  class="btn-sm btn-danger" >  delete </button>
      </td>
    </tr>
   
  </tbody>
</table>


          </div>
       </div>  






    </div>
</template>



<script>
 
export default {
 // components: { Chat },
       data(){
         return{
             pagetitle:' اعداد المواد ',
             subjects:' المواد الدراسية ' ,
             data:{
                 id:'',
                 name:'',
             },
             
         }
       },
       computed:{
          subjectvuex:function() {
            return this.$store.state.subjects;
          },
          datalength:function(){
            return this.data.name;
          }

       },
       watch:{
          datalength:function(val){
            if(val.length > 50){
              alert('اقصى عد احرف او ارقام هو 50');
              this.freshsubject();
            }
          }
       },
       methods:{
          freshsubject(){
            this.data.id="";
            this.data.name=""; 
            this.getsubjects(); 
         },
          getsubjects(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;  axios.get('api/getsubjects').then((response)=>{
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
         addsubject(){
            let validateerror = false ;
            let that = this;
            function checkname(alldata,namex) {
              alldata.forEach((row)=>{
                 let namedb=row.name.split(' ').join('');/// delete spaces;
                 let namenew=namex.split(' ').join('');/// delete spaces;
                if(namedb === namenew){
                 //there is the same name
                   validateerror= true;
                };

              })         
            }; 

             async function savedata(){
              await checkname(that.subjectvuex ,that.data.name);
              if(validateerror){
                     Toast.fire({
                     icon: 'warning',
                     title: 'data exits',
                      });  
              }else{
                   let da = that.data.name;
                   if(da){
                           that.savenewsubject();
                   }else{
                     Toast.fire({
                     icon: 'warning',
                     title: 'data empty',
                      });                      
                   }
              }
             };  

             savedata();
          
         },         
         savenewsubject(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                    let newsubject = new FormData();
                   let that = this;
        //id
            newsubject.append('id',this.data.id);
        //name
            newsubject.append('name',this.data.name);
         
         axios.post('api/savesubject',newsubject).then((response)=>{
               if(response.data.status=='error')
               {
                      Toast.fire({
                      icon: 'error',
                      title:response.data.msg,
                     });
               }else if(response.data.status=='success')
               {
                     this.data.name = '';
                     this.data.id = '';
                // save and update subject in vuex store 
                     let newsubjectdb = response.data.data ;
                     this.$store.commit('savesubject',newsubjectdb);   
                // console.log(response.data.data)
                     Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });  
                }
          });


         },
          editsubject(item){
              this.data = item ;
         },
         saveeditsubject(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                    let editsubject = new FormData();
                   let that = this;
        //id
            editsubject.append('id',this.data.id);
        //name
            editsubject.append('name',this.data.name);
         
         axios.post('api/saveeditsubject',editsubject).then((response)=>{
               if(response.data.status=='error')
               {
                      Toast.fire({
                      icon: 'error',
                      title:response.data.msg,
                     });
               }else if(response.data.status=='success')
               {
                // save and update subject in vuex store 
                     let editsubjectdb = response.data.data ;
                     this.$store.commit('editsubject',editsubjectdb); 
                     this.data.name = '';
                     this.data.id = '';  
                     Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });  
                }
          });


         },
          deletesubject(id){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                axios.post('api/deletesubject',{'id':id}).then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update subject in vuex store 
                     let subjectid = response.data.data ;
                     this.$store.commit('deletesubject',id);  
                      Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });   
               
                }
          });

         },                       
                      
      },
      created(){
        this.getsubjects();
      }

};
</script>

<style>

</style>