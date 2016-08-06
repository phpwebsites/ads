<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Admin Update
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i>Admins 
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
                <?php echo form_open('admin/updateuser',$attributes); ?> 
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Name:</label>
                         <div class="col-sm-7">
                         <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name" value="<?php echo $userdata->name ?>">
                         <span class="text-danger"><?php echo form_error('name'); ?></span>
                         </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="pwd">Email:</label>
                         <div class="col-sm-7">
                           <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo $userdata->email; ?>">
                           <span class="text-danger"><?php echo form_error('email'); ?></span>
                         </div>
                        
                     </div>
                    <div class="form-group">
                         <label class="control-label col-sm-2" for="pwd">Password:</label>
                         <div class="col-sm-7">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="<?php echo base64_decode($userdata -> password) ?>">
                          <span class="text-danger"><?php echo form_error('password'); ?></span>
                         </div>
                    </div> 
                    <div class="form-group">
                         <label class="control-label col-sm-2" for="pwd">Conform Password:</label>
                         <div class="col-sm-7">
                          <input type="password" class="form-control" name="conformpassword" id="conformpassword" placeholder="Enter ConformPassword" value="<?php echo base64_decode($userdata -> password) ?>">
                          <span class="text-danger"><?php echo form_error('conformpassword'); ?></span>
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="pwd">Phone Number:</label>
                         <div class="col-sm-7">
                          <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="Enter Phonenumber" value="<?php echo $userdata-> phoneno; ?>">
                          <span class="text-danger"><?php echo form_error('phonenumber'); ?></span>
                        </div>
                    </div> 

                <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-7">
                             <input type="hidden" name="role" id="role" value="2">
                             <input type="hidden" name="user_id" id="user_id" value="<?php echo $userdata-> id; ?>">
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