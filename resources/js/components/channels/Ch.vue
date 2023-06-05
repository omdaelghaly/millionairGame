<template>
	<div>
		<!--  -->


		<div class="col-12 p-0 m-0 " style="">
			<div class="row col-12 p-0 m-0">

                   <video  class="col-12 p-0 m-0 " controls autoplay 
                       :src="channelsrc()" style="object-fit:cover;height:500px">
                   	
                   </video>



			</div>
		</div>


	</div>
</template>


<script type="text/javascript">
	export default{
          data(){
          	return{
          		currentch:'',
          	}
          },
          methods:{
          	channelsrc(){
                 return 'game/video/ch.mp4';
          	},

          },//end methods 

	};
</script>