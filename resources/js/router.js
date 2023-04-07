

import Vue from 'vue'

import store from './store/store'

import VueRouter from 'vue-router'

Vue.use(VueRouter)



 import home from './components/home/Home'
 import login from './components/Auth/Login'
 import register from './components/Auth/Register'
 import sendverifyemail from './components/Auth/Emailsent'
 import callback_ve from './components/Auth/Callback_ve'
 import forgetpwd from './components/Auth/forgetpwd'
 import callback_pwd from './components/Auth/Callback_pwd'
// import classroom from './components/class/room'

 import games from'./components/game/Index.vue'
 import myprofile from'./components/profiles/my-profile/Index.vue'
 
//  //exam-dash 
   import examsetting from './components/exams-dash/Index.vue'
// //exams
//  import exams from './components/exams/Index.vue'


  import notfound from './components/nopage/Notfound'




const routes =[
  
  
    {path:'/login', component:login ,name:'login', meta: { title:'login' },
        beforeEnter:(to,from,next)=>{
          if(store.getters.user){
          	return next({name:'sendverifyemail'});
          }else{
          	return next();
          }
        } 
    },
    {path:'/register', component:register ,name:'register' , meta: { title:'register' },
        beforeEnter:(to,from,next)=>{
          if(store.getters.user){
          	return next({name:'sendverifyemail'});
          }else{
          	return next();
          }
        } 
     },
    {path:'/sendverifyemail', component:sendverifyemail ,name:'sendverifyemail' , meta: { title:'sendverifyemail'},
        beforeEnter:(to,from,next)=>{
            if (store.getters.user.token ) {
         	    if(store.getters.user.verifyemail ==1)
         	      {
         	           return next({name: 'home'});
         	      }else{
         	           return next();
         	      }
            }else{
             return next({name: 'home'});
            }
        }
     },
    {path:'/callback_ve/e/:emailx/t/:tokenx', component:callback_ve ,name:'callback_ve' , meta: { title:'emailVerify'},},

    {path:'/', component:home ,name:'home', 
        beforeEnter:(to,from,next)=>{
            if (store.getters.user ) {
         	    if(store.getters.user.verifyemail ==1)
         	      {
         	           return next();
         	      }else{
         	           return next({name: 'sendverifyemail'});
         	      }
            }else{

                return next();
            }
        }
    },
     {path:'/forgetpwd', component:forgetpwd ,name:'forgetpwd' },
     {path:'/callback_pwd/e/:emailx/t/:tokenx', component:callback_pwd ,name:'callback_pwd' },
 
     {path:'/myprofile', component:myprofile,name:'myprofile',
        beforeEnter:(to,from,next)=>{
            if (store.getters.user ) {
              if(store.getters.user.verifyemail ==1)
                {
                     return next();
                }else{
                     return next({name: 'sendverifyemail'});
                }
            }else{

                return next({name:'home'});
            }
        }
      },

     // {path:'/callback_ve/e/:email/t/:token', component:callback_ve ,name:'callback_ve' , meta: { title:'emailVerify'  } },

  // {path:'/:classroom', component:classroom ,name:'classroom'},

      {path:'/exam-setting', component:examsetting,name:'exam-setting',
        beforeEnter:(to,from,next)=>{
            if (store.getters.user ) {
              if(store.getters.user.verifyemail ==1)
                {
                     return next();
                }else{
                     return next({name: 'sendverifyemail'});
                }
            }else{

                return next({name:'home'});
            }
        }
      },
     {path:'/games', component:games,name:'games',
        beforeEnter:(to,from,next)=>{
            if (store.getters.user ) {
              if(store.getters.user.verifyemail ==1)
                {
                     return next();
                }else{
                     return next({name: 'sendverifyemail'});
                }
            }else{

                return next({name:'home'});
            }
        }
      },
     // {path:'/exams', component:exams,name:'exams',
     //    beforeEnter:(to,from,next)=>{
     //        if (store.getters.user ) {
     //          if(store.getters.user.verifyemail ==1)
     //            {
     //                 return next();
     //            }else{
     //                 return next({name: 'sendverifyemail'});
     //            }
     //        }else{

     //            return next({name:'home'});
     //        }
     //    }
     //  },


   {path:'/:any', component:notfound ,name:'notfound'},


];




const router = new VueRouter({ 
    mode:'history',
    routes ,    
  });



  export default router;