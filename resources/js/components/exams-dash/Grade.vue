

<template>
    <div>

      <center><span> {{pagetitle}} </span></center>


         <div class="container cox">
          <div class="row p-3" style="background:white;border-radius:10px">

                  <input type="text" name="stage" v-model="data.name" ref="stage" class="form-control">

               <div class="text-center col-12 mt-1">

                   <button @click="freshgrade"  class="btn-sm btn-secondary" >  reset </button>
                   <button @click="saveeditgrade" v-if="data.id" class="btn-sm btn-primary"  >  تعديل  </button>
                   <button @click="addgrade" v-if="!data.id" class="btn-sm btn-success" >اضافة مرحلة جديده</button>
               </div> 


          </div>
       </div>  


<!--  -->
      <center><span> {{stages}} </span></center>

         <div class="container cox">
          <div class="row p-3" style="background:white;border-radius:10px">
        
       <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">م </th>
      <th scope="col">Grade name </th>
      <th scope="col">options </th>
      
    </tr>
  </thead>
  <tbody>
    <tr   v-for="(item, index) in gradevuex" :key="index" >
      <th scope="row">{{index+1}} </th>
      <td>{{item.name}}</td>
      <td> 
         <button @click="editgrade(item)"  class="btn-sm btn-primary" >  edit </button>
     </td>
      <td>
          <button @click="deletegrade(item.id)"  class="btn-sm btn-danger" >  delete </button>
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
             pagetitle:'اعداد المراحل ',
             stages:'المراحل ' ,
             data:{
                 id:'',
                 name:'',
             },
             
         }
       },
       computed:{
          gradevuex:function() {
            return this.$store.state.grades;
          },
          datalength:function(){
            return this.data.name;
          }

       },
       watch:{
          datalength:function(val){
            if(val.length > 50){
              alert('اقصى عد احرف او ارقام هو 50');
              this.freshgrade();
            }
          }
       },
       methods:{
          freshgrade(){
            this.data.id="";
            this.data.name=""; 
            this.getgrades(); 
         },
          getgrades(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;  axios.get('api/getgrades').then((response)=>{
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
        addgrade(){
            let validateerror = false ;//every thing is ok
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
              await checkname(that.gradevuex ,that.data.name);
              if(validateerror){
                     Toast.fire({
                     icon: 'warning',
                     title: 'data exits',
                      });  
              }else{
                   let da = that.data.name;
                   if(da){
                           that.savenewgrade();
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
         savenewgrade(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                    let newgrade = new FormData();
                   let that = this;
        //id
            newgrade.append('id',this.data.id);
        //name
            newgrade.append('name',this.data.name);
         
         axios.post('api/savegrade',newgrade).then((response)=>{
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
                // save and update grade in vuex store 
                     let newgradedb = response.data.data ;
                     this.$store.commit('savegrade',newgradedb);   
                // console.log(response.data.data)
                     Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });  
                }
          });


         },
          editgrade(item){
              this.data = item ;
         },
         saveeditgrade(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                    let editgrade = new FormData();
                   let that = this;
        //id
            editgrade.append('id',this.data.id);
        //name
            editgrade.append('name',this.data.name);
         
         axios.post('api/saveeditgrade',editgrade).then((response)=>{
               if(response.data.status=='error')
               {
                      Toast.fire({
                      icon: 'error',
                      title:response.data.msg,
                     });
               }else if(response.data.status=='success')
               {
                // save and update grade in vuex store 
                     let editgradedb = response.data.data ;
                     this.$store.commit('editgrade',editgradedb); 
                     this.data.name = '';
                     this.data.id = '';  
                     Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });  
                }
          });


         },
          deletegrade(id){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                axios.post('api/deletegrade',{'id':id}).then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update grade in vuex store 
                     let gradeid = response.data.data ;
                     this.$store.commit('deletegrade',id);  
                      Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });   
               
                }
          });

         },                       
                      
      },
      created(){
        this.getgrades();
      }

};
</script>

<style>

</style>