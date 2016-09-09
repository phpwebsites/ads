<?php $this->load->view('includes/header.php'); ?>
  <section>
  	 <div class="container">
  	    <div class="row">
  	    	<div class="col-xs-12">
  	    		<div></div>
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
					      
					      <td><?php echo $adsresult->title; ?></td>
					      <td><?php echo $adsresult->description  ?></td>
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
					      <td><?php echo round($adsresult->price); ?></td>
					    </tr>
					 </tbody>
             </table>
  	 		</div>
  	 		<div class="col-xs-2">
  	 			
  	 		</div>
  	 	</div>
  	 </div>
  </section>


<?php $this->load->view('includes/footer.php'); ?>