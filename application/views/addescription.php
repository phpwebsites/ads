<?php
  print_r($adresult);
?>
<?php $this->load->view('includes/header') ?>
 <section>
 	<div class="container">
 		<div class="row">
 		   <div class="col-xs-4">
 		      <div class="row">
 		      	 <img src="<?php echo asset_url(); ?>/images/mobilead.png" style="width:95%;height:30%;"> 	
 		      </div>
 		      <div class="row">
 		      	<div class="col-xs-3">
 		      	   <img src="<?php echo asset_url(); ?>/images/mobilead.png" style="width:100%">
 		      	</div>
 		      	<div class="col-xs-3">
 		      	   <img src="<?php echo asset_url(); ?>/images/mobilead.png" style="width:100%">
 		      	</div>
 		      	<div class="col-xs-3">
 		      	   <img src="<?php echo asset_url(); ?>/images/mobilead.png" style="width:100%">
 		      	</div>
 		      		
 		      </div>
 		   	  
 		   </div>
 		   <div class="col-xs-8">
 		   	 <div class="row">
 		   	    <strong><?php echo $adresult->title;  ?></strong>
 		   	 	<p class="text-justify"><?php echo $adresult->description;  ?></p>
 		   	 </div>
 		   	 <div class="row">
 		   	 	<div class="col-xs-4">
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
 		   	 	<div class="col-xs-4">
 		   	 		<img src="<?php echo asset_url(); ?>images/location.png" width="45">
 		   	 		<span style=" font-size: 17px;"><?php echo $countrydata->name; ?>,<?php echo $statedata->name; ?><?php echo $citydata->name; ?></span>
 		   	 	</div>
 		   	 	<div class="col-xs-4">
 		   	 		<img src="<?php echo asset_url(); ?>images/phone.png" width="45">
 		   	 		<span style=" font-size: 17px;">456878423665</span>
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
					     <ol class="list-group">
					     	<li class="list-group-item">Lorumipsum</li>
					     	<li class="list-group-item">Lorumipsum</li>
					     	<li class="list-group-item">Lorumipsum</li>
					     	<li class="list-group-item">Lorumipsum</li>
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
       <h3>User Ads</h3>
	   <div class="row">
	      <div class="col-xs-2 text-justify">
	      		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop</p>
	      		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
	      		

	      </div>
	 	  <div class="col-xs-8">
	 	  	         <div class="row adbg">
                        
	                         <div class="col-xs-5">
	                            <img src="<?php echo asset_url(); ?>images/ad1.jpg" style="height:150px;width:100%;">
	                         </div>
	                         <div class="col-xs-7">
	                            <h4>Lorumipsum Lorumipsum</h4>
	                            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

	                         </div>
                       </div>
                       <div class="row adbg">
                        
	                         <div class="col-xs-5">
	                           <img src="<?php echo asset_url(); ?>images/ad1.jpg" style="height:150px;width:100%;">
	                          
	                         </div>
	                         <div class="col-xs-7">
	                            <h4>Lorumipsum Lorumipsum</h4>
	                            <p class="text-justify ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

	                         </div>
                       </div>
                        <div class="row adbg">
                        
	                         <div class="col-xs-5">
	                            <img src="<?php echo asset_url(); ?>images/ad1.jpg" style="height:150px;width:100%;">
	                          
	                         </div>
	                         <div class="col-xs-7">
	                            <h4>Lorumipsum Lorumipsum</h4>
	                            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

	                         </div>
                       </div>
	 	  </div>
	 	  <div class="col-xs-2 text-justify">
	      		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop</p>
	      		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
	      		

	      </div>
	 		
	   </div>
  </div>
 	
 </section>
   

<?php $this->load->view('includes/footer.php'); ?>