<html>
	<header>
		<title>ACODE CMS</title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/front/img/favicon.png" />

		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/tag_handler/css/jquery.taghandler.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/chosen2/chosen.css">

	</header>
	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
	      <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="<?php echo base_url()?>dashboard">ACODE CMS</a>
	        </div>

	        <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	          <ul class="nav navbar-nav">
	            <li class=""><a href="<?php echo base_url()?>dashboard"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
	            <li><a href="<?php echo base_url()?>posting"><span class="glyphicon glyphicon-edit"></span> Posting</a></li>
	            <li><a href="<?php echo base_url()?>listpost"><span class="glyphicon glyphicon-th-list"></span> List Post</a></li>
	            <li><a href="<?php echo base_url()?>kategori"><span class="glyphicon glyphicon-pushpin"></span> Category</a></li>
	            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span> Feature</a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>pagemanagement">Page</a></li>
                        <li><a href="<?php echo base_url()?>iklan">Iklan</a></li>
                        <li><a href="<?php echo base_url()?>tags">Tags</a></li>
                        <li><a href="<?php echo base_url()?>img_upload">Image Upload</a></li>
                      </ul>
                 </li>
	          </ul>
	         
	          <ul class="nav navbar-nav navbar-right">
       			 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-weight:bold; font-size:14px;"><?php echo $this->session->userdata('nama');?> <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>usermanagement">User Management</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url()?>panel/logout">Logout</a></li>
                      </ul>
                 </li>
      		  </ul>
	        </div><!-- /.navbar-collapse -->
	      </div>
	    </nav>
	    <!-- end Navigation -->