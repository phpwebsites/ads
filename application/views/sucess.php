<?php $this->load->view('includes/header'); ?>
<section style="height:315px;">
  <div class="container">
		<div class="row">
		    <div class="col-xs-2">
		    	
		    </div>
			<div class="col-xs-4">
				<img src="" width="300" height="225">
			</div>
			<div class="col-xs-4">
				<h3>Order Completed Sucessfully</h3>
				<div style="background-color: rgba(204, 199, 199, 0.53);padding: 15px;">
					<p>Thankyou for post an ad to promoad.com.we are activating your ad</p>
					<p></p>
					<p>Transaction Id:<b><?php echo $_REQUEST['txn_id']; ?></b></p>
				</div>
				<div style="padding-top: 20px;">
					<a href="<?php echo base_url('home'); ?>" class="btn btn-success">View To Home</a>
				</div>
			</div>
			<div class="col-xs-2">
		    	
		    </div>
		</div>
  </div>
</section>
<?php $this->load->view('includes/footer'); ?>