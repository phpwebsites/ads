<?php print_r($editblogdata); ?>
<div id="page-wrapper" style="padding-bottom: 98px !important;">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Blog Add
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Blog
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
                <?php echo form_open_multipart('blog/updatecreate',$attributes); ?> 
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Title:</label>
                         <div class="col-sm-7">
                         <input type="text" class="form-control" id="title" name="title"  placeholder="Enter Title" value="<?php echo $editblogdata->title; ?>">
                         <span class="text-danger"><?php echo form_error('title'); ?></span>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Description:</label>
                         <div class="col-sm-7">
                         <textarea class="form-control" name="description" id="description" cols="8" rows="8"><?php echo $editblogdata->description; ?></textarea>
                         <span class="text-danger"><?php echo form_error('description'); ?></span>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Image:</label>
                         <div class="col-sm-7">
                         <input type="file" name="blogimage" id="blogimageupdate" class="form-control">
                         <img src="<?php echo base_url(); ?>/uploads/blog/<?php echo $editblogdata->image; ?>" width="150" height="150" id="image_upload_preview">
                         <input type="hidden" name="blogid" id="blogid" value="<?php echo $editblogdata->id; ?>">
                         <span class="text-danger"><?php echo form_error('blogimage'); ?></span>
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