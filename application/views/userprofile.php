<?php $this->load->view('includes/header.php'); ?>
   <section>
       <div class="container">
       		<div class="row">
            		<div class="col-xs-2">
                    	<div class="adds">
                        
                        </div>
                    </div>
                    <div class="col-xs-8">
                           <?php echo form_open('UserController/updateUser');  ?>
                              <div class="form-group row" style="padding-bottom: 15px;">
                                <label for="inputEmail3" class="col-sm-3 form-control-label">User Name:</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name" value="<?php echo $user_data->name; ?>">
                                  <span class="text-danger"><?php echo form_error('username'); ?></span>
                                </div>
                              </div>
                              <div class="form-group row" style="padding-bottom: 15px;">
                                <label for="inputEmail3" class="col-sm-3 form-control-label">Email:</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $user_data->email;  ?>">
                                  <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                              </div>
                              <div class="form-group row" style="padding-bottom: 15px;">
                                <label for="inputPassword3" class="col-sm-3 form-control-label">Password:</label>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                  <span class="text-danger"><?php echo form_error('password'); ?></span>
                                  
                                </div>
                              </div>
                              <div class="form-group row" style="padding-bottom: 15px;">
                                <label for="inputPassword3" class="col-sm-3 form-control-label">Conform Password:</label>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control" id="conformpwd" name="conformpwd" placeholder="Enter Conform Password">
                                  <span class="text-danger"><?php echo form_error('conformpwd'); ?></span>
                                </div>
                              </div>
                              <div class="form-group row" style="padding-bottom: 15px;">
                                <label for="inputPassword3" class="col-sm-3 form-control-label">Phone Number:</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="Enter Phone Number" value="<?php echo $user_data->phoneno; ?>">
                                  <span class="text-danger"><?php echo form_error('phoneno'); ?></span>
                                  
                                </div>
                              </div>
                              
                              
                              <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-10">
                                  <button type="submit" class="btn btn-secondary">Update</button>
                                </div>
                              </div>
							<?php form_close(); ?>                   
                    </div>
                    <div class="col-xs-2">
                       <div class="adds">
                       </div>
                    </div>
            </div>
       </div>
   </section>
   
<?php $this->load->view('includes/footer.php'); ?>