



<template>
  <div>
    <!-- stat home  -->

    <div class="col-12" style="">
      <div class="row">
        <div
          class="d-none d-md-none d-lg-block d-xl-block col-xs-12 col-sm-12 col-md-3- col-lg-3 col-xl-3"
          style="background: #d5dbdb" >
          <!-- side bar right -->

          <div class="container" style="direction: rtl">
            <br />

            <div class="container" style="background: white; margin: auto">
              <center>
                <span style="color: green">𝑀.𝐸𝓃𝑔.𝒮𝓊𝓅𝑒𝓇𝓋𝒾𝓈𝒾𝑜𝓃 𝒾𝓃 𝑀𝑒𝓃𝑜𝓊𝒻𝒾𝒶</span>
              </center>
            </div>

            <br />
          </div>

        </div>
          <!-- ============================ -->

        <div class="col-xs-12 col-sm-12 col-md-6- col-lg-6 col-xl-6 p-0 m-0"
          style="min-height:500px">
          
          <ch></ch>
          
          </div>

        <!--==================================== -->
        <div
          class="d-none d-md-none d-lg-block d-xl-block col-xs-12 col-sm-12 col-md-3- col-lg-3 col-xl-3"
           >
          <div class="container" style="direction: rtl">
            <br />

            <div class="container" style="background: white">
              <center>
                <span style="color: green"
                  >𝑀.𝐸𝓃𝑔.𝒮𝓊𝓅𝑒𝓇𝓋𝒾𝓈𝒾𝑜𝓃 𝒾𝓃 𝑀𝑒𝓃𝑜𝓊𝒻𝒾𝒶mm</span
                >
              </center>
            </div>

            <br />
          </div>
        </div>
      </div>
    </div>

    <!-- end home  -->
  </div>
</template>


<style type="text/css">
/* .colored-toast.swal2-icon-success {
  background-color: white !important;
  color: green;
} */
</style>



<script>
 import ch from '../channels/Ch.vue';


export default {
  props: ["lang", "mysite"],
  components:{ch, },
  data() {
    return {
     
    };
  },
  computed:{
      notverify:function() { 
         return this.$store.getters.userve;
      }
     },
  watch:{
       notverify:function(val) {
              if(val===0)
              {
                  this.$router.push('/sendverifyemail');
              }       
       }
  },
  methods: {
   
   
  },


};
</script>