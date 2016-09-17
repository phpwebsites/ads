<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <div class="row">
                              <div class="col-xs-6">Transactions</div>
                              <div class="col-xs-6 text-right">
					             <!--  <a href="<?php echo base_url('state/add'); ?>" class="btn btn-primary btn-md">Add St ate</a> -->
                              </div>
                           </div>

                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-location-arrow"></i>Transactions
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
                
                <div class="row">
                     <div class="col-lg-12">
                           <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Sno</th>
                                        <th>Add Id </th>
                                        <th>User name</th>
                                        <th>Phone Number</th>
                                        <th>Transaction Id</th>
                                        <th>Plans</th>
                                        <th>No of days postan ad</th>
                                        <td>Ad Activation Status</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                             <?php if(count($payment_result) > 0){ ?>
                              		<?php $i=1; ?>
                             	  <?php foreach($payment_result as $row){ ?>
                                      <tr>
                                        <td>
                                          <?php echo $i; ?>
                                        </td>
                                        <td>
                                          <?php echo $row->ad_id; ?>
                                        </td>
                                        <td>
                                          <?php 
                                             $username =& get_instance(); 
                                             $userdata = $username->getuserdata($row->user_id);
                                             echo $userdata->name;
                                          ?>
                                          
                                        </td>
                                        <td>
                                          <?php echo $userdata->phoneno; ?>
                                        </td>
                                        <td>
                                          <?php echo $row->transaction_id; ?>
                                        </td>
                                        <td>
                                          <?php echo $row->plans;  ?>
                                        </td>
                                        <td>
                                          <?php 
                                            $addata =& get_instance();
                                            $addate = $addata->getaddata($row->ad_id);
                                            echo time_stamp($addate->createdon);
                                          ?>
                                          
                                        </td>
                                        <td>
                                         <?php if($addate->status == 1){ ?>
                                            <a href="<?php echo base_url('inactive/'.$addate->id);  ?>" id="status" name="<?php echo $addate->id."-1";  ?>" style="text-decoration:none;" >Active</a>
                                            
                                         <?php }else{ ?>
                                            <a href="<?php echo base_url('active/'.$addate->id);  ?>" id="status" name="<?php echo $addate->id."-0";  ?>" style="text-decoration:none;">In Active</a>
                                         <?php } ?>

                                        </td>
                                       

                                      </tr>
                                  <?php $i++; ?>    
                                  <?php } ?>
                           
                            <?php } else{ ?>
                              <tr>
                             	<td colspan="6" align="center"> No Records.....</td>
                             </tr>
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

