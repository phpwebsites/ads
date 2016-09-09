<?php $this->load->view('includes/header.php'); ?>
<section style="pading:50px;">
  <div class="container" style="border: 1px solid #bdbdbd;">
       	 <div class="row addesc">
		        	<div class="col-xs-12 text-center">
		        		<p>
		        			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
		        		</p>
		        	</div>
            </div>
          <div class="row addesc">
           <div class="col-xs-1"></div>
		   <div class="col-xs-10">

		   		<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform');
                    echo form_open_multipart('postad/create', $attributes); ?>
                    
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Title:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
					        <span class="text-danger"><?php echo form_error('title'); ?> </span>
					        
					    </div>
					  
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Description:</label>
					    <div class="col-sm-10"> 
					      <textarea class="form-control" name="desc" id="desc" style="height: 190px;"></textarea>
					       <span class="text-danger"><?php echo form_error('desc'); ?></span>
					    </div>
					    
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Category:</label>
					    <?php 
					      $CI =& get_instance(); 
					      $categories = $CI -> getmaincategories();
					    ?>
					    <div class="col-sm-10"> 
					      <select class="form-control" name="category" id="category">
					      		<option value="">-------Select Category-------</option>	
					      		<?php foreach ($categories as $categories_data ) { ?>
					      			<option value="<?php echo $categories_data -> id; ?>">
					      			  <?php echo $categories_data -> name;  ?>
					      			</option>		
					      		<?php } ?>
					      		
					      </select>
					       <span class="text-danger"><?php echo form_error('category'); ?></span>	
					    </div>
					    
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">SubCategory:</label>
					    <div class="col-sm-10"> 
					      <select class="form-control" name="subcategory" id="subcategory">
					            <option value="">-------Select SubCategory-------</option>	
					      		<option value=""></option>	
					      </select>
					      <span class="text-danger"><?php echo form_error('subcategory'); ?></span>
					    </div>
					     
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Upload Ad images:</label>
					    <div class="col-sm-8"> 
					      <input type="file" name="image[]" id="image" class="form-control">
					      <span class="text-danger"><?php echo form_error('image'); ?></span>
					    </div>
					    <div class="col-sm-2">
					    	<a href="javascript:void(0)" class="btn btn-default add_field_button">Add More</a>
					    </div>
					  </div>
					  <div class="input_fields_wrap">
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Ad Priceing:</label>
					    <div class="col-sm-1"> 
					      <input type="radio" name="pricing" id="free" value="free">Free
					    </div>
					    <div class="col-sm-2"> 
					      <input type="radio" name="pricing" id="pricing" value="priceing" >Priceing
					      
					    </div>
					    <div class="col-xs-9">
					    	<span class="text-danger"><?php echo form_error('pricing'); ?></span>
					    </div>
					    
					   
					  </div>
					  <div class="form-group" id="priceingtable">
				<!-- <form></form>	  	 -->
					  	<div class="row">
					  		<div class="col-xs-2">
					  			
					  		</div>
					  		<div class="col-xs-3">
					  		   <div class="priceing-border" id="plan1">
					  		   	  <div class="plantitle">3 Months Plan</div>
					  		   	  <div class="plandesc"></div>
					  		   	  <div class="planprice">
					  		   	  	<span>250</span>
					  		   	  	<input type="hidden" name="plan1price" id="plan1price" value="250" style="display:none;">
					  		   	  </div>
					  		   	  <div class="switch">
					  		   	  	<!-- <input data-toggle="toggle" data-width="100" type="checkbox" id="plan1"> -->
					  		   	  	<input id="toggle-plan1" type="checkbox" data-toggle="toggle" data-width="100">
					  		   	  	<div id="console-event"></div>
					  		   	  </div>
					  		   </div>
					  		</div>
					  		<div class="col-xs-3">
					  			<div class="priceing-border" id="plan2">
					  		   	   <div class="plantitle">6 Months Plan</div>
					  		   	   <div class="plandesc"></div>
					  		   	  <div class="planprice">
					  		   	  	<span>250</span>
					  		   	  	<input type="hidden" name="plan2price" id="plan2price" value="250" style="display:none;">
					  		   	  </div>
					  		   	  <div class="switch">
					  		   	  	<input id="toggle-plan2" data-toggle="toggle" data-width="100" type="checkbox" id="plan2">
					  		   	  </div>
					  		   </div>
					  		</div>
					  		<div class="col-xs-3">
					  			<div class="priceing-border" id="plan3">
					  		   	   <div class="plantitle">1 Year Plan</div>
					  		   	   <div class="plandesc"></div>
					  		   	  <div class="planprice">
					  		   	  	<span>250</span>
					  		   	  	<input type="hidden" name="plan3price" id="plan3price" value="250" style="display:none;">
					  		   	  </div>
					  		   	  <div class="switch">
					  		   	  	<input id="toggle-plan3" data-toggle="toggle" data-width="100" type="checkbox" id="plan3">
					  		   	  </div>
					  		   </div>
					  		</div>
					  	</div>
					  	
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Price:</label>
					    <div class="col-sm-10"> 
					      <input type="text" name="price" id="price" class="form-control">
					      
					      <span class="text-danger"><?php echo form_error('price'); ?></span>
					    </div>
					    
					 </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Captcha:</label>
					    <div class="col-sm-10" id="captchaimage"> 
					       <?php echo $image; ?>
					    </div>
					   
					  </div>
					 <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd"></label>
					    <div class="col-sm-8"> 
					       <input type="text" name="captcha" id="captcha" class="form-control">
					       <span class="text-danger"><?php echo $error; ?></span> 
					    </div>
					    <div class="col-sm-2" > 
					    <a href="javascript:void(0)" id="refresh">
					      <img src="<?php echo asset_url(); ?>/images/refresh.png" class="refresh">
					    </a>
					    </div>
					 </div>
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Submit</button>
					    </div>
					  </div>
              <?php echo form_close(); ?>
		   </div>
		    <div class="col-xs-1"></div>
			
	   </div>	
  </div>
</section>
<?php $this->load->view('includes/footer.php'); ?>

<script type="text/javascript">
	$(document).ready(function(){

		 var max_fields      = 4; //maximum input boxes allowed
         var wrapper         = $(".input_fields_wrap"); //Fields wrapper
         var add_button      = $(".add_field_button"); //Add button ID
    
		    var x = 1; //initlal text box count
		    $(add_button).click(function(e){ //on add input button click
		        e.preventDefault();
		        if(x < max_fields){ //max input box allowed
		            x++; //text box increment
		                  
		            $(wrapper).append('<div class="form-group"> <label class="control-label col-sm-2" for="pwd"></label><div class="col-sm-8"> <input type="file" name="image[]" class="form-control" /></div><a href="#" class="remove_field  btn btn-default" style="margin-left: 20px;">Remove</a></div>');
		        }
		    });
		    
		    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		        e.preventDefault(); $(this).parent('div').remove(); x--;
		    })


		     $("#refresh").click(function() {
		     	    //alert("check");
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "FrontCategoryController/captcha_refresh",
                        success: function(res) {
                            if (res)
                            {
								jQuery("#captchaimage").html(res);
                            }
                        }
                    });
             });

              $("#category").change(function() {
		     	    var id = $("#category").val();
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "FrontCategoryController/postanadsubcategory/" + id,
                        success: function(res) {
                            if (res)
                            {
								jQuery("#subcategory").html(res);
                            }
                        }
                    });
                });
              
              $("#plan1").mouseover(function() {
              		$("#plan1").css("box-shadow","rgb(202, 197, 197) 10px 10px 5px");
              		
              });

              $("#plan1").mouseout(function() {
              		$("#plan1").css("box-shadow","rgb(0, 0, 0) 0px 0px 0px");
              		
              });

              $("#plan2").mouseover(function() {
              		$("#plan2").css("box-shadow","rgb(202, 197, 197) 10px 10px 5px");
              		
              });

              $("#plan2").mouseout(function() {
              		$("#plan2").css("box-shadow","rgb(0, 0, 0) 0px 0px 0px");
              		
              });
              $("#plan3").mouseover(function() {
              		$("#plan3").css("box-shadow","rgb(202, 197, 197) 10px 10px 5px");
              		
              });

              $("#plan3").mouseout(function() {
              		$("#plan3").css("box-shadow","rgb(0, 0, 0) 0px 0px 0px");
              		
              });

              $("#pricing").click(function(){
                      $("#priceingtable").css("display","block");
              })

              $("#free").click(function(){
              	 $("#priceingtable").css("display","none");
              })

              
              $('#toggle-plan1').change(function() {
	      			if($(this).prop('checked'))
	      			{
	      				$("#toggle-plan2").prop('disabled', true);
	      				$("#toggle-plan3").prop('disabled', true);
	      				$("#plan1price").css("display","block");
	      				$("#plan2price").css("display","none");
	      				$("#plan3price").css("display","none");
	      				
	      			}
	      			else
	      			{
	      				$("#toggle-plan2").prop('disabled', false);
	      				$("#toggle-plan3").prop('disabled', false);
	      				$("#plan1price").css("display","none");
	      				$("#plan2price").css("display","none");
	      				$("#plan3price").css("display","none");
	      			}
    		  })

    		  $('#toggle-plan2').change(function() {
	      			if($(this).prop('checked'))
	      			{
	      				$("#toggle-plan1").prop('disabled', true);
	      				$("#toggle-plan3").prop('disabled', true);
	      				$("#plan1price").css("display","none");
	      				$("#plan2price").css("display","block");
	      				$("#plan3price").css("display","none");
	      			}
	      			else
	      			{
	      				$("#toggle-plan1").prop('disabled', false);
	      				$("#toggle-plan3").prop('disabled', false);
	      				$("#plan1price").css("display","none");
	      				$("#plan2price").css("display","none");
	      				$("#plan3price").css("display","none");
	      			}
    		  })

    		   $('#toggle-plan3').change(function() {
	      			if($(this).prop('checked'))
	      			{
	      				$("#toggle-plan2").prop('disabled', true);
	      				$("#toggle-plan1").prop('disabled', true);
	      				$("#plan1price").css("display","none");
	      				$("#plan2price").css("display","none");
	      				$("#plan3price").css("display","block");
	      			}
	      			else
	      			{
	      				$("#toggle-plan2").prop('disabled', false);
	      				$("#toggle-plan1").prop('disabled', false);
	      				$("#plan1price").css("display","none");
	      				$("#plan2price").css("display","none");
	      				$("#plan3price").css("display","none");
	      			}
    		  })
                    
           
              
              



	});
</script>