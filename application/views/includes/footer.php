<?php if($this->router->fetch_class() == "home"){ ?>
  <section class="footer bgfooter">
    <div class="container">
          <div class="row text-center ">
              
                 <h3 class="text-center bgpadding">Connect socially with newbieadds</h3>
                 <hr class="star-primary"></hr>
              <div class="col-xs-3">
                <a href="" class="hvr-pulse"><img src="<?php echo asset_url(); ?>images/twitter.png" class="border"></a>
              </div>
              <div class="col-xs-3">
                 <div><a href="" class="hvr-pulse"><img src="<?php echo asset_url(); ?>images/facebook.png" class="border"></a></div>
              </div>
              <div class="col-xs-3">
                <a href="" class="hvr-pulse"><img src="<?php echo asset_url(); ?>images/linkedin.png" class="border"></a>
              </div>
              <div class="col-xs-3">
                <a href="" class="hvr-pulse"><img src="<?php echo asset_url(); ?>images/youtube.png" class="border"></a>
              </div>

          </div>
          
    </div>
     

  </section>
<?php } ?>
<footer class="bgfooter2">
   <div class="row">
     <div class="col-xs-3">
        <b style="color: #B9B0B0;">Links</b>
     </div>
     <div class="col-xs-3">
        <b style="color: #B9B0B0;">Info</b>
     </div>
     <div class="col-xs-3">
        <b style="color: #B9B0B0;">subscribe</b>
     </div>
     <div class="col-xs-3">
        <b style="color: #B9B0B0;">Contactus</b>
     </div>

   </div>
   <div class="row">
              <div class="col-xs-3">
                    <ul class="list-unstyled footerul">
                       <li><a href="">Home</a></li>
                       <li><a href="">Aboutus</a></li>
                       <li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
                       
                    </ul>
              </div>
              <div class="col-xs-3">
                   <ul class="list-unstyled footerul">
                       <li><a href="">Home</a></li>
                       <li><a href="">privacy policy</a></li>
                       <li><a href="">terms and conditions</a></li>
                    </ul>
              </div>
              <div class="col-xs-3">
                  <form role="form">
                      <div class="form-group">
                        <label for="email" style="color: #bdbdbd;">Email:</label>
                        <input type="email" class="form-control" id="email">
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                  </form>
              </div>
              <div class="col-xs-3">
                  <ul class="list-unstyled footerul">
                     <li>MIG-285,<li>
                     <li>D.No : 39-33-99/3</li>
                     <li>Near East Park,Madhavadhara Vuda Layout,Visakhapatnam-18 </li>
                     <li><a href="<?php echo base_url('contactus'); ?>">See More...</a></li>

                  </ul>
              </div>

       </div>
</footer>

<!--###############Bootstrap Models start############-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="signup">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center" style="font-size: 25px;">Sing Up</h4>
      </div> <!-- modal header end -->
    <div class="row formdown">
           <div class="col-xs-12">
              
                     <?php 
              $formattributes = array('class' => 'form-horizontal', 'id' => 'signup');
              echo form_open('UserController/add_user',$formattributes); 
           ?>
                        <div class="form-group">
                          <div class="col-xs-12 text-center text-success">
                              <h4><?php echo $this->session->flashdata('signupmsg'); ?></h4>
                          </div>
                        </div>
                         <div class="form-group">
                           <label class="control-label col-sm-4" for="email">User Name:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" id="username" >
                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="email">Email:</label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="email" >
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                          </div>
                        </div>
                       <div class="form-group">
                          <label class="control-label col-sm-4" for="pwd">Password:</label>
                          <div class="col-sm-8">          
                            <input type="password" class="form-control" name="password" id="password" >
                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="pwd">Conform Password:</label>
                          <div class="col-sm-8">          
                            <input type="password" class="form-control" name="conformpassword" id="conformpassword">
                            <span class="text-danger"><?php echo form_error('conformpassword'); ?></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="pwd">Phone Number:</label>
                          <div class="col-sm-8">          
                            <input type="text" class="form-control" name="phoneno" id="phoneno">
                            <span class="text-danger"><?php echo form_error('phoneno'); ?></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="pwd">Country:</label>
                          <div class="col-sm-8">   
                            <?php
                               $ci_ins =& get_instance();
                               $countrydata = $ci_ins->getCountry();
                            ?>       
                            <select class="form-control" name="country" id="country">
                               <option value="">-----Select Country-----</option>
                              <?php foreach ($countrydata as $country_data ) { ?>
                                  <option value="<?php echo $country_data->id;  ?>"> <?php echo $country_data->name;  ?> </option>
                              <?php } ?>
                           </select>
                            <span class="text-danger"><?php echo form_error('country'); ?></span>
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-sm-4" for="pwd">State:</label>
                          <div class="col-sm-8">          
                            <select class="form-control" name="state" id="state_id">
                              <option value="">----Select State----</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('state'); ?></span>
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-sm-4" for="pwd">City:</label>
                          <div class="col-sm-8">          
                            <select class="form-control" name="city" id="city_id" >
                              <option value="">----Select City---- </option>
                            </select>
                            <span class="text-danger"><?php echo form_error('city'); ?></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="pwd">Pincode:</label>
                          <div class="col-sm-8">          
                            <input type="text" name="pincode" id="pincode" class="form-control">
                             <span class="text-danger"><?php echo form_error('pincode'); ?></span>
                          </div>
                        </div>
                        <div class="form-group">        
                          <div class="col-sm-offset-4 col-sm-4">
                            <input type="hidden" name="role" id="role" value="3">
                            <button type="submit" class="btn btn-default">Submit</button>
                          </div>
                        
                        </div>
          <?php echo form_close(); ?>             
           </div>
        </div>
    </div>
  </div>
</div>

<!-- ########## Login ########## -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="login_modal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Login</h4>
      </div> <!-- modal header end -->
    <div class="row formdown">
           <div class="col-xs-12">
                  
           <?php 
              $attributes =array("class" => "form-horizontal", "id" => "login", "role" => "form" );
              echo form_open('UserController/login_user',$attributes);
           ?>
                        <div class="form-group">
                          <div class="col-xs-12 text-center">
                                <?php echo $this->session->flashdata('loginerror_msg'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="email">Email:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                          </div>
                        </div>
                       <div class="form-group">
                          <label class="control-label col-sm-4" for="pwd">Password:</label>
                          <div class="col-sm-8">          
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                          </div>
                       </div>
                       <div class="form-group">        
                          <div class="col-sm-offset-4 col-sm-2">
                            <input type="submit" name="login" id="login" class="btn btn-default" value="Login" />
                          </div>
                          <div class="col-sm-6">
                             Are you new user? register <a href="javascript:void(o)" id="register1">Here</a>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-4" for="email"></label>
                        <div class="col-xs-8">
                           <a href="javascript:void(0)" id="fpwd">Forgot Password</a>
                        </div>
                      </div>
                     
                    <?php echo form_close(); ?>
             </div>
          </div>
          </div>
          </div>
          </div>
<!-- ####### Login end ############ -->

<!-- ####### forgotpwd start ############ -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="fpwdform">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Forgot Password</h4>
      </div> <!-- modal header end -->
    <div class="row formdown">
           <div class="col-xs-12">
                  
           <?php 
              $attributes =array("class" => "form-horizontal", "id" => "login", "role" => "form" );
              echo form_open('UserController/forgotpwd',$attributes);
           ?>
                        <div class="form-group">
                          <div class="col-xs-12 text-center">
                                <?php echo $this->session->flashdata('loginerror_msg'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="email">Email:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                          </div>
                        </div>
                       <div class="form-group">        
                          <div class="col-sm-offset-4 col-sm-2">
                            <input type="submit" name="login" id="login" class="btn btn-default" value="Submit" />
                          </div>
                          <div class="col-sm-6">
                             
                          </div>
                      </div>
                    <?php echo form_close(); ?>
             </div>
          </div>
        </div>
        </div>
        </div>

<!-- ####### forgotpwd end ############ -->

<!-- ####### reset password start ############ -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="resetpasswordform">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Forgot Password</h4>
      </div> <!-- modal header end -->
    <div class="row formdown">
           <div class="col-xs-12">
                  
           <?php 
              $attributes =array("class" => "form-horizontal", "id" => "login", "role" => "form" );
              echo form_open('UserController/passwordcreate',$attributes);
           ?>
                        <div class="form-group">
                          <div class="col-xs-12 text-center">
                                <?php echo $this->session->flashdata('loginerror_msg'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="email">New Password:</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                            <span class="text-danger"><?php echo form_error('newpassword'); ?></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="email">Old Password:</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" name="conformpassword" id="conformpassword" placeholder="Old Password">
                            
                            <?php if($this->session->flashdata('hash') != null){ ?>
                            <input type="hidden" name="hash"  class="form-control" value="<?php echo $this->session->flashdata('hash'); ?>">
                           
                            <?php } ?>
                            <span class="text-danger"><?php echo form_error('conformpassword'); ?></span>
                          </div>
                        </div>
                       
                       <div class="form-group">        
                          <div class="col-sm-offset-4 col-sm-2">
                            <input type="submit" name="login" id="login" class="btn btn-default" value="Submit" />
                          </div>
                          <div class="col-sm-6">
                             
                          </div>
                      </div>
                    <?php echo form_close(); ?>
             </div>
          </div>
        </div>
        </div>
        </div>
<!-- ####### reset password end ############ -->

<!--###############Bootstrap Models end##############-->



<script type="text/javascript">
  $(document).ready(function(){
            /*    register*/
     $("#register").click(function(){
      $("#signup").modal("show"); 
     
     });
     
     $("#signin").click(function(){
        $("#login_modal").modal("show"); 
     });
     
     $("#register1").click(function(){
        
        $("#signup").modal("show"); 
        $("#login_modal").modal("hide"); 
      
     });
     $("#fpwd").click(function(){
        
        $("#fpwdform").modal("show"); 
        $("#login_modal").modal("hide"); 
      
     });
     
    
    <?php
       if(validation_errors() != false)
       { 
         if($this->router->fetch_method() == "login_user")
         {
    ?>
            $("#login_modal").modal("show"); 
                   
    <?php    
           }
       }
    ?>
    
    <?php
        //echo validation_errors(); exit;
       if(validation_errors() != false)
       { 
          //echo "test"; exit;
         if($this->router->fetch_method() == "add_user")
         {
    ?>
            $("#signup").modal("show"); 
                   
    <?php    
           }
       }
    ?>
     
     <?php
        if($this->session->flashdata('loginerror_msg') != "")
      {
     ?>
            $("#login_modal").modal("show"); 
     <?php
      }
     ?>

     <?php
        if($this->session->flashdata('signupmsg') != ""){
     ?>
           $("#signup").modal("show"); 
     <?php
      }
     ?>

     <?php
        if($this->session->flashdata('resetpasswordmsg') != ""){
     ?>
           $("#resetpasswordform").modal("show"); 
     <?php
      }
     ?>

     $("#country").change(function(){
              var country_id = $("#country").val();
                       //alert(country_id);
                       $.ajax({
                            type: "POST",
                            url: '<?php echo site_url('getfrontstates').'/'; ?>'+country_id,
                            //data: id='cat_id',
                            success: function(data){
                              //alert(data);
                              $('#state_id').html(data);
                        },
                       });

          });

          $("#state_id").change(function(){

                       var state_id = $("#state_id").val();
                       
                       $.ajax({
                            type: "POST",
                            url: '<?php echo site_url('getfrontcites').'/'; ?>'+state_id,
                            //data: id='cat_id',
                            success: function(data){
                                
                            $('#city_id').html(data);
                        },
                       });


          });
  });
</script>


