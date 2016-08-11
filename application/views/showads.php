<?php if(count($ads) > 0){ ?>
	<?php foreach($ads as $ads_data ){ ?>
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
	<?php } ?>
<?php } else{ ?>
	<div class="row adbg">
		<div class="col-xs-12 text-center"> No Ads In This Category </div>
	</div>
<?php } ?>
