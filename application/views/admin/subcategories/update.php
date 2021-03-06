<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Category Update
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Category
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
                <?php echo form_open_multipart('subcategory/updateinsert',$attributes); ?> 
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Categories:</label>
                         <div class="col-sm-7">
                         <?php $data_array = array(); ?>
                            <?php foreach ($categories as $categories_name) { ?>

                                <?php $data_array[$categories_name->id] = $categories_name->name; ?>

                            <?php } ?>
                           
                            <?php
                               $attributes = array('class' => "form-control");
                               echo form_dropdown('category',$data_array,$result->categories_id,'class="form-control" id="category"');
                            ?>
                        <?php //echo form_dropdown("category",); ?>
                         <span class="text-danger"><?php echo form_error('category'); ?></span>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Name:</label>
                         <div class="col-sm-7">
                         <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name" value="<?php echo $result->name; ?>">
                         <input type="hidden" name="subcatid" id="subcatid" value="<?php echo $result->id;  ?>" />
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