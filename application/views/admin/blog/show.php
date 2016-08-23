<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <div class="row">
                          <div class="col-xs-9 page-header" style="margin-top: 18px;">
                              <h3>Blog</h3>
                          </div>
                          <div class="col-xs-3 page-header">
                             <a href="<?php echo base_url('blog/add'); ?>" class="btn btn-primary btn-md">Add Blog</a>
                          </div>
                       </div>
                        
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
				             <?php echo $this->session->flashdata('msg'); ?>
			    </div>
              <?php } ?>
                
                <div class="row">
                     <div class="col-lg-12">
                           <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Sno</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th class="text-center">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
										                  $count = 1;
										                  foreach ($blogresult as $blog_result){ 
									                  ?>
                                      <tr>
                                        <td> <?php echo $count;  ?> </td>
                                        <td> <?php echo $blog_result -> title; ?></td>
                                        <td> <?php echo $blog_result -> description; ?></td>
                                        <td> <img src="<?php echo base_url(); ?>/uploads/blog/<?php echo $blog_result -> image;  ?>" width="100" height="100" /></td>
                                        <td class="text-center">
                                          <a href="<?php echo base_url("blog/edit/".$blog_result ->id); ?>"><i class="fa fa-edit"></i></a>
                                          <a href="<?php echo base_url('blog/delete/'.$blog_result -> id); ?>" onClick="return confirm('Are you sure you want to delete record')"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                      </tr>
                                   <?php $count++; ?>
                                   <?php } ?>
                                      
                                    </tbody>
                           </table>
                      </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
