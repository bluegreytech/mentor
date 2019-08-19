<!DOCTYPE HTML>


<html lang="en" >
   <head>
      <title>Mentor - Dashboard</title>
      <meta charset="utf-8">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      
      <!--favicon-->
      <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php //echo base_url(); ?>default/asset/prelogin_new/img/favicon.ico"> -->
      <!-- <link rel="icon" type="image/png" href="<?php //echo base_url(); ?>default/asset/prelogin_new/img/favicon.ico"> -->
      <!-- <link rel="apple-touch-icon" href="<?php //echo base_url(); ?>default/asset/prelogin_new/img/favicon.ico"> -->

      <!--CSS-->
      
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
      <link href="<?php echo base_url(); ?>default_2/css/global-plugins.css" rel="stylesheet">
   <!--    <link href="<?php echo base_url(); ?>default_2/css/all.css" rel="stylesheet" /> -->
      <link href="<?php echo base_url(); ?>default_2/css/theme.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>default_2/css/style-responsive.css" rel="stylesheet"/>
      <!-- <link href="<?php echo base_url(); ?>default_2/css/blue.css" rel="stylesheet"> -->
      <!-- <link href="<?php echo base_url(); ?>default_2/css/class-helpers.css" rel="stylesheet" /> -->
    <!--   <link href="<?php echo base_url(); ?>default_2/css/bootstrap-fileupload.css" rel="stylesheet" /> -->
    <!--   <link href="<?php echo base_url(); ?>default_2/css/owl.carousel.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>default_2/css/owl.transitions.css" rel="stylesheet" /> -->
      <link href="<?php echo base_url(); ?>default_2/css/bootstrap-datepicker.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>default_2/css/alertify.core.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>default_2/css/alertify.default.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>default_2/css/lightslider.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>default_2/css/font-awesome.min.css">
      <link href="<?php echo base_url(); ?>default_2/css/enjoyhint.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>default_2/css/my-styles.css?20190326" rel="stylesheet" /> 
      <link href="<?php echo base_url(); ?>default_2/css/my-media.css?20190326" rel="stylesheet" /> 

</head>
<body id="blue-scheme" >
      
      <section id="container">
      <header class="header fixed-top clearfix">
         <!--logo start-->
         <div class="brand">
            <a href="<?php echo base_url(); ?>Home" class="logo">
            <img src="<?php echo base_url(); ?>default/images/home/mentor-big-bluec6eb.png?w=300" />
            </a>
            
            <div class="sidebar-toggle-box" style="display:none">
               <div class="fa fa-bars"></div>
            </div>
         </div>
         <!--logo end-->
         <!-- 
            *****************************
            ** Start of top navigation **
            *****************************
            -->
         <?php 
            if(check_user_authentication()){ 
         ?>

         <div class="top-nav">
            <ul class="nav navbar-nav navbar-right">
             
               <li class="dropdown for-admin" >
                  <a href="<?php echo base_url();?>Home/logout" class=""><i class="fa fa-power-off" style=" width: 12px; float: left;font-size: 22px;color:#bb342f;"></i></a>
               </li>
           
            </ul>
         </div>
         <?php 
            } 
         ?>
      </header>


