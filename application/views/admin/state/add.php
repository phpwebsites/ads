<div id="page-wrapper" style="padding-bottom: 98px !important;">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							State Add
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> State
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
              <?php if($this->session->flashdata('msg') != ""){ ?>
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				     <?php echo $this->session->flashdata('msg');  ?>
			    </div>
              <?php } ?>
                <div class="container">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open_multipart('state/insert',$attributes); ?>
                     <div class="form-group">
                     	<label class="control-label col-sm-2" for="email">Country:</label>
                     	<div class="col-sm-7">
                     	<?php 
                     	  $ci =& get_instance();  
                     	  $countrydata = $ci->getallcountries();
                     	?>
                         <select class="form-control" name="country_id" id="country_id">
                           <option value="">----Select Country----</option>
                           <?php foreach($countrydata as $country_data ){ ?>   
                           		<option value="<?php echo $country_data->id; ?>"><?php echo $country_data->name; ?></option>
                           <?php } ?>
                         </select>
                        </div>
                     
                     </div> 
                     <div class="form-group">
                     	<label class="control-label col-sm-2" for="email"></label>
                     	<div class="col-sm-7">
                     	 <span class="text-danger"><?php echo form_error('country_id'); ?></span>
                        </div>
                     
                     </div> 
                    
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Name:</label>
                         <div class="col-sm-7">
                         <input type="text" class="form-control" id="name" name="name"  placeholder="Enter State Name">
                         </div>
                       
                     </div>
                       <div class="form-group">
                     	<label class="control-label col-sm-2" for="email"></label>
                     	<div class="col-sm-7">
                     	   <span class="text-danger"><?php echo form_error('name'); ?></span>
                        </div>
                     
                     </div> 
                      
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-7">
                             <button type="submit" class="btn btn-default">Submit</button>
                         </div>
                     </div>                             
					<?php echo form_close(); ?>
                </div>

             
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->