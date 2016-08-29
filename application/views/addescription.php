<?php $this->load->view('includes/header') ?>
 <section>
 	<div class="container">
 	   <?php 
 	      $adci =& get_instance(); 
 	      $singleimage = $adci->getimage($adresult->id);
 	      //print_r($singleimage);
 	      $allimagedata = $adci->getAllAdimages($adresult->id);
 	      //print_r($allimagedata);exit;
 	   			
 	   ?>
 	    <div class="row">
 	    	<ul class="breadcrumb">
			    <li><a href="<?php echo base_url(); ?>">Home</a></li>
			    <li><a href="<?php echo base_url('#categories'); ?>">All Categories</a></li>
			    <li class="active"><a href="javascript:history.back()">Sub Categories</a></li>
			    <li class="active">info</li>
           </ul>
 	    </div>
 		<div class="row">
 		   <div class="col-xs-4">
 		      <div class="row">
 		        <div class="col-xs-12" id="addsubimage">
 		      	 <img src="<?php echo base_url(); ?>/uploads/<?php echo $singleimage->name;  ?>" style="width:95%;height:30%;" data-toggle="magnify" id="mainimage"> 
 		      	<!--  <div  id="addsubimage"> -->
 		      	</div>	
 		      </div>
 		      <div class="row">
 		      <?php foreach($allimagedata as $allimage_data ){ ?>
 		      	<div class="col-xs-3">
 		      	 <a href="javascript:void(0)" id="<?php echo $allimage_data->id; ?>" class="imageid">
 		      	   <img src="<?php echo base_url(); ?>/uploads/<?php echo $allimage_data->name;  ?>" style="width:100%">
 		      	 </a>
 		      	</div>
 		      <?php } ?>	
 		      		
 		      </div>
 		   	  
 		   </div>
 		   <div class="col-xs-8">
 		   	 <div class="row">
 		   	    <strong><?php echo $adresult->title;  ?></strong>
 		   	 	<p class="text-justify"><?php echo $adresult->description;  ?></p>
 		   	 </div>
 		   	 <div class="row">
 		   	 	<div class="col-xs-2">
 		   	 		<img src="<?php echo asset_url(); ?>images/price_image.png" width="45">
 		   	 		<span style=" font-size: 18px;"><?php echo round($adresult->price,3);  ?></span>
 		   	 		
 		   	 	</div>
 		   	 	<?php
 		   	 	  $userci =& get_instance();
 		   	 	  $userdata = $userci->getuser($adresult->user_id);
 		   	 	  $countryci =& get_instance();
 		   	 	  $countrydata = $countryci->getcountry($userdata->country_id);
 		   	 	  $stateci =& get_instance();
 		   	 	  $statedata = $stateci->getstate($userdata->state_id);
 		   	 	  $cityci =& get_instance();
 		   	 	  $citydata = $cityci->getcity($userdata->city_id);
 		   	 	  //print_r($userdata);
 		   	 	?>
 		   	 	<div class="col-xs-6">
 		   	 		<img src="<?php echo asset_url(); ?>images/location.png" width="45">
 		   	 		<span style=" font-size: 17px;"><?php echo $countrydata->name; ?>,<?php echo $statedata->name; ?>,<?php echo $citydata->name; ?></span>
 		   	 	</div>
 		   	 	<div class="col-xs-4">
 		   	 		<img src="<?php echo asset_url(); ?>images/phone.png" width="45">
 		   	 		<span style=" font-size: 17px;"><?php echo $userdata->phoneno; ?></span>
 		   	 	</div>
 		   	 </div> 
 		   	 <div class="row">
 		   	   <div class="col-xs-12 text-center push-text">
	 		   		<ul class="nav nav-tabs">
					   <li class="active"><a data-toggle="tab" href="#home">Seller Profile</a></li>
					   <li><a data-toggle="tab" href="#menu1">How to post ad</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane fade in active text-left push-text">
					    <img src="<?php echo asset_url(); ?>/images/unknownuser.png" style="width: 20%;">
					    <bold><?php echo $userdata->name; ?></bold>
					  </div>
					  <div id="menu1" class="tab-pane fade text-left push-text">
					     <ol type="1">
							  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
							  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </li>
							  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </li>
						 </ol>
					  </div>
					  
					</div>   		
 		   	   </div>
 		   	 	
 		   	 </div>	
 		   	 <div class="row" style="padding-top:60px;">

 		   	 	<div class="col-xs-6" >
 		   	 	    <span>Share:</span>
 		   	 		<i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
 		   	 		<i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i>
 		   	 		<i class="fa fa-google-plus-square fa-lg" aria-hidden="true"></i>
 		   	 		<i class="fa fa-linkedin-square fa-lg" aria-hidden="true"></i>
 		   	 	</div>
 		   	 	<div class="col-xs-6">
 		   	 	    <span>Like:</span>
 		   	 		<i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
 		   	 		<i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i>
 		   	 		<i class="fa fa-google-plus-square fa-lg" aria-hidden="true"></i>
 		   	 		<i class="fa fa-linkedin-square fa-lg" aria-hidden="true"></i>
 		   	 	</div>
 		   	 </div>
 		   	
 		   </div>
 			
 		</div>
 	</div>
 </section>

 <section>
  <div class="container">
       <h3>Recent Ads</h3>
	   <div class="row">
	      <div class="col-xs-2 text-justify">
	      		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop</p>
	      		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
	      		

	      </div>
	 	  <div class="col-xs-8">
	 	  			 <?php $recentadsdata =& get_instance(); ?>
	 	             <?php 
	 	             	$recentdata = $recentadsdata->recentads($adresult->subcategory_id);

	 	             ?>
	 	             <?php foreach($recentdata as $recent_data){ ?>
	 	                 <a href="<?php echo base_url('description/'.$recent_data->id); ?>" style="color: #4e4e4e;">
		 	  	         <div class="row adbg">
	                        
		                         <div class="col-xs-5">
		                            <?php $singleimage = $adci->getimage($recent_data->id); ?>
		                            <img src="<?php echo base_url(); ?>uploads/<?php echo $singleimage->name; ?>" style="height:150px;width:100%;">
		                         </div>
		                         <div class="col-xs-7">
		                            <h4><?php echo $recent_data->title ?></h4>
		                            <p class="text-justify"><?php echo $recent_data->description; ?></p>
		                            <p><b>Price :</b> <?php echo round($recent_data->price); ?> <span class="addcat"><b>Posted By:</b><?php $reuserdata = $userci->getuser($adresult->user_id); echo $reuserdata->name;   ?></span> <span class="addcat"><b>Time:</b>1month ago</span></p>

		                         </div>
	                       </div>
                       </a>
                      <?php } ?>
                       
                        
	 	  </div>
	 	  <div class="col-xs-2 text-justify">
	      		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop</p>
	      		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
	      		

	      </div>
	 		
	   </div>
  </div>
 	
 </section>
 <script type="text/javascript">
	$(document).ready(function(){
		$('.imageid').click(function(){
			var image_id = $(this).attr('id');
			$.ajax({
                type: "POST",
                url: '<?php echo site_url('images').'/'; ?>'+image_id,
                            //data: id='cat_id',
                success: function(data){
                   // alert(data);
                   $("#mainimage").css("display","none");
                   $('#addsubimage').html(data);
                },
            });
		})
	});

</script>
<?php $this->load->view('includes/footer.php'); ?>
