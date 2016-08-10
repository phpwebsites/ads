<?php if(count($ads) > 0){ ?>
	<?php foreach($ads as $ads_data ){ ?>
	<div class="row adbg">
		<div class="col-xs-4">
		   <?php $data = $this->adsimagesmodel->getimage($ads_data->id); ?>
		   <img src="<?php echo base_url(); ?>uploads/<?php echo $data->name;  ?>" width=250 height=160>
	    </div>
	    <div class="col-xs-7">
		    <h4><?php echo $ads_data->title; ?></h4>
		    <p class="text-justify"> <?php echo $ads_data->description;  ?></p>
		    <p><b>Price :</b> <?php echo $ads_data->price  ?>  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:<?php echo $ads_data->createdon; ?></b><?php echo timespan($ads_data->createdon,time()) ?></span></p>                        
	    </div>
	</div>
	<?php } ?>
<?php } else{ ?>
	<div class="row adbg">
		<div class="col-xs-12 text-center"> No Ads In This Category </div>
	</div>
<?php } ?>