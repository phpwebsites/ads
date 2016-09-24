<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Newbiesoft Adds</title>
	<!--<link rel="stylesheet" type="text/css" href="<?php /*echo asset_url();*/ ?>css/bootstrap.min.css">-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/animations.css">
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/hover.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>slick/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>slick/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/jqzoomcss/bootstrap-magnify.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/fonts/glyphicons-halflings-regular.eot" >
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/fonts/glyphicons-halflings-regular.svg" >
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/fonts/glyphicons-halflings-regular.ttf" >
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/fonts/glyphicons-halflings-regular.woff" >
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/fonts/glyphicons-halflings-regular.woff2">
  <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo asset_url(); ?>js/bootstrap.js"></script> 
  <script type="text/javascript" src="<?php echo asset_url(); ?>js/jqzoom/bootstrap-magnify.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  
  
  
 
</head>

<body>

   <header id="header">
   		<div class="top-bar">
   			<div class="container">
   				<div class="row">
   				  <div class="col-xs-4">
					
					<a href="<?php echo base_url(); ?>"><img src="<?php echo asset_url(); ?>images/logo.png" alt="logo" width="135"></a>
					

   				  </div>
   				  <div class="col-sm-4">
   				    <div class="text-center push-text">
              <?php  if ($this->session->userdata('user_id')){ ?> 
         				    	<p> 
                        <a href="<?php echo base_url('postad'); ?>" class="btn btn-theme btn-sm btn-min-block"> Postan add </a>
                      </p>	
              <?php }else{ ?>
                     <p> 
                        <a href="javascript:void(0)" class="btn btn-theme btn-sm btn-min-block" onclick="alert('If you get the postanad before you should login or signup');"> Postan add </a>
                     </p>  
              <?php } ?>
   				    </div>
   				  	
   				  </div>
   				  <div class="col-xs-4">
   				   <div class="text-right push-text">
                        <?php  if ($this->session->userdata('user_id')){ ?>       
                        	 <ul class="list-unstyled user_data">
                            <li><a href="<?php echo base_url("user/logout"); ?>"  class="btn btn-theme">Log Out</a></li>
                               <li class="dropdown">
                                 <a href="Home/userProfile" class="btn btn-theme" id=""><?php echo $this->session->userdata('username'); ?></a> 
                               </li>
                             </ul>
                        <?php } else{ ?>        
                        		<p><a href="javascript:void(0)" class="btn btn-theme" id="signin">Sign In</a>  <a href="javascript:void(0)"  class="btn btn-theme" id="register">Sign Up</a></p>
                        <?php }  ?>
   				   		
   				   </div>
   				  	
   				  </div>
   					
   				</div>
   				
   			</div>
   		</div>
   		<!-- <nav class="navbar navbar-inverse nav-custom">
   			<div class="container">
					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>

					</div>
					<div class="collapse navbar-collapse navbar-right">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="about-us.html">About Us</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="portfolio.html">Portfolio</a></li>
								<li><a href="<?php //echo base_url('blog'); ?>">Blog</a></li>
								<li><a href="<?php //echo base_url('contactus'); ?>">Contact Us</a></li>
							</ul>
					</div>
          </div>
   		</nav> -->
      <div class="row">
        <div class="col-xs-12">
          
        </div>
      </div>
   	
   </header>