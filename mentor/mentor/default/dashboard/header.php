<!DOCTYPE html>
<html lang="en" >
   <head>
      <title>Mentor - Dashboard</title>
      <meta charset="utf-8">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      
      <!--favicon-->
      <link rel="shortcut icon" type="image/x-icon" href="../asset/prelogin_new/img/favicon.ico">
      <link rel="icon" type="image/png" href="../asset/prelogin_new/img/favicon.ico">
      <link rel="apple-touch-icon" href="../asset/prelogin_new/img/favicon.ico">

      <!--CSS-->
      
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
      <link href="css/global-plugins.css" rel="stylesheet">
      <link href="css/all.css" rel="stylesheet" />
      <link href="css/theme.css" rel="stylesheet">
      <link href="css/style-responsive.css" rel="stylesheet"/>
      <link href="css/blue.css" rel="stylesheet">
      <link href="css/class-helpers.css" rel="stylesheet" />
      <link href="css/bootstrap-fileupload.css" rel="stylesheet" />
      <link href="css/owl.carousel.css" rel="stylesheet" />
      <link href="css/owl.transitions.css" rel="stylesheet" />
      <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
      <link href="css/alertify.core.css" rel="stylesheet" type="text/css" />
      <link href="css/alertify.default.css" rel="stylesheet" type="text/css" />
      <link href="css/lightslider.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link href="css/enjoyhint.css" rel="stylesheet" />
      <link href="css/my-styles.css?20190326" rel="stylesheet" /> 
      <link href="css/my-media.css?20190326" rel="stylesheet" /> 

</head>
<body id="blue-scheme" >
      
      <section id="container">
      <header class="header fixed-top clearfix">
         <!--logo start-->
         <div class="brand">
            <a href="index.php" class="logo">
            <img src="../images/home/mentor-big-bluec6eb.png?w=300" />
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
         <div class="top-nav">
            <ul class="nav navbar-nav navbar-right">
             
               <li class="dropdown for-admin" >
                  <a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span class="small-profile-icon">
                  <img id="header-image" src="../images/a6.png" />        
                  </span>
                  <span class="small-profile-title">Mit Patel<span class=" fa fa-angle-down" ></span></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu ">
                     <li> <a href="javascript:void(0);" class="font-size-11 color-grey pointer-none">User ID: 110892 </a></li>
                     <li><a href="javascript:void(0);"  data-toggle="modal" data-target="#modal-change-password" class="change-password-2"><i class="fa fa-lock" style=" width: 12px; float: left; margin-top: 3px; margin-right: 2px;"></i> Change Password</a></li>
                     <li><a href="#" class=""><i class="fa fa-sign-out" style=" width: 12px; float: left; margin-top: 3px; margin-right: 2px;"></i> Log Out</a></li>
                  </ul>
               </li>
           
            </ul>
         </div>
      </header>

<!-- chnage password -->
      <div class="modal" id="modal-change-password" tabindex="-1" role="dialog" aria-hidden="true" data-easein="zoomIn" data-easeout="zoomOut" >
         <div class="modal-dialog" style="max-width: 400px;">
            <div class="modal-content ">
               <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                  <h4 class="modal-title">Change Password</h4>
               </div>
               <div class="modal-body">
                  <form id="change-password">
                     <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" name="password" class="form-control" id="Password1" placeholder="Password">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
                     </div>
                     <button type="button" onclick="ga('send', 'event', 'Top Navigation', 'Change Password', '');" class="btn btn-primary btn-flat btn-change-password">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>