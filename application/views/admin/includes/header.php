<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin|Promotion Ads</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo asset_url(); ?>admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo asset_url(); ?>admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo asset_url(); ?>admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo asset_url(); ?>admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo asset_url(); ?>admin/css/custom.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Promot Ads</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url('admins'); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li> -->
                        <li>
                            <a href="<?php echo base_url("admin/updateform/".$this->session->userdata('user_id')); ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul> 
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if($this->uri->segment(1) == "administrator"){ echo "class='active'"; } ?>>
                        <a href="<?php echo base_url('administrator'); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo base_url('admins'); ?>" <?php if($this->uri->segment(1) == "admins"){ echo "class='active'"; } ?>>Admin</a>
                            </li>
                            <li <?php if($this->uri->segment(1) == "registerusers"){ echo "class='active'"; } ?>>
                                <a href="<?php echo base_url('admin/registerusers'); ?>">Registerd Users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('category/index'); ?>"><i class="fa fa-tags"></i> Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('subcategory/index'); ?>"><i class="fa fa-tags"></i> Sub Categories</a>
                    </li>
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#ads"><i class="fa fa-bullhorn"></i> Ads <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ads" class="collapse">
                            <li>
                                <a href="#">Admin Ads</a>
                            </li>
                            <li>
                                <a href="#">User Ads</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#demo1"><i class="fa fa-location-arrow"></i> Locations <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="<?php echo base_url('country/show'); ?>">Country</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('state/show'); ?>">States</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('city/show'); ?>">cities</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#content"><i class="fa fa-edit"></i> Content Pages <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="content" class="collapse">
                            <li>
                                <a href="<?php echo base_url('blog/show'); ?>">Blog</a>
                            </li>
                           

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home fa-fw"></i>Home Site</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
