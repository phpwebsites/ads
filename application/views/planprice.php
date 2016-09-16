<?php $this->load->view('includes/header.php'); ?>
  <section style="min-height: 320px;">
  	 <div class="container">
  	    <div class="row">
  	    	<div class="col-xs-2">
  	    		
  	    	</div>
  	    	<div class="col-xs-8">
  	    	  <div class="row">
  	    	  	<div class="col-xs-7">
  	    	  	  <?php 
  	    	  	     $pieces = explode("-", $adsresult->adplanprice); 
  	    	  	  ?>

  	    	  		<h2> <?php echo $pieces[0];  ?> months Plan</h2>

  	    	  	</div>
  	    	  	<div class="col-xs-1">
  	    	  		<h3><?php echo $pieces[1] ?>$</h3>
  	    	  	</div>
  	    	  </div>
  	    			
  	    	</div>
  	    	<div class="col-xs-2">
  	    		
  	    	</div>
  	    </div>
  	 	<div class="row">
  	 		<div class="col-xs-2">
  	 			
  	 		</div>
  	 		<div class="col-xs-8">
  	 			<table class="table table-striped">
					  <thead>
					    <tr>
					      <th>Title</th>
					      <th>Description</th>
					      <th>Category</th>
					      <th>Sub Category</th>
					      <th>Cost of ad</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td>
                  <?php 
                     $sucessdata = array('ad_id' => $adsresult->id ,'user_id' => $adsresult->user_id,'plantime' => $pieces[0] ); 
                     $this->session->set_userdata($sucessdata);
                  ?>     
                </td>
					      <td><?php echo $adsresult->title; ?></td>
					      <td><?php echo $adsresult->description;  ?></td>
					      <td>
					        <?php 
					           $category =& get_instance();
					           $data = $category->getmaincategory($adsresult->id);
					           echo $data->name;
					        ?>
					         
					       </td>
					      <td>
					        <?php  
					        	$subcategory = & get_instance();
					        	$subdata = $subcategory->getsubcategory($adsresult->id);
					        	echo $subdata->name;
					        ?>
					        
					      </td>
					      <td><?php echo round($adsresult->price); ?>&nbsp &#x20A8;</td>
					    </tr>
					 </tbody>
             </table>
  	 		</div>
  	 		<div class="col-xs-2">
  	 			
  	 		</div>
  	 	</div>
  	 	<div class="row">
  	 		<div class="col-xs-2">
  	 			
  	 		</div>
  	 		<div class="col-xs-8 text-right">
  	 		<?php echo form_open($this->config->item('posturl')); ?>
            <!-- <input type="hidden" name="rm" value="2"/> -->
            <!-- <input type="hidden" name="cmd" value="_cart"/> -->
  	 				<input type="hidden" name="return" value="<?php echo $this->config->item('returnurl'); ?>">
            <input type="hidden" name="cancel_return" value="<?php echo $this->config->item('cancel_return'); ?>">
          	<input type="hidden" name="cmd" value="_xclick">
					  <input type="hidden" name="business" value="<?php echo $this->config->item('business'); ?>">
            <!-- <input type='hidden' name='cbt' value='Click here to Complete Order' /> -->
            <!-- <input type="hidden" name="item_name_1" value="abc"> -->
            <input type="hidden" name="notify_url" value="ipn"/>
            <!-- <input type="hidden" name="upload" value="1"/> -->
					<?php 
					   $paypal = & get_instance(); 
					   $usdamount = $paypal->currency_convert($pieces[1],"INR","USD");
					?>
					  <input type="hidden" name="amount" id="amount" value="<?php echo $usdamount;  ?>" >
            <!-- <input type="hidden" name="currency_code" value="EUR"/> -->
				  	<input type="image" name="submit"
				    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
				    alt="PayPal - The safer, easier way to pay online">
				               <!-- <img alt="" width="1" height="1"
				    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" > -->

		 <?php echo form_close(); ?>
     
  	 		</div>
  	 		<div class="col-xs-2">
  	 			
  	 		</div>
  	 	</div>
  	 </div>
  </section>


<?php $this->load->view('includes/footer.php'); ?>