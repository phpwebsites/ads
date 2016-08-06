<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <div class="row">
                          <div class="col-xs-9 page-header" style="margin-top: 18px;">
                              <h3>Admins</h3>
                          </div>
                          <div class="col-xs-3 page-header">
                             <a href="<?php echo base_url('admin/addadmin'); ?>" class="btn btn-primary btn-md">Add Admin</a>
                          </div>
                       </div>
                        
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Admins
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th class="text-center">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
										                  $count = 1;
										                  foreach ($result as $user){ 
									                  ?>
                                      <tr>
                                        <td><?php echo $count;  ?> </td>
                                        <td> <?php echo $user -> name; ?></td>
                                        <td><?php  echo $user -> email; ?></td>
                                        <td><?php echo $user -> phoneno;   ?></td>
                                        <td class="text-center">
                                          <a href="<?php echo base_url('admin/updateform/'.$user -> id); ?>"><i class="fa fa-pencil-square-o"></i></a>
                                          <a href="<?php echo base_url('admin/delete/'.$user -> id); ?>" onClick="return confirm('Are you sure you want to delete record')"><i class="fa fa-trash-o"></i></a>
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
