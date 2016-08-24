
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
				<p style="padding-top: 10px;"><b>Posted On:</b><?php echo date ("d/m/Y h:ia",strtotime($blogdesc->createdon));?>&nbsp&nbsp<b>comments:</b><?php $countci =& get_instance(); echo $countci->commentcount($blogdesc->id); ?></p>
			</div>
		</div>
		<div class="row">
		<h2>
			Comments
		</h2>
		<?php
		   $CI =& get_instance();
		   $comments = $CI->getAllComents($blogdesc->id);
		   
		?>
		<?php foreach($comments as $comments_data){ ?>
			<div class="row">
			    <div class="col-xs-1"></div> 
				<div class="col-xs-8">
					<p><?php echo $comments_data->commentdesc; ?><div><b>Posted By:</b><?php if($this->session->userdata('username') != ""){ echo $this->session->userdata('username'); }else{ echo "Guest User"; } ?>  <b>Created On:</b> <?php  echo date ("d/m/Y h:ia",strtotime($comments_data->createdon));	 ?></div></p>
				</div>
				<div class="col-xs-2"></div> 

			</div>
		<?php } ?>	
		
		 <div class="col-xs-1"></div>
		 <div class="col-xs-8">
		 	
		 	<?php $attrib = array('class' => "form-horizontal"); ?>
		 	<?php echo form_open('comment/create', $attrib) ?>
		 	    <div class="form-group">
		 		<textarea class="form-control" style="width:760px;height:160px;" name="desc" id="desc"></textarea>
		 	    <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blogdesc->id;  ?>">
		 		</div>
		 		<div class="form-group">
		 		   
		 		   <div class="col-xs-3"><input type="submit" name="" class="form-control btn comment-primary btn-md" style="margin-left: -12px;"></div>
		 		  
		 		</div>
		 	
		 	<?php echo form_close(); ?>
		 </div>
		 <div class="col-xs-2"></div>
		
		</div>

	</div>
</section>
<?php $this->load->view('includes/footer.php'); ?>