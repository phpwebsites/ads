<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <div class="row">
                              <div class="col-xs-6">Category</div>
                              <div class="col-xs-6 text-right">
					               <a href="<?php echo base_url('add/category'); ?>" class="btn btn-primary btn-md">Add Category</a>
                              </div>
                           </div>

                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-tags"></i> Category
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
                                        <th>Name</th>
                                        <th class="text-center">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                             <?php if(count($result) > 0){ ?>
                              		<?php $i=1; ?>
                             	  <?php foreach($result as $row){ ?>
                                      <tr>
                                        <td>
                                          <?php echo $i; ?>
                                        </td>
                                        <td>
                                          <?php echo $row->name; ?>
                                        </td>
                                        <td class="text-center">
                                 			 <a href="<?php echo base_url("category/update/".$row->id); ?>"><i class="fa fa-pencil-square-o"></i></a>
                                 			 <a href="<?php echo base_url("category/delete/".$row->id); ?>" onClick="return confirm('Are you sure you want to delete record')" ><i class="fa fa-trash-o"></i></a>
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
                <div class="row">
                   <div class="col-xs-12">
                      <?php echo $links;  ?>
                   </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
