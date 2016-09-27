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
                            <li style="margin-left: 70%;"> 
                               <a href="<?php echo base_url('category/index'); ?>">
                                 <img src="<?php echo base_url(); ?>assets/admin/images/backarrow.png"><span style="padding-left: 5px;font-size: 15px;">Back</span>
                               </a>
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
                <?php echo form_open_multipart('category/updateinsert',$attributes); ?> 
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Name:</label>
                         <div class="col-sm-7">
                         <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Title" value="<?php echo $result->name; ?>">
                         <span class="text-danger"><?php echo form_error('name'); ?></span>
                         <input type="hidden" name="categoriesid" id="categoriesid" value="<?php echo $result->id;  ?>" />
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2">Image:</label>
                         <div class="col-sm-7">
                             <input type="file" name="image" id="blogimageupdate" class="form-control" />
                         </div>
                         <span class="text-danger"><?php echo form_error('image'); ?></span>
                         
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2"></label>
                        <div class="col-sm-7">
                          <img src="<?php echo base_url(); ?>/uploads/<?php echo $result->image; ?>" id="image_upload_preview">  
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