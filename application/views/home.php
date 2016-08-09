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
                        <li> <a href=""><?php echo $subcategory_data->name; ?></a> <span>(1)</span></li>

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
<section id="thumbnail-slider">
     <div class="container">
             <section class="regular slider">
              <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
              <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
              <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
              <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
              <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
              <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
               <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
               <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
               <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
               <div>
                <img src="<?php echo asset_url(); ?>images/ads3.png">
              </div>
            </section>
      </div>

  
</section>
<section id="search">
 <div class="container">
      <div class="row">
           <div class="col-xs-8 col-xs-offset-2">
        <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="height: 50px;">
                      <span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Travel</a></li>
                      <li><a href="#its_equal">Jobs</a></li>
                      <li><a href="#greather_than">Education</a></li>
                      <li><a href="#less_than">Hospatels </a></li>
                      <li><a href="#all">Anything</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Search term..." style="height: 50px;">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" style="height: 50px;"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
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
                  <li><a href="#3" data-toggle="tab">Random Ads</a>
                  </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="1">
                  <div class="row adbg">
                         <div class="col-xs-1"></div>
                         <div class="col-xs-3">
                            <img src="<?php echo asset_url(); ?>images/ad1.jpg">

                         </div>
                         <div class="col-xs-7">
                            <h4>Lorumipsum Lorumipsum</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

                         </div>
                         <div class="col-xs-1"></div>
                         

                  </div>
                  <div class="row adbg">
                         <div class="col-xs-1"></div>
                         <div class="col-xs-3">
                            <img src="<?php echo asset_url(); ?>images/ad2.jpg">

                         </div>
                         <div class="col-xs-7">
                            <h4>Lorumipsum Lorumipsum</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

                         </div>
                         <div class="col-xs-1"></div>

                         

                  </div>
                 <div class="row adbg">
                       <div class="col-xs-1"></div>
                       <div class="col-xs-3">
                          <img src="<?php echo asset_url(); ?>images/ad1.jpg">

                       </div>
                       <div class="col-xs-7">
                          <h4>Lorumipsum Lorumipsum</h4>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                          <p><b>Price :</b> 14141414  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

                       </div>
                       <div class="col-xs-1"></div>
                 </div>
                      
                </div>
                <div class="tab-pane" id="2">
                       <div class="row adbg">
                             <div class="col-xs-1"></div>
                             <div class="col-xs-3">
                                <img src="<?php echo asset_url(); ?>images/ad1.jpg">

                             </div>
                             <div class="col-xs-7">
                                <h4>Lorumipsum Lorumipsum</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                <p><b>Price :</b> 222222  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

                             </div>
                             <div class="col-xs-1"></div>
                     </div>
                     <div class="row adbg">
                         <div class="col-xs-1"></div>
                         <div class="col-xs-3">
                            <img src="<?php echo asset_url(); ?>images/ad2.jpg">

                         </div>
                         <div class="col-xs-7">
                            <h4>Lorumipsum Lorumipsum</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <p><b>Price :</b> 201564  <span class="addcat"><b>Posted By:</b>lorumipsum</span> <span class="addcat"><b>Time:</b>1month ago</span></p>

                         </div>
                         <div class="col-xs-1"></div>

                         

                  </div>
                      
                </div>
                <div class="tab-pane" id="3">
                      
                </div>
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
              $bgcolor = " #E1A107";
           break;
           default:
               $boxshadow = "10px 10px 5px #888888";
               $bgcolor = "#72A1D9";
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