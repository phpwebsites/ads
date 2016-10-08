<?php $this->load->view('includes/header'); ?>
<section style="min-height: 485px;">
   <div class="container">
    <?php $count = 0; ?>
    <?php foreach($blogresult as $blog_result ){ ?>
   		<div class="row <?php if($count > 0){ echo "addesc"; } ?>" >
			<div class="col-xs-6">

				<img src="<?php echo base_url(); ?>uploads/blog/<?php echo $blog_result->image; ?>" width="560" height="250">
			</div>
			<div class="col-xs-6">
			    <strong><?php echo $blog_result->title; ?></strong>
				<p class="text-justify"><?php echo character_limiter($blog_result->description,560); ?><a href="<?php echo base_url('blogdesc/'.$blog_result->id); ?>" style="padding-left: 10px;">View More</a></p>
				<p><b>Created on :</b><?php echo date("d/m/Y h:ia",strtotime($blog_result->createdon));  ?> &nbsp&nbsp <b>Comments :</b><?php $countci =& get_instance(); echo $countci->commentcount($blog_result->id);  ?></p>
				
			</div>
	   </div>
	   <hr class="boxshadow">
	 <?php $count++; } ?>
	 <div class="row">
	 	<div class="col-xs-12">
	 	  <?php echo $links; ?>
	 		
	 	</div>
	 </div>
  </div>
</section>
<?php $this->load->view('includes/footer'); ?>