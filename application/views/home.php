<?php $this->load->view('includes/header') ?>
   <section id="slider">
   				<!-- Carousel -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                            	<span>Welcome to <strong>LOREM IPSUM</strong></span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>Welcome to LOREM IPSUM</span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="Third slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>Welcome to LOREM IPSUM</span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			</div>
			<!-- Controls -->
			
		</div><!-- /carousel -->

   	
   </section>
   <section id="categories">
   		<div class="container">
   			<div class="row">
   			   <div class="col-xs-12 text-center">
              
           		<h2>Categories</h2>
   			   		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
et dolore magna aliqua. Ut enim ad minim veniamLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
et dolore magna aliqua. Ut enim ad minim veniam</p>
   			   </div>
   				
   			</div>
   			<div class="row text-center" style="padding-top: 50px;">
   				 <?php 
               $CI =& get_instance();
               $category =  $CI->getcategories();

            ?>
            <?php $i = 1; ?>
            <?php foreach($category as $category_data) { ?>
            <div class="col-xs-3 catheight" style="<?php if($i >= 5){ echo 'margin-top:25px;'; } ?>">
                <div class="category<?php echo $i; ?>">
                  <a href="" class="btn btn-default<?php echo $i; ?> btn-circle"><i class="glyphicon glyphicon-asterisk"></i></a>
                  <h5 class="add_name"><strong><?php echo $category_data->name;  ?></strong></h5>
                  <ul class="list-unstyled text-justify" style="padding: 15px;" >
                    
                    <?php $subcategory = $CI -> subcategories($category_data->id); ?>
                    <?php foreach ($subcategory as $subcategory_data ) { ?>
                        <li> <a href=""><?php echo $subcategory_data->name; ?></a> <?php 
                         $countci =& get_instance(); 
                         $count = $countci->adCount($subcategory_data->id);
                       ?>
                       <lable>(<?php echo $count;  ?>)</lable></li>

                    <?php } ?>
                    
                  </ul>
                  <hr class="hr<?php echo $i; ?>">
                  <div class="text-center" id="bgcolor<?php echo $i; ?>"> 
                    <a href="<?php echo base_url("category/getsubcate/".$category_data->id) ?>" style="color: #4E4E4E;" id="viewall4">View All</a>
                  </div>


               </div>
           </div>
           <?php $i++; } ?>

   			
   		  </div>

   <div class="row">
      <div class="col-xs-12 text-center loadmore">

         <!--  <a href="" class="btn btn-success">Load More</a>
         -->
      </div>
     
   </div>
</section>
<?php 
 $CI_allads =& get_instance();  
 $allads = $CI_allads->getAllads();
 $CI_alladsimage =& get_instance();  
 
?>
<section id="thumbnail-slider">
     <div class="container">
             <section class="regular slider">
          <?php foreach($allads as $allads_data){ ?>
            <a href="<?php echo site_url('description/'.$allads_data->id); ?>" style="text-decoration:none;">
              <div>
                <?php $alladsimage = $CI_alladsimage->getAlladsImages($allads_data->id); ?>
                <img src="<?php echo site_url(); ?>uploads/<?php echo $alladsimage->name;  ?>" style="width: 80%;">
                <span style="color:#4e4e4e;"><b>Price:</b><?php echo round ($allads_data->price); ?></span>

              </div>
            </a>
          <?php } ?>   
            </section>
      </div>

  
</section>
<section id="search">
 <div class="container">
      <div class="row">
          
           <div class="col-xs-8 col-xs-offset-2">
           <?php echo form_open('search/create') ?>
              <select name="adscategory" id="adscategory">
                <option value="">-----select category-----</option>
                <?php foreach($category as $category_data){ ?>
                    <option value="<?php echo $category_data->id; ?>"><?php echo $category_data->name; ?></option>
                <?php } ?>
              </select>
              <input type="text" name="adsearch" id="adsearch">
              <input type="submit" name="adsearchbutt" id="adsearchbutt" value="">
          <?php echo form_close(); ?>
           </div>
        
      </div>
  </div>
  
</section>
<section id="tabs">
   <div id="exTab2" class="container">  
            <ul class="nav nav-tabs">
                  <li class="active">
                    <a  href="#1" data-toggle="tab">Latest Ads</a>
                  </li>
                  <li><a href="#2" data-toggle="tab">Most Popular Ads</a>
                  </li>
                  
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="1">
                <?php 
                   $CI_latestads =& get_instance();  
                   $latestads = $CI_latestads->latestads();
                   $CI_userdata =& get_instance();  
               ?>
                <?php foreach($latestads as $latestads_data){ ?>
                <div class="row" style="padding-left: 70px;">
                
                 <div class="col-xs-11">
                 <a href="<?php echo site_url('description/'.$latestads_data->id); ?>" style="color: #4e4e4e;">
                    <div class="row adbg">
                           <div class="col-xs-2"></div>
                           <div class="col-xs-2">
                           <?php $CI_imagedata =& get_instance(); 
                                 $imagename = $CI_imagedata -> getimage($latestads_data->id); ?>
                              <img src="<?php echo site_url(); ?>uploads/<?php echo $imagename->name;  ?>" style="width: 100%;">

                           </div>
                           <div class="col-xs-6">
                              <h4><?php echo $latestads_data->title; ?></h4>
                              <p class="text-justify"><?php echo $latestads_data->description; ?></p>
                              <p><b>Price :</b> <?php echo $latestads_data->price;  ?>  <span class="addcat"><b>Posted By:</b><?php $username = $CI_userdata->userData($latestads_data->user_id); echo $username->name;  ?></span> <span class="addcat"><b>Time:</b> <?php echo time_stamp($latestads_data->createdon); ?></span></p>

                           </div>
                           <div class="col-xs-2"></div>
                           

                    </div>
                </div>
                </a>
               
                </div>
                
              <?php } ?>
              </div>
                <div class="tab-pane" id="2">
                <div class="row" style="padding-left: 70px;">
                  <div class="col-xs-11">
                       <?php 
                          $CI_mostpopularads =& get_instance(); 
                          $admdata = $CI_mostpopularads->mostpopularads();

                       ?>
                       <?php
                         foreach($admdata as $ad_mdata){
                       ?>
                    <a href="<?php echo site_url('description/'.$ad_mdata->id); ?>" style="color: #4e4e4e;">
                       <div class="row adbg">

                             <div class="col-xs-2"></div>
                             <div class="col-xs-2">
                                <?php $CI_imagedata =& get_instance(); 
                                 $imagename = $CI_imagedata -> getimage($ad_mdata->id); ?>
                              <img src="<?php echo site_url(); ?>uploads/<?php echo $imagename->name;  ?>" style="width: 100%;">

                             </div>
                             <div class="col-xs-6">
                                <h4><?php echo $ad_mdata->title; ?></h4>
                                <p><?php echo $ad_mdata->description; ?></p>
                                <p><b>Price :</b> <?php echo $ad_mdata->price; ?>  <span class="addcat"><b>Posted By:</b><?php $username = $CI_userdata->userData($ad_mdata->user_id); echo $username->name;  ?></span> <span class="addcat"><b>Time:</b><?php echo time_stamp($ad_mdata->createdon); ?></span></p>

                             </div>
                             <div class="col-xs-2"></div>
                     </div>
                     </div>
                  </div>    
                </div>
                </a>
                 <?php
                   }
                 ?>
                
            </div>
   </div>

   
  
</section>
<?php $this->load->view('includes/footer.php'); ?>
<!--###############Bootstrap Models start############-->


<!-- ########## Login ########## -->

<!-- ####### Login end ############ -->
<!--###############Bootstrap Models end##############-->
  
  <script src="<?php echo asset_url(); ?>slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function(){


     <?php for($i=1;$i <= count($category);$i++){ ?>

      <?php
         switch ($i) {
           case $i == 1:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#72A1D9";
             break;
           case $i == 2:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#D4849F";
             break;
           case $i == 3:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#A776B8";
             break;
           case $i == 4:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#DB3A2F";
             break;
           case $i == 5:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#FFD17C";
             break;
           case $i == 6:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#4CB38B";
             break;
           case $i == 7:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#435C70";
           break;
           case $i == 8:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#E1A107";
           break;
           case $i == 9:
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#D4849F";
           break;
           case $i == 10:
              
              $boxshadow = "10px 10px 5px #888888";
              $bgcolor = "#FFD17C";
           break;
           default:
               $boxshadow = "10px 10px 5px #888888";
               $bgcolor = "#A776B8";
           break;
           
           
         }
      ?>
        $(".category<?php echo $i; ?>").mouseover(function(){
            
            $(".category<?php echo $i; ?>").css("box-shadow", <?php echo  "'".$boxshadow."'"; ?>);
            $("#bgcolor<?php echo $i; ?>").css("background", <?php echo "'".$bgcolor."'"; ?>);
            $("#viewall<?php echo $i; ?>").css("color", "#FFF");


        });
        $(".category<?php echo $i; ?>").mouseout(function(){
            $(".category<?php echo $i; ?>").css("box-shadow", "0px 0px 0px #FFF");
            $("#bgcolor<?php echo $i; ?>").css("background", "#FFF");
            $("#viewall<?php echo $i; ?>").css("color", "#4E4E4E");
        });

    <?php } ?>

    });
  </script>


  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });
	  
  //     /*	  register*/
	 //   $("#register").click(function(){
		//   $("#signup").modal("show"); 
		 
	 //   });
	   
	 //   $("#signin").click(function(){

		//   $("#login_modal").modal("show"); 
	 //   });
	   
	 //   $("#register1").click(function(){
		    
		//     $("#signup").modal("show"); 
		// 	  $("#login_modal").modal("hide"); 
			
	 //   });
	   
	  
		// <?php
		//    if(validation_errors() != false)
		//    { 
		// 	   if($this->router->fetch_method() == "login_user")
		// 	   {
		// ?>
		//     		$("#login_modal").modal("show"); 
		           	   
		// <?php	   
		//        }
		//    }
		// ?>
		
		// <?php
  //       //echo validation_errors(); exit;
		//    if(validation_errors() != false)
		//    { 
  //         //echo "test"; exit;
		// 	   if($this->router->fetch_method() == "add_user")
		// 	   {
		// ?>
		//     		$("#signup").modal("show"); 
		           	   
		// <?php	   
		//        }
		//    }
		// ?>
	   
	 //   <?php
	 //      if($this->session->flashdata('loginerror_msg') != "")
		//   {
	 //   ?>
	 //          $("#login_modal").modal("show"); 
	 //   <?php
		//   }
	 //   ?>

  //    <?php
  //       if($this->session->flashdata('signupmsg') != ""){
  //    ?>
	 //         $("#signup").modal("show"); 
  //    <?php
  //     }
  //    ?>

  //    $("#country").change(function(){
  //             var country_id = $("#country").val();
  //                      //alert(country_id);
  //                      $.ajax({
  //                           type: "POST",
  //                           url: '<?php //echo site_url('country/getstate').'/'; ?>'+country_id,
  //                           //data: id='cat_id',
  //                           success: function(data){
  //                               //alert(data);
  //                             $('#state_id').html(data);
  //                       },
  //                      });

  //         });

  //         $("#state_id").change(function(){

  //                      var state_id = $("#state_id").val();
                       
  //                      $.ajax({
  //                           type: "POST",
  //                           url: '<?php //echo site_url('state/getcites').'/'; ?>'+state_id,
  //                           //data: id='cat_id',
  //                           success: function(data){
                                
  //                           $('#city_id').html(data);
  //                       },
  //                      });


  //         });
     
      
     
    });


    //$(document).ready(function(e){
          //$('.search-panel .dropdown-menu').find('a').click(function(e) {
          //e.preventDefault();
          //var param = $(this).attr("href").replace("#","");
          //var concept = $(this).text();
          //$('.search-panel span#search_concept').text(concept);
          //$('.input-group #search_param').val(param);
        //});

          
    //});
  </script>
</body>
</html>