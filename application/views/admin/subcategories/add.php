<div id="page-wrapper" style="padding-bottom: 98px !important;">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							SubCategory 
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-tags"></i> SubCategory
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
                <?php echo form_open_multipart('subcategory/insert',$attributes); ?> 
                      <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Categories:</label>
                         <div class="col-sm-7">
                         <select class="form-control" id="category" name="category">
                            <option value="">------Select Category------</option>
                            <?php foreach ($categories as $categories_name) {?>
                               
                                <option value="<?php echo $categories_name->id; ?>"><?php echo $categories_name->name; ?></option>
                           <?php  } ?>
                            
                             
                         </select>
                         <span class="text-danger"><?php echo form_error('category'); ?></span>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">SubCategory Name:</label>
                         <div class="col-sm-7">
                         <input type="text" class="form-control" id="subcategory" name="subcategory"  placeholder="Enter Name">
                         <span class="text-danger"><?php echo form_error('subcategory'); ?></span>
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