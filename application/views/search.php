<?php include "includes/header.php"; ?>
	<section class="category">
		<div class="container">
		  <div class="row">
	    	<div class="col-xs-12">
	    		<ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="<?php echo base_url('#categories'); ?>">All Categories</a></li>
    <li class="active">Sub Categories</li>
</ul>
	    	</div>
	    </div>
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
		  	<div class="col-xs-9">
					  	<div class="row">
							<div class="col-xs-12 addborder">
								<h3 class="text-center"> Top ads </h3>
							</div>
						</div>
<?php if(count($ads) > 0){ ?>
	<?php foreach($ads as $ads_data){ ?>
 <a href="<?php echo site_url('description/'.$ads_data->id); ?>" style="color:#4e4e4e;">
	<div class="row adbg">
		<div class="col-xs-4">
		   <?php $data = $this->adsimagesmodel->getimage($ads_data->id);
		    ?>
		   <img src="<?php echo base_url(); ?>uploads/<?php echo $data->name;  ?>" width=250 height=160>
	    </div>
	    <div class="col-xs-7">
		    <h4><?php echo $ads_data->title; ?></h4>
		    <p class="text-justify"> <?php echo $ads_data->description;  ?></p>
		    <p><b>Price :</b> <?php echo round($ads_data->price);  ?>  
		    <span class="addcat"><b>Posted By:</b>
		     <?php $userdata = $this->usermodel->get_userdata($ads_data->user_id); 
		     		echo $userdata->name;
		     ?>  
		    </span> 
		    <span class="addcat">
		    <b>Time:</b>
		    <?php
		        echo time_stamp($ads_data->createdon);
  		    ?>
  		    </span>
	    </div>
   </div>
  </a>
     <?php $adid = $ads_data->id; ?>
	<?php } ?>
<?php } else{ ?>
	<div class="row adbg">
		<div class="col-xs-12 text-center"> No Ads In This Category </div>
	</div>
<?php } ?>
<div id="loadmore"></div>
<div class="row">
 	<!-- <button onclick="loadmore()" value="loadmore" />
 	</br>
   <input type="text" name="limit" id="limit" value="10"/>
   <input type="text" name="offset" id="offset" value="1"/>  
   <div id="load-more">
   	
   </div> -->
<?php if(count($ads) > 0){ ?>
   <div id="remove_row">
   	   <button type="button" name="btn-more" id="btn-more" data-vid="<?php echo $adid; ?>" class="btn btn-success form-control">Load more</button>
   </div>
<?php } ?>
   
</div>

						        
					
						
                      
					  

		  	</div>
		  </div>
			
		</div>
	</section>


<script type="text/javascript">
	
	$(document).ready(function(){
		$(document).on('click','#btn-more',function(){

			var last_ad_id = $(this).data("vid");
			
	 $.ajax({
    	
        url:'<?php echo site_url('SearchController/loadmore'); ?>',
        type: 'POST',
        data:{
          offset :$(this).data("vid")
        },
        dataType:'text',
        success :function(data){
        	
        	if(data != "")
        	{
        		$("#remove_row").remove();
        		$("#loadmore").append(data);
        		
        	}
           // $('#offset').val(data.offset)
           // $('#limit').val(data.limit)
        }
    })

		})
	})
			
	
</script>
<?php include "includes/footer.php";  ?>



