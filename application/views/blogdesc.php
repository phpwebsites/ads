
<?php $this->load->view('includes/header.php'); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-6 text-center">
				<img src="<?php echo base_url(); ?>uploads/blog/<?php echo $blogdesc->image; ?>" width="500" height="400" class="boxshadow">
			</div>
			<div class="col-xs-6 text-justify">
			    <strong><?php echo $blogdesc->title;  ?></strong></br>
				<?php echo $blogdesc->description;  ?>
			</div>
		</div>
		<div class="row">
		<h2>
			Comments
		</h2>
		<div class="row">
		    <div class="col-xs-1"></div> 
			<div class="col-xs-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniamLorem ipsum dolor sit amet,<div><b>Posted By:</b> jjjijijiioo <b>Time:</b> 3min ago 	</div></p>
			</div>
			<div class="col-xs-2"></div> 

		</div>
		<div class="row">
			<div class="col-xs-1"></div> 
			<div class="col-xs-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniamLorem ipsum dolor sit amet,<div><b>Posted By:</b> jjjijijiioo <b>Time:</b> 3min ago 	</div></p>
			</div>
			<div class="col-xs-2"></div> 
		</div>
		<div class="row">
			<div class="col-xs-1"></div> 
			<div class="col-xs-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniamLorem ipsum dolor sit amet,<div><b>Posted By:</b> jjjijijiioo <b>Time:</b> 3min ago 	</div></p>
			</div>
			<div class="col-xs-2"></div> 
		</div>
		 <div class="col-xs-1"></div>
		 <div class="col-xs-8">
		 	<form class="form-horizontal">
		 	    <div class="form-group">
		 		<textarea class="form-control" style="width:760px;height:160px;"></textarea>
		 	
		 		</div>
		 		<div class="form-group">
		 		   <div class="col-xs-3"></div>
		 		   <div class="col-xs-6"><input type="submit" name="" class="form-control btn comment-primary" style="margin-left: -12px;"></div>
		 		  
		 		</div>
		 	</form>
		 </div>
		 <div class="col-xs-2"></div>
			
		</div>

	</div>
</section>
<?php $this->load->view('includes/footer.php'); ?>