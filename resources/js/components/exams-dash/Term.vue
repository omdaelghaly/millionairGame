





<template>
    <div>

      <center><span> {{pagetitle}} </span></center>


         <div class="container cox">
          <div class="row p-3" style="background:white;border-radius:10px">

                  <input type="text" name="stage" v-model="data.name" ref="stage" class="form-control">

               <div class="text-center col-12 mt-1">

                   <button @click="freshterm"  class="btn-sm btn-secondary" >  reset </button>
                   <button @click="saveeditterm" v-if="data.id" class="btn-sm btn-primary"  >  تعديل  </button>
                   <button @click="addterm" v-if="!data.id" class="btn-sm btn-success" >  اضافة ترم   </button>
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
      <th scope="col">term name </th>
      <th scope="col">options </th>
      
    </tr>
  </thead>
  <tbody>
    <tr   v-for="(item, index) in termvuex" :key="index" >
      <th scope="row">{{index+1}} </th>
      <td>{{item.name}}</td>
      <td> 
         <button @click="editterm(item)"  class="btn-sm btn-primary" >  edit </button>
     </td>
      <td>
          <button @click="deleteterm(item.id)"  class="btn-sm btn-danger" >  delete </button>
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
             pagetitle:' اعداد ترم  ',
             stages:' الترم  ' ,
             data:{
                 id:'',
                 name:'',
             },
             
         }
       },
       computed:{
          termvuex:function() {
            return this.$store.state.terms;
          },
          datalength:function(){
            return this.data.name;
          }

       },
       watch:{
          datalength:function(val){
            if(val.length > 50){
              alert('اقصى عد احرف او ارقام هو 50');
              this.freshterm();
            }
          }
       },
       methods:{
          freshterm(){
            this.data.id="";
            this.data.name=""; 
            this.getterms(); 
         },
          getterms(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;  axios.get('api/getterms').then((response)=>{
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
        addterm(){
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
              await checkname(that.termvuex ,that.data.name);
              if(validateerror){
                     Toast.fire({
                     icon: 'warning',
                     title: 'data exits',
                      });  
              }else{
                   let da = that.data.name;
                   if(da){
                           that.savenewterm();
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
         savenewterm(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                    let newterm = new FormData();
                   let that = this;
        //id
            newterm.append('id',this.data.id);
        //name
            newterm.append('name',this.data.name);
         
         axios.post('api/saveterm',newterm).then((response)=>{
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
                // save and update term in vuex store 
                     let newtermdb = response.data.data ;
                     this.$store.commit('saveterm',newtermdb);   
                // console.log(response.data.data)
                     Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });  
                }
          });


         },
          editterm(item){
              this.data = item ;
         },
         saveeditterm(){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                    let editterm = new FormData();
                   let that = this;
        //id
            editterm.append('id',this.data.id);
        //name
            editterm.append('name',this.data.name);
         
         axios.post('api/saveeditterm',editterm).then((response)=>{
               if(response.data.status=='error')
               {
                      Toast.fire({
                      icon: 'error',
                      title:response.data.msg,
                     });
               }else if(response.data.status=='success')
               {
                // save and update term in vuex store 
                     let edittermdb = response.data.data ;
                     this.$store.commit('editterm',edittermdb); 
                     this.data.name = '';
                     this.data.id = '';  
                     Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });  
                }
          });


         },
          deleteterm(id){
              window.axios.defaults.headers.common['Authorization'] = `Bearer `+this.$store.state.user.token;
                axios.post('api/deleteterm',{'id':id}).then((response)=>{
               if(response.data.status=='error')
               {
                console.log('there is some thing wrong');
                    
               }else if(response.data.status=='success')
               {
                // save and update term in vuex store 
                     let termid = response.data.data ;
                     this.$store.commit('deleteterm',id);  
                      Toast.fire({
                     icon: 'success',
                     title: response.data.msg,
                      });   
               
                }
          });

         },                       
                      
      },
      created(){
        this.getterms();
      }

};
</script>

<style>

</style>