<?php include "includes/header.php"; ?>
	<section class="category">
		<div class="container">
		  <div class="row">
		  	<div class="col-xs-3">
		  		 <ul class="nav nav-pills nav-stacked navbgcolor">
				        <li><a href="#" class="catgegoryheading">All Categories</a></li>
				        <?php 
				            $i = 1; 
				            $CI =& get_instance();
				            $categories = $CI -> getmaincategories();
				        ?>
				        <?php foreach($categories as $categories_main){ ?>
				        	<li <?php if($categories_main->id == $this->uri->segment(3)){ ?> class="active"  <?php } ?> >
				        	   <a href="<?php echo base_url('category/getsubcate/'.$categories_main -> id); ?>" id="categoryhover<?php echo $i; ?>"><?php echo $categories_main->name ?><span class="right-arrow<?php echo $i; ?> glyphicon glyphicon-menu-right" style="display:none;" > </span></a>
				        	</li>
				        <?php $i++; } ?>
				       
				 
      			 </ul>
		  		
		  	</div>
		  	<div class="col-xs-8">
					  	<div class="row">
							<div class="col-xs-12 addborder">
								<h3 class="text-center"> Top ads </h3>
							</div>
						</div>
						<div class="row allcategories">
						 <div class="col-xs-4">
						 	<ul class="list-unstyled">
						 	   <?php foreach($subcategories as $subcategories_data ){ ?>

					  			   <li><i class="glyphicon glyphicon-menu-right"></i> <a href="#" ><?php echo $subcategories_data->name; ?> </a><lable>(2)</lable></li>

					  		   <?php } ?>
					  			
					  		</ul>
						 </div>
						  
						    
						</div>
						<div class="row adbg">
                        
	                         <div class="col-xs-5">
	                            <img src="<?php echo asset_url(); ?>images/ad1.jpg" width=310 height=200>

	                         </div>
	                         <div class="col-xs-7">
	                            <h4>Lorumipsum Lorumipsum</h4>
	                            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

	                         </div>
                       </div>
                       <div class="row adbg">
                        
	                         <div class="col-xs-5">
	                            <img src="<?php echo asset_url(); ?>images/ad1.jpg" width=310 height=200>
	                          
	                         </div>
	                         <div class="col-xs-7">
	                            <h4>Lorumipsum Lorumipsum</h4>
	                            <p class="text-justify ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

	                         </div>
                       </div>
                        <div class="row adbg">
                        
	                         <div class="col-xs-5">
	                            <img src="<?php echo asset_url(); ?>images/ad1.jpg" width=310 height=200>
	                          
	                         </div>
	                         <div class="col-xs-7">
	                            <h4>Lorumipsum Lorumipsum</h4>
	                            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

	                         </div>
                       </div>
					  

		  	</div>
		  </div>
			
		</div>
	</section>
<?php include "includes/footer.php";  ?>
<script type="text/javascript">
	$(document).ready(function(){
		<?php for($i=1; $i <= count($categories); $i++){ ?>
			$("#categoryhover<?php echo $i; ?>").mouseover(function(){

				$(".right-arrow<?php echo $i; ?>").css("display","block");

			})
			$("#categoryhover<?php echo $i; ?>").mouseout(function(){

				$(".right-arrow<?php echo $i; ?>").css("display","none");

			})
		<?php } ?>
	});
</script>


