


import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex);
  
const store = new Vuex.Store({
       state:{
           langx:'',
           user:'',
           posts:[],
           edit:'',
           grades:[],
           subjects:[],
           terms:[],
           q:'',
           examq:'',
           gamesettings:{},
           startgame:false,
           gamequestions:{},
           gameresults:'',
           myresult:'',
           myorder:'',
           startgamevars:{
                serial:0,
                timer:0,
                level:0,
                level1:10,
                level2:5 ,
                prog:0,
                proglevel:0,
                extratime:300, 
           },

                     
         },
       mutations: {
        setlang(state, lang) {
            state.langx = lang;
        },
        setauth(state, user) {
            state.user = user;
         },

       ///////////////////////grade /subject ////////////
       //save grade
         setgradesall(state, grades) {
           state.grades=grades ;
        },
        //save grade
         savegrade(state, grade) {
           state.grades.unshift(grade) ;
        },
         editgrade(state, grade) {
          let index = state.grades.findIndex(val=>val.id === grade.id) ;
                  state.grades[index]= grade ;
        }, 
        deletegrade(state, gradeid ) {
           let index = state.grades.findIndex(val=>val.id === gradeid);
               state.grades.splice(index,1);
        },          
//save subject
         setsubjectsall(state, subjects) {
           state.subjects=subjects ;
        },
        //save subject
         savesubject(state, subject) {
           state.subjects.unshift(subject) ;
        },
         editsubject(state, subject) {
          let index = state.subjects.findIndex(val=>val.id === subject.id) ;
                  state.subjects[index]= subject ;
        }, 
        deletesubject(state, subjectid ) {
           let index = state.subjects.findIndex(val=>val.id === subjectid);
               state.subjects.splice(index,1);
        },
/// term                  
        settermsall(state, terms) {
           state.terms=terms ;
        },
        //save term
         saveterm(state, term) {
           state.terms.unshift(term) ;
        },
         editterm(state, term) {
          let index = state.terms.findIndex(val=>val.id === term.id) ;
                  state.terms[index]= term ;
        }, 
        deleteterm(state, termid ) {
           let index = state.terms.findIndex(val=>val.id === termid);
               state.terms.splice(index,1);
        },
//questions
        setqall(state, q) {
           state.q = q;
        },

         savenewq(state, q) {
           state.q.unshift(q) ;
        },
         saveeditq(state, editq) {
          let index = state.q.findIndex(val=>val.id === editq.id) ;
                  state.q[index]= editq ;
        }, 
          deleteq(state, qid ) {
           let index = state.q.findIndex(val=>val.id === qid);
               state.q.splice(index,1);
        },
     //////exam random///
        setexamq(state, exam ) {
               state.examq = exam ;
        }, 
//////////////////////////////////////game//////////////////        
        ////////////option//////////

        gamesettings(state, settings ) {
               state.gamesettings = settings ;
               state.startgame = true ;
        },
        exitgame(state, val) {
                state.startgame = val;
        },
        setgamequestions(state , qg){
               state.gamequestions = qg;
        },
        setgameresults(state ,results){
               state.gameresults = results.sort((a,b)=>b.mark - a.mark);
          var userid = state.user.id;     
          var index = state.gameresults.findIndex(val=>val.user_id === userid);
               state.myorder = index ;
               console.log(index);
               state.myresult = results[index];
            }, 
        setgamevars(state , vars){
               state.startgamevars = vars;
        },        
        settimer(state , timex){
               state.startgamevars.timer = timex;
        },        
        timeron(state , numb){
               state.startgamevars.timer = state.startgamevars.timer - numb;
        },           
        addmoretime(state , timeadded){
               state.startgamevars.timer     = state.startgamevars.timer + timeadded;
               state.startgamevars.extratime = state.startgamevars.extratime - timeadded;
        }, 
        addprog(state , mar){
               state.startgamevars.prog = state.startgamevars.prog + mar ;
        },         
        setprog(state , zero){
               state.startgamevars.prog = 0 ;
        },        
        addproglevel(state , lev){
               state.startgamevars.proglevel =  lev ;
        },        
        addmarks(state , newmark){

           let allgameresults = state.gameresults ;
           let userid = state.user.id;     
           var index = allgameresults.findIndex(val=>val.user_id === userid);
               allgameresults[index].mark  = allgameresults[index].mark + newmark ;
               state.gameresults = allgameresults.sort((a,b)=>b.mark - a.mark);
           var upindex = state.gameresults.findIndex(val=>val.user_id === userid);
               state.myorder = upindex ;   

        },                       
    },
       getters:{

        // level:function(state){
        //    return state.startgamevars.level ;   
        // },          
        level1:function(state){
           return state.startgamevars.level1 ;   
        },          
        level2:function(state){
           return state.startgamevars.level2 ;   
        },          
        prog:function(state){
           return state.startgamevars.prog ;   
        },          
        proglevel:function(state){
           return state.startgamevars.proglevel ;   
        },       
        gametimer:function(state){
           return state.startgamevars.timer ;   
        },   
        extratime:function(state){
           return state.startgamevars.extratime ;   
        },    
        gamesettings:function(state){
           return state.gamesettings ;   
        }, 
        gamequestions:function(state){
           return state.gamequestions ;   
        },  
        startgame:function(state){
           return state.startgame ;   
        },        
        gameresults:function(state){
           return state.gameresults ;   
        },
        myresult:function(state){
           return state.myresult ;   
        },
        myorder:function(state) {
          return state.myorder ;
        },        
        lang:function(state){
            return state.langx;
        },
        user:function(state){
            return state.user;
        },
        getposts:function(state){
            return state.posts;
        },
        subjects:function(state){
            return state.subjects;
        },
        grades:function(state){
            return state.grades;
        },
        terms:function(state){
            return state.terms;
        },
        q:function(state){
            return state.q;
        },
        examq:function(state){
            return state.examq;
        }, 
        currentpage:function(state){
            return state.currentpage;
        },               
         stream:function(state){
            return state.streams;
        },
        getedit:function(state){
           return state.edit ;   
        },        

       }

});


export default store;