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
						 	   <?php $i = 1; ?>
						 	   <?php foreach($subcategories as $subcategories_data ){ ?>

					  			   <li>
					  			     <i class="glyphicon glyphicon-menu-right"></i> 
					  			     <a href="javascript:void(0)" id="<?php echo $subcategories_data->id;?>" class="sub<?php echo $i; ?>" ><?php echo $subcategories_data->name; ?> </a>
					  			     <lable>(2)</lable>
					  			   </li>

					  		   <?php $i++; } ?>
					  			
					  		</ul>
						 </div>
						  
						    
						</div>
						<div  id="showads">
                        	<div class="row adbg" id="showads">
                        	   <div class="col-xs-12 text-center"> No Ads.If you want any ads please click on above subcategory </div>
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

<?php for($i=1; $i <= count($subcategories); $i++){ ?>
        $(".sub<?php echo $i; ?>").click(function(){
              var country_id = $("#country").val();
                      var id = $(this).attr('id');
    				  $.ajax({
                            type: "POST",
                            url: '<?php echo site_url('getads').'/'; ?>'+id,
                            //data: id='cat_id',
                            success: function(data){
                              //alert(data);
                              $('#showads').html(data);
                        },
                       });

          });
<?php } ?>

	});
</script>


