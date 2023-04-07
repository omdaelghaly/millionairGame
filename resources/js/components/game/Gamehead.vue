
    <template>
     <div>
      <div class=" col-12 p-0 m-0"  style="display:flex;position:absolute;top:1px" >
       


        <div class="col-3 p-1">
         <div class="text-center" style="border-radius:5px;background:lightblue;overflow:hidden">
          <i class="fa-solid fa-coins"></i>
          : {{myresult ? myresult.mark : '0'}}
        </div>
      </div>   
      <!--  -->

      <div class="col-3 p-1">
       <div class="text-center"  style="border-radius:5px;background:lightblue;overflow:hidden">
         <i class="fa-regular fa-clock" style="font-size:15px"> </i> 
         : {{gametimer ? gametimer : '00'}}
       </div>
     </div>   
     <!--  -->


     <div class="col-3 p-1">
       <div  class="text-center" style="border-radius:5px;background:lightblue;overflow:hidden">
         <!-- level ========== -->
         <span type="button"  data-toggle="modal" data-target="#Modallevel">
           <i class="fa-solid fa-arrow-up-short-wide"></i>
           : {{myorder >=0  ? myorder +1 :'0'}}
         </span>
         


         <!-- Modal -->
         <div class="modal fade" id="Modallevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header p-0 m-0" style="background: #8ab0bd ">
                <h5 >my level : <span style="color:red">
                 {{myorder >=0  ? myorder +1 :'0'}}
               </span> </h5>
               <button type="button" class="close" style="float:right" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="max-height:400px;overflow:scroll">
             <!--  -->
             <div class="container-fluid">
              <div v-for="(gamer,index) in gameresults" :key="index">
                <div :id="index" @change="mylevel()" class="p-0 m-0" style="display:inline-flex">
                  <span>{{index +1}}</span> - 
                  <img style="width:30px;height:30px;border-radius:30px ;" class="ml-1 p-0"  :src="gamerimage(gamer.getuser.image)" id="profileimage">
                  <span class="mx-1">{{gamer.getuser.name}}</span> :

                  <h5>{{gamer.mark}}</h5>
                </div>

                <hr class="p-0 m-0">
              </div>

            </div>
            <!--  -->
          </div>
          
        </div>
      </div>
    </div>
    <!-- end level========== -->
    </div>
    </div>   
    <!--  -->



    <div class="col-3 p-1">
     <div  class="text-center" style="border-radius:5px;background:lightblue;overflow:hidden">
       <!-- extra time ========== -->
       <span type="button" id="btnextratime" data-toggle="modal" data-target="#Modalextratime">
        <i class="fa-solid fa-calendar-plus"></i>
        : {{extratime ?extratime :"0"}}
      </li>
    </span>



    <!-- Modal -->
    <div class="modal fade" id="Modalextratime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header m-0 p-2 " style="background: #8ab0bd ">
            <h5 class="m-0 p-0">
              You have
              <span style="color:green" class="m-0 p-0"> 
               {{ extratime ? extratime : "0"}} 
             </span>
             seconds .
           </h5>
           <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <li class=" btn btn-primary btn-sm w-100" @click="addtime(100)" > Add more time  + 100 s</li>
        </div>

      </div>
    </div>
    </div> 
    <!--  -->
    </div>

    </div>   


    </div>          
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


           <script type="text/javascript">
           export default{
             // props:['timer','level1','level2','extratime','serial','prog'],

             data(){
              return{

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
                methods:{
                  gamerimage(image){
                    return 'images/profiles/'+image ;
                  },
                  addtime(timeadded){
                    if(this.gametimer != 0){
                      if(timeadded <= this.extratime){
                        this.$store.commit('addmoretime',timeadded);
                          // this.extratime = this.extratime - timeadded ;
                          // this.timer = this.timer + timeadded;
                        }
                      } 
                      $('.close').click(); 
                    },

                  },



                };



                </script>