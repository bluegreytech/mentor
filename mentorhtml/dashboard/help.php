



<!DOCTYPE html>
<html lang="en" >
   <head>
      <meta charset="utf-8">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="LanceCoder">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" type="image/x-icon" href="https://cdn.mindler.com/prelogin_new/img/favicon.ico">
      <link rel="icon" type="image/png" href="https://cdn.mindler.com/prelogin_new/img/favicon.ico">
      <link rel="apple-touch-icon" href="https://cdn.mindler.com/prelogin_new/img/favicon.ico">
      <title>Mindler - Dashboard</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
      <link href="https://cdn.mindler.com/dashboard/css/global-plugins.css" rel="stylesheet">
      <link href="https://cdn.mindler.com/dashboard/vendors/jquery-icheck/skins/all.css" rel="stylesheet" />
      <link href="https://cdn.mindler.com/dashboard/css/theme.css" rel="stylesheet">
      <link href="https://cdn.mindler.com/dashboard/css/style-responsive.css" rel="stylesheet"/>
      <link href="https://cdn.mindler.com/dashboard/css/colors/blue.css" rel="stylesheet">
      <link href="https://cdn.mindler.com/dashboard/css/class-helpers.css" rel="stylesheet" />
      <link href="https://cdn.mindler.com/dashboard/vendors/bootstrap-fileupload/css/bootstrap-fileupload.css" rel="stylesheet" />
      <link href="https://cdn.mindler.com/dashboard/vendors/owl-carousel/owl.carousel.css" rel="stylesheet" />
      <link href="https://cdn.mindler.com/dashboard/vendors/owl-carousel/owl.transitions.css" rel="stylesheet" />
      <link href="https://cdn.mindler.com/dashboard/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
      <link href="https://cdn.mindler.com/prelogin_new/alertify/themes/alertify.core.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.mindler.com/prelogin_new/alertify/themes/alertify.default.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.mindler.com/dashboard/my-sets/css/lightslider.css" rel="stylesheet" />
            <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://cdn.mindler.com/dashboard/css/enjoyhint.css" rel="stylesheet" />
      <!-- <link href="https://cdn.mindler.com/dashboard/my-sets/css/my-styles.css?1562848746" rel="stylesheet" /> -->
      
         <link href="https://cdn.mindler.com/dashboard/my-sets/css/my-styles.css?20190326" rel="stylesheet" /> 
         <link href="https://cdn.mindler.com/dashboard/my-sets/css/my-media.css?20190326" rel="stylesheet" /> 

       
      <!-- <link href="https://cdn.mindler.com/dashboard/my-sets/css/my-media.css" rel="stylesheet" /> -->
               </head>
   <body id="blue-scheme" >
      <div class="mindler-loader"> 
         <span>
         <img src="https://mindlerdashboard.imgix.net/loader-1.png" class="outer">
         <img src="https://mindlerdashboard.imgix.net/loader-2.png" class="inner"><br>
         Loading...
         </span>
      </div>
      <section id="container">
      <header class="header fixed-top clearfix">
         <!--logo start-->
         <div class="brand">
            <a href="https://www.mindler.com/assess" onclick="ga('send', 'event', 'Top Navigation', 'Mindler Logo', 'Homepage');" class="logo">
            <img src="https://mindlerimages.imgix.net/home/mindler-big-blue.png?w=540" />
            </a>
            <a href="javascript:void(0);" id="btn-upgrade"  data-toggle="modal" data-target="#modal-upgrade" class="mobile-btn-upgrade">Upgrade</a>
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
               <li role="presentation" class="dropdown for-message">
                  <a href="javascript:void(0);" onclick="ga('send', 'event', 'Top Navigation', 'Mail', '');" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <span class="pe-7s-mail" style="font-size:22.9px;"></span>
                  <span class="badge bg-color label-danger"></span>
                  </a>
                  <ul id="menu freshdesk" class="dropdown-menu list-unstyled  massage-popup header-massage-popup" role="menu" style="min-height:82px">
                  </ul>
               </li>
               <li class="dropdown for-admin" >
                  <a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span class="small-profile-icon">
                  <img id="header-image" src="https://mindlerdashboard.imgix.net/a6.png?w=33&h=33&fit=crop&crop=faces" />                  </span>
                  <span class="small-profile-title">Mit Patel                  <span class=" fa fa-angle-down" ></span></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu ">
                     <li> <a href="javascript:void(0);" class="font-size-11 color-grey pointer-none">User ID: 110892 </a></li>
                     <li><a href="javascript:void(0);"  onclick="ga('send', 'event', 'User Setting', 'Change Password', '');" data-toggle="modal" data-target="#modal-change-password" class="change-password-2"><i class="fa fa-lock" style=" width: 12px; float: left; margin-top: 3px; margin-right: 2px;"></i> Change Password</a></li>
                     <li><a onclick="ga('send', 'event', 'User Setting', 'Log out', '');" href="https://www.mindler.com/login/logout" class=""><i class="fa fa-sign-out" style=" width: 12px; float: left; margin-top: 3px; margin-right: 2px;"></i> Log Out</a></li>
                  </ul>
               </li>
               <a href="javascript:void(0);"  onclick="ga('send', 'event', 'Top Navigation', 'Upgrade', '');" id="btn-upgrade"  data-toggle="modal" data-target="#modal-upgrade">Upgrade</a>
            </ul>
         </div>
      </header>
      <aside>
         <div id="sidebar" class="nav-collapse md-box-shadowed">
            <!-- sidebar menu start-->
            <div class="leftside-navigation leftside-navigation-scroll">
               <ul class="sidebar-menu" id="nav-accordion">
                  <li class="sidebar-profile" >
                     <div class="profile-main">
                        <div class="img-blue-box">
                           <p class="image">
                              <img id="sidebar-image" src="https://mindlerdashboard.imgix.net/a6.png?w=70&h=70&fit=crop&crop=faces" />                              <!-- <span class="status"><i class="fa fa-circle text-success"></i></span> -->
                           </p>
                        </div>
                        <p>
                           <span class="name">Mit Patel</span>
                        </p>
                        <p class="mobile-user-id" style="color: #888;font-size: 10px;margin-top: 3px;">User ID: 110892</span></p>
                     </div>
                  </li>

                  <li id="tour1"><a onclick="ga('send', 'event', 'Side Navigation', 'Dashboard', '');" href="https://www.mindler.com/assess" ><span class="icon-home2 fa fa-home"></span><span class="nav-title">Dashboard</span></a></li>
                  <li id="tour2"><a onclick="ga('send', 'event', 'Side Navigation', 'My Profile', '');" href="https://www.mindler.com/assess/viewprofile" ><span class="icon-home2 fa fa-user"></span><span class="nav-title">My Profile</span></a></li>
                  <li id="tour3"><a onclick="ga('send', 'event', 'Side Navigation', 'My Test', '');" href="https://www.mindler.com/assess/mytest" ><span class="icon-home2 fa fa-list"></span><span class="nav-title">My Tests</span></a></li>
                  <li id="tour4"><a onclick="ga('send', 'event', 'Side Navigation', 'My Matches', '');" href="https://www.mindler.com/assess/target" ><span class="icon-home2 fa fa-bar-chart"></span><span class="nav-title">My Matches</span></a></li>
                  <li id="tour5"><a onclick="ga('send', 'event', 'Side Navigation', 'My Report', '');" href="https://www.mindler.com/assess/myreport" ><span class="icon-home2 fa fa-file-text"></span><span class="nav-title">My Report</span></a></li>
                                                     <li id="tour6"><a onclick="ga('send', 'event', 'Side Navigation', 'My Activities', '');" href="https://www.mindler.com/assess/generics" ><span class="icon-home2 fa fa-tachometer"></span><span class="nav-title">My Activities</span></a></li>
                  <li id="tour7"><a onclick="ga('send', 'event', 'Side Navigation', 'My Sessions', '');" href="https://www.mindler.com/assess/testslot" ><span class="icon-home2 fa fa-comments"></span><span class="nav-title">My Sessions</span></a></li>
                  <li id="tour8"><a onclick="ga('send', 'event', 'Side Navigation', 'My Action Plan', '');" href="https://www.mindler.com/assess/myplan" ><span class="icon-home2 fa  fa-briefcase"></span><span class="nav-title">My Action Plan</span></a></li>
                  <li><a onclick="ga('send', 'event', 'Side Navigation', 'Refer Friends', '');" href="https://www.mindler.com/assess/refer" ><span class="icon-home2 fa  fa-user-plus"></span><span class="nav-title">Refer Friends </span> <span class="label label-danger" style="    padding: 3px 5px;
                     float: right;
                     margin-right: 10px;">New</span></a></li>
                  
                  <li><a onclick="ga('send', 'event', 'Side Navigation', 'Help', '');" href="https://www.mindler.com/assess/help" class="active"><span class="icon-home2 fa fa-headphones "></span><span class="nav-title">Help </span></a></li>
                  <li class="mobile-menu-link change-password" style="border-top:1px #e9e9e9 solid"><a href="javascript:void(0);"  data-toggle="modal" data-target="#modal-change-password" style="padding: 7px 20px;color: #888;"><span class="icon-home2 fa fa-lock "></span> <span class="nav-title font-size-12">Change Password</span></a></li>
                  <li  class="mobile-menu-link"><a href="https://www.mindler.com/login/logout" style="padding: 7px 20px;;color: #888;"><span class="icon-home2 fa fa-sign-out"></span><span class="nav-title font-size-12">Log Out</span></a></li>
                                 </ul>
            </div>
            <!-- sidebar menu end-->
         </div>
      </aside>
      <!-- pricing modal -->
      <div class="window-block"></div>
      <div class="modal" id="modal-upgrade" tabindex="-1" role="dialog" aria-hidden="true" data-easein="zoomIn" data-easeout="zoomOut" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content text-center">
               <div class="modal-header" >
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                  <h4 class="modal-title">
                     Choose a program that’s right for you.
                     <p>Instant activation. Upgrade anytime.</p>
                  </h4>
               </div>
                              <div class="modal-body modal-8-9 price-increase" >
                  <div class="scroll-box">
                     <div class="row">
                                                <div class="col-md-4 my-col for-preview">
                           <div class="upgrade-levels-box">
                              <span class="tag">Free</span>
                              <h2>Preview<span>Class 8-9</span></h2>
                              <p class="font-size-14">Orientation Style Assessment</p>
                              <div class="gray-line"></div>
                              <div class="rate-tag color-gray">
                                 <!-- <i class="fa fa-inr"></i>0/- -->
                              <i class="fa fa-inr"></i>0/-                              </div>
                              <div class="fixed-area" >
                                 <ul class="default">
                                    <li>Orientation Style Assessment</li>
                                    <li>Detailed Information on Hundreds of Careers</li>
                                 </ul>
                              </div>
                              <a style="padding: 16px 10px;" href="javascript:void(0);" class="btn btn-primary btn-block btn-upgrade "  > <span class="ycp"> <span class="pe-7s-check"></span>Your Current Program</span> </a>                           </div>
                        </div>
                        <div class="col-md-4 my-col for-learn">
                           <div class="upgrade-levels-box">
                              <span class="tag">Most Popular</span>
                              <h2>Learn<span>Class 8-9</span></h2>
                              <p class="font-size-14">Stream Assessment</p>
                              <div class="gray-line"></div>
                                                            <div class="rate-tag  "><i class="fa fa-inr" aria-hidden="true"></i>2,400/-</div>
                              <!-- <div class="offer-freedom">
                                 <div class="offer-save">Save ₹0</div>
                                 <div class="offer-title">No coupon code required</div>
                                 <div class="offer-timer"><i class="fa fa-clock-o"></i> <span id="price-timer"></span></div>
                                 </div> -->
                              <div class="fixed-area">
                                 <ul class="default">
                                    <p style="font-weight:600; text-align:left; margin-bottom:5px">Everything in Preview Plus...</p>
                                    <li>Subject Interest Assessment</li>
                                    <li>Personality Traits Assessment</li>
                                    <li>Aptitude Assessment</li>
                                    <li>Top 2 Stream Recommendations</li>
                                    <li>25-Page Stream Assessment Report</li>
                                    <li>Online Query Support from Experts</li>
                                 </ul>
                              </div>
                                                                                                  <a style="padding: 16px 10px;" href="https://www.mindler.com/login/onboarding/1/1/1" onclick="ga('send', 'event', 'Upgrade Modal', 'Upgrade Now', 'Stream:Learn')" class="btn btn-primary btn-block btn-upgrade active">Upgrade Now</a>
                                                            </div>
                        </div>
                        <div class="col-md-4 my-col for-explore last-child">
                           <div class="upgrade-levels-box inc">
                              <h2>Explore<span>Class 8-9</span></h2>
                              <p class="font-size-14">Stream Assessment + Counselling </p>
                              <div class="gray-line"></div>
                                                            <div class="rate-tag ">
                                 <!-- <i class="fa fa-inr"></i>9400/- -->
                                    <i class="fa fa-inr" aria-hidden="true"></i>9,400/-

                                    <p class="increase-label">Last chance to buy at </p>
<p class="increase-label sec">Price increasing from tomorrow.</p>
                                 </div>
                              <div class="offer-freedom">
                                 <div class="offer-save">Save ₹0</div>
                                 <!-- <div class="offer-title">Coupon code: <span class="coupon-code">FREEDOM</span></div> -->
                                 <div class="offer-title">No coupon code required</div>
                                 <div class="offer-timer"><i class="fa fa-clock-o"></i> <span id="price-timer"></span></div>
                              </div>
                              <div class="fixed-area" >
                                 <ul class="default">
                                    <p style="font-weight:600; text-align:left; margin-bottom:5px">Everything in Learn Plus...</p>
                                    <li>3 Face-to-Face Counselling Sessions</li>
                                    <li>Online Query Support from Experts</li>
                                    <li>Interactive Stream Activities</li>
                                    <li>Stream & Subject Selection</li>
                                    <li>Career Path Planning for Shortlisted Streams</li>
                                    <li>Stream Combination e-Guides</li>
                                 </ul>
                              </div>
                                                                                          <a style="padding: 16px 10px;" onclick="ga('send', 'event', 'Upgrade Modal', 'Upgrade Now', 'Stream:Explore');" href="https://www.mindler.com/login/onboarding/1/2/1" class="btn btn-primary btn-block btn-upgrade active">Upgrade Now</a>';
                              
                                    
                                    

                                    
                                 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 upgrade-contact-box my-col">
                        <div class="upgrade-contact">
                           <div class="auto-box">
                              <a href="tel:+918744987449">
                                 <img src="https://mindlerimages.imgix.net/home/upgrade-call.png">
                                 <div class="first">Need help with shortlisting the right program?</div>
                                 <div class="second">Call us at +91 87449 87449 <span>(Mon-Fri, 10am - 7pm)</span></div>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                           </div>
         </div>
      </div>
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
      <div class="modal pointer-none" id="career-match-ranking" tabindex="-1" role="dialog" aria-hidden="true" data-easein="zoomIn" data-easeout="zoomOut" >
         <div class="modal-dialog pointer-active" style="max-width: 400px;">
            <div class="modal-content ">
               <div class="">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style=" position: absolute;right: 10px;top: 10px;z-index: 999;"><i class="fa fa-times"></i></button>
               </div>
               <div class="modal-body text-center">
                  <p class="margin-top-20 font-size-14 font-600">Your preferred ranking is same as the default order.</p>
                  <p>Are you sure you want to submit?</p>
                  <div class="margin-top-20">
                     <button type="button" class="btn btn-primary btn-primary-ghost btn-xs font-size-13" data-dismiss="modal" >Cancel</button>
                     <button type="button" class="btn btn-primary btn-xs font-size-13" id="Button5">Submit</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal pointer-none" id="motivators-ranking" tabindex="-1" role="dialog" aria-hidden="true" data-easein="zoomIn" data-easeout="zoomOut" >
         <div class="modal-dialog pointer-active" style="max-width: 400px;">
            <div class="modal-content ">
               <div class="">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style=" position: absolute;right: 10px;top: 10px;z-index: 999;"><i class="fa fa-times"></i></button>
               </div>
               <div class="modal-body text-center">
                  <p class="margin-top-20 font-size-14 font-600">Your preferred ranking is same as the default order.</p>
                  <p>Are you sure you want to submit?</p>
                  <div class="margin-top-20">
                     <button type="button" class="btn btn-primary btn-primary-ghost btn-xs font-size-13" data-dismiss="modal" >Cancel</button>
                     <button type="button" class="btn btn-primary btn-xs font-size-13" id="mtvtrs">Submit</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="modal" id="faq-modal" tabindex="-1" role="dialog" aria-hidden="true" data-easein="zoomIn" data-easeout="zoomOut" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content ">
               <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                  <h4 class="modal-title text-center">Frequently Asked Questions</h4>
               </div>
               <div class="modal-body" style="padding: 25px;font-size: 13px;">
                  <p style="margin-bottom: 20px;">
                     <strong style="display: block;margin-bottom: 5px; font-size:14px">1. Why do you need my academic scores?</strong>
                     Your academic scores are important for the counsellor to get a holistic picture about your profile and performance. 
                  </p>
                  <p style="margin-bottom: 20px;">
                     <strong style="display: block;margin-bottom: 5px; font-size:14px">
                     2. My academic year has just started. What do I write in the current and
                     last year scores?
                     </strong>
                                          In the current year section, you should write the scores for the year you just passed. For e.g., if you have just entered class 9th, then write the scores for your class 8th.
                     In the last year section, you need to write scores for the year previous to the one you just passed. For e.g., if you have just entered class 9th, then write the scores for class 7th.
                                       </p>
                  <p style="margin-bottom: 20px;">
                     <strong style="display: block;margin-bottom: 5px; font-size:14px">
                     3. I am in the middle of the academic year and have not had my final examinations yet. Which scores do I enter?
                     </strong>
                     If you are in the middle of the academic year, enter the aggregate scores of all
                     the examinations you have had in this year (unit tests, half yearlys, etc.). If these
                     scores are not readily available, you can enter the scores of the last exam you had
                     this year.
                  </p>
                  <p style="margin-bottom: 20px;">
                     <strong style="display: block;margin-bottom: 5px; font-size:14px">
                     4. My final examinations have just ended, but I have not received my
                     results yet, what do I enter in the current year section?
                     </strong>
                     You can enter the average scores of all other examinations held in the current
                     year instead.
                  </p>
                  <p style="margin-bottom:0px;">
                     <strong style="display: block;margin-bottom: 5px; font-size:14px">5. Which type of scores do I need to enter? Percentage, CGPA or grades?</strong>
                     The field accepts all types of scores. Enter the specific kind provided by your
                     school, and keep it consistent across all fields. Grades for IB students are also
                     accepted.
                  </p>
               </div>
            </div>
         </div>
      </div>
      </div>
      <div class="modal pointer-none" id="os-video-modal" tabindex="-1" role="dialog" aria-hidden="true" data-easein="zoomIn" data-easeout="zoomOut" >
         <div class="modal-dialog pointer-active" style="width:100%;max-width: 700px;">
            <div class="modal-content ">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style=" position: absolute;right: 10px;top: 10px;z-index: 999;"><i class="fa fa-times"></i></button>
                  <h4 class="modal-title"> How Mindler helps with career selection and planning</h4>
               </div>
               <div class="modal-body text-center">
                  <iframe class="embed-responsive-item" src=""  allow="autoplay; encrypted-media" ></iframe>
               </div>
            </div>
         </div>
      </div><section id="main-content" class="faq-page">
            <section class="wrapper">
              <div class="row">
                <div class="col-md-3 col-md-push-9">
                  <div class="c_title">
                    <h2>Get In Touch</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="c_panel panel-blank">

                    <div class="c_content">

<div class="more-ques ">
<p style="font-weight:600;margin-bottom: 15px;font-size: 14px;">Have any questions?</p>
<p style="font-weight: 400;margin-bottom: 15px;">
Speak to a Mindler Career Expert today!
</p>
  <p style="text-align: center;"><a href="tel:+91 87449 87449 " onclick="ga('send', 'event', 'Help', 'Call', '');" class="help-page-call btn btn-primary btn-md" style="font-size: 15px">

  <i class="fa fa-phone fa-2x" style="font-size: 14px;margin-right: 5px;"></i><span>+91 87449 87449 </span>

</a>
  </p>
<p style="margin-bottom:0;color: #888;font-size: 12px;float: left;width: 100%;text-align: center;">Mon-Fri, 10 am - 6:30 pm </p>

                      </div>






                    </div>
                  </div>

                </div>
              <div class="col-md-9 col-md-pull-3">
                <div class="c_title">
                  <h2>Frequently Asked Questions</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="c_panel panel-blank">

                  <div class="c_content">
                  
                      
                        <div class="new-faq-sec">
                          <ul>
                            <li>
                              <a href="#" class="title">How will the assessment help me?</a>
                                                            <div class="details">The assessment is designed to understand your strengths, abilities and weaknesses. It gives you a detailed understanding of your best-fit subject combinations, making it easier for you to choose the right stream for yourself.</div>
                                                            

                              
                            </li>
                            <li>
                              <a href="#" class="title">How is Mindler different from other career assessment platforms?</a>
                              <div class="details">
                      

                                  Mindler has conducted the world’s largest research on a wide range of modern career paths. Our assessment is one with comprehensive data (collected from over 10,000 students across the country), exhaustive analyses, and high reliability. Our assessment puts to application the principles of psychology, psychometrics, machine-learning, and artificial intelligence, making it the best and most accurate career assessment. Developed by some of the best brains in the world, the assessment is highly standardised and validated for the Indian context. <a href="https://www.mindler.com/top-career-guidance-platforms-in-india" onclick="ga('send', 'event', 'Help', 'FAQ', 'Competition Comparison');" target="_blank">Feel free to refer the competitive landscape for more details. </a>

                               
                              </div>
                            </li>
                            <li>
                              <a href="#" class="title">I am done with the orientation style test. What do I do next?</a>
                         

                                                            <div class="details">Congrats! You have already taken your first step in choosing the right stream for yourself. While the orientation style test has given you insights regarding what drives you at the workplace, there are other parts needed to complete the whole picture. Our stream assessment, comprising of critical elements like aptitude, interest, and personality, will do that for you, give you your 2 best-fit stream matches, and give you a detailed report on the same. All you need to do is upgrade your account, and complete the assessment. </div>
                                                          </li>
                            <li>
                              <a href="#" class="title">How do I upgrade my account?</a>
                              <div class="details">You simply need to click the upgrade button on the top right in your dashboard. Once you have selected the program you wish to move on to and purchased the same, your account will be upgraded.</div>
                            </li>
                            <li>
                              <a href="#" class="title">What is the difference between stream choice assessment and career choice assessment?</a>
                              <div class="details">The stream choice assessment is suitable for students of class 8 & 9, who wish to select a stream after their class 10 exams. The career choice assessment, on the other hand, enables students of Class 10, 11, & 12, and college students, figure out their best-fit career matches, based on an accurate analysis of their style, interest, personality, aptitude, and emotional intelligence.</div>
                              
                              
                              
                            </li>
                            <li>
                              <a href="#" class="title">What all is included in the Learn program?</a>
                                                            <div class="details">
                         

                                <p>                  Learn program, is our assessment-only program, where you get access to our comprehensive stream assessment. Following features are also included in the learn program:</p><ul class="details-ul">
                                  <li>In-depth expert analysis of your profile on 50 evaluation parameters</li>
                               <li>2 best-fit stream matches</li>
                               <li>Detailed 25 page career discovery report with developmental plans for areas you need to improve on</li>
                                <li>Access to our well-researched career library with detailed information on hundreds of career options, including courses, colleges, and opportunities</li>
                               <li>30 minute post-assessment call to help you understand your report and results</li>
                                <li>1 month online support for all career-related queries</li>
                
                                </ul>
                              </div>
                                                            
                            </li>
                            <li>
                              <a href="#" class="title">What all is included in the Explore program?</a>
                                                            <div class="details">
                                <p>
                                  Our Explore program includes expert guidance through one-on-one sessions and comprehensive assessment to choose your perfect stream, and subject combinations.
                                </p>
                            
                                
                                <ul class="details-ul">
                                <li> 4-dimensional comprehensive stream assessment</li>
                                <li>3 personalised counselling sessions</li>
                                <li>Top 2 stream recommendations & stream report</li>
                                <li>Stream & subject selection</li>
                                <li>1 year online support for all career-related queries</li>
                              </ul>
                              </div>

                                                          </li>
                            <li>
                              <a href="#" class="title">
                                                                What will be there in the stream discovery report?

                                
                              </a>
                                                            <div class="details">
<p>The 25 page long stream discovery report gives you insights into who you are, your likes & dislikes, and skills & abilities, thus facilitating stream choice and development. It includes: </p>
                                <ul class="details-ul">
                                  <li> Your 2 best-fit stream matches </li>
                                      <li>Your degree of strength on 50 important parameters important for making right career decisions</li>
                                      <li>Developmental plans, detailing steps and tips to improve in the areas you lack </li>
                                    </ul>
                              </div>
                            
                                                          </li>


                            
                            
                            
                            
                            
                            
                            
                            <li>
                              <a href="#" class="title">Can I take a look at the sample report?</a>
                              <div class="details">
                                Yes, of course. 
                                                              </div>
                            </li>
                            <li>
                              <a href="#" class="title">Can I buy just ‘Learn’ now and upgrade to ‘Explore’ later?</a>
                             
                              
                            

                                                            <div class="details">Yes, sure. If you’ve bought the Learn product (stream assessment), and later wish to get detailed guidance from our career coaches, you always have the option to upgrade to the Explore program, by paying the remaining difference.</div>
                              
                            </li>
                            <li>
                              <a href="#" class="title">Do I need to take the test in a single sitting?</a>
                              <div class="details">
                                The test has been divided into sections, which autosave once you complete each sub-test. Thus, you may complete the entire assessment at one go, or complete it sectionally, whichever way you're comfortable with. However, please make sure you complete a section once you start it.
                               
                              </div>
                              
                            </li>
                            <li>
                              <a href="#" class="title">Is the test timed?</a>
                              <div class="details">
                                
                                Only the aptitude section of the test is timed. You can complete the rest of the sections at your own pace.
                              </div>
                            </li>
                            <li>
                              <a href="#" class="title">My internet went off during the assessment. What do I do?</a>
                              <div class="details">
                                Don't worry! The assessment auto saves at each point, and you can resume from where you left off. In case you were attempting any of the tests in aptitude sections when you encountered the issue, just get in touch with us over livechat or drop us a mail at <a href="mailto:hello@mindler.com?Subject=Hello%20again">hello@mindler.com</a>, and we’ll quickly reset the section your were attempting.
                               
                               
                              </div>
                            </li>
                            <li>
                                                            <a href="#" class="title">I have got my 2 best-fit stream matches. How do I interpret them?</a>
                            

                              <div class="details">Kudos on completing the assessment! A detailed description about your best-fit stream matches have been mentioned in your easy-to-read stream discovery report. You can additionally schedule a 30 minute call with one of our career experts, right from your dashboard, and they will discuss your report with you, and take you through the details of your matches.</div>
                                                          </li>
                            <li>
                             
                              
                                                            <a href="#" class="title">I am interested to pursue a particular subject, but it is not there in my top stream matches. Why is that?</a>
                              <div class="details">The assessment takes many parameters into consideration. Interest is just one of them. If a subject that you’re interested in hasn’t shown up on your best-fit stream matches, it’s likely that there’s a mismatch between your interest and personality; or your aptitude does not meet the required levels to pursue that subject.</div>
                                                          </li>
                            <li>
                              <a href="#" class="title">But I am interested in it. What do I do?</a>
                             
                                                            <div class="details">
                                If you're still interested to explore a particular subject, no worries. Our counsellors would be more than happy to discuss this in your one-on-one sessions. They will look at your fit with the said subject with a holistic point of view, and recommend the best course of action.

                              </div>
                                                          </li>
                            <li>
                              <a href="#" class="title">Tell me more about your career experts/counsellors.</a>
                              <div class="details">
                               
                                Our team of career counsellors and domain experts are specialists from premier institutions such as Harvard University, ISB, IIT, Delhi University and include country’s leading psychologists with 15+ years of experience in the field.

                              </div>
                            </li>
                            <li>
                              <a href="#" class="title">How do you conduct counselling sessions?</a>
                              <div class="details">
                                The counselling takes place through one-on-one sessions with Mindler career experts. The sessions can happen in person, online, or telephonically, as per your convenience.

                              </div>
                            </li>
                            <li>
                              <a href="#" class="title">How do I schedule a session?</a>
                              <div class="details">To schedule a session, you need to first complete your activities. Once you’re done with them, you can schedule a session by selecting a suitable date, time, and venue. The counsellor will then confirm the same, depending upon their availability.</div>
                            </li>
                            <li>
                              <a href="#" class="title">Who will take my sessions?</a>
                              <div class="details">Your sessions will be taken by India’s top career coaches, including domain experts from Harvard, ISB, IIT, and country’s leading psychologists.
                              
                              </div>
                            </li>
                          </ul>
                        </div>
                    

                 
                  </div>
                </div>

              </div>


              

              </div>
            </section>
         </section><!-- upgrade modal for stream free user -->
<!-- end of upgrade modal for stream free user -->
<!-- upgrade modal for stream learn user -->
<!-- end of upgrade modal for learn user -->
<!-- upgrade modal for career free user -->
<!-- end of upgrade modal for career free user -->
<!-- upgrade modal for career learn user -->
<!-- end of upgrade modal for learn user -->
<!-- csrf code -->
<input type="hidden" id="csrf_mindler_token" name="ci_csrf_token" value="" />
<!-- end of csrf code -->
</section>
<!-- test page code -->


<script src="https://cdn.mindler.com/dashboard/js/jquery.js"></script>

<script src="https://cdn.mindler.com/dashboard/js/global-plugins.js"></script>
<script src="https://cdn.mindler.com/dashboard/js/theme.js" type="text/javascript" ></script>
<script src="https://cdn.mindler.com/dashboard/js/forms.js" type="text/javascript" ></script>
<script src="https://cdn.mindler.com/dashboard/vendors/chartjs/chart.min.js" type="text/javascript" ></script>
<script src="https://cdn.mindler.com/dashboard/vendors/summernote/summernote.min.js" type="text/javascript" ></script>

<script src="https://cdn.mindler.com/dashboard/js/ecommerce.js" type="text/javascript" ></script>
<script src="https://cdn.mindler.com/dashboard/my-sets/js/lightslider.js"></script>

<script src="https://www.mindler.com/assets/dashboard/my-sets/js/my-function.js?1562848746"></script>

<script src="https://cdn.mindler.com/dashboard/js/moment.js"></script>
<script src="https://www.mindler.com/assets/dashboard/js/custom-new.js?1562848746"></script>
<script src="https://cdn.mindler.com/all-css/my-sets/js/alertify.min.js" type="text/javascript" ></script>
<script src="https://cdn.mindler.com/dashboard/js/enjoyhint.js"></script>
<script src="https://cdn.mindler.com/dashboard/my-sets/js/jquery-touch.js">
  
</script>
<script>
   // Set the date we're counting down to
   var countDownDate = new Date("2019-06-30T24:00:00").getTime();
   // Update the count down every 1 second
   
   var x = setInterval(function() {

       // Get todays date and time
       var now = new Date().getTime();
       
       // Find the distance between now and the count down date
       var distance = countDownDate - now;
       
       // Time calculations for days, hours, minutes and seconds
       var days = Math.floor(distance / (1000 * 60 * 60 * 24));
       var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
       var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
       var seconds = Math.floor((distance % (1000 * 60)) / 1000);
       
       // Output the result in an element with id="demo"
      

      $("#modal-upgrade").find("span#price-timer").each(function(element){

        // $(this).text(days + "days " + hours + ":" + minutes + ":" + seconds + " left");

      });
       
       // If the count down is over, write some text 
       if (distance < 0) {
           clearInterval(x);
          // document.getElementById("price-timer").innerHTML = "EXPIRED";
       }
   }, 1000);
</script>




<SCRIPT language=Javascript>
$(document).ready(function() {

 

   $('input').bind('change keydown keyup',function (){
    
     if($(this).val()){

          var name = $(this).attr("name");

           $(this).next(".form_error").remove(); // remove it
           $(this).next(".validation").remove(); // remove it
           $(".validation").remove(); // remove it
           $(".validation-mobile").remove(); // remove it
           $(".error").remove(); // remove it

            $("input[name="+name+"]").css('border-color', '#e9e9e9');
       }
     });
      
      $(document).on('ifClicked','#radioRequired input[type="radio"]', function () {  
         
           $(this).next(".form_error").remove(); // remove it
           $(this).next(".validation").remove(); // remove it
           $(".validation").remove(); // remove it
           $(".validation-mobile").remove(); // remove it
           $(".error").remove(); // remove it
         
     });

     $("textarea").keydown(function(){ 
          if($(this).val()){
              $(this).next(".validation").remove(); // remove it
              $(".validation").remove(); // remove it
              $(".validation-mobile").remove(); // remove it
              $(".error").remove(); // remove it
          }
     });
   
     $("#nature-query").change(function(){
          $(".validation").remove(); // remove it
          $(".validation-mobile").remove(); // remove it
     });

     $(".note-editable").keydown(function(){ 
         
           $(this).next(".validation").remove(); // remove it
           $(".validation").remove(); // remove it
           $(".validation-mobile").remove(); // remove it
           $(".error").remove(); // remove it
       
     });
});
     


</SCRIPT>
<!-- dashboard2 code  -->
<!-- End of dashboard2 code -->


<script type="text/javascript">
   $(document).ready(function(){
   
    
       $(".my-test-page .my-tab-function ul.tab-ul li:first-child").click();
        });
</script>
<!-- display modal for free user -->
<script type="text/javascript">
   $(document).ready(function(){
      $("#modal-upgrade-second-free").modal('show');
                  //$("#modal-upgrade-second-free").modal('hide');
         });
</script>
<!-- end of display modaal for free user -->
<!-- freshdesk message -->
<!-- end of fresh desk -->


<!-- intercom chat -->
<!-- <script>
    window.intercomSettings = {
    app_id: "veltm8u5",
    name: "Mit Patel ",
    email: "mitnp17@gmail.com"
  };
  </script>
<script>
(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/veltm8u5';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script> -->

<!-- end of intercom chat -->



<script>
       
      $(function () {
          var availableTags = [];
          $("#dashboard-career").autocomplete({
             source: availableTags
          });
      });
   
</script>
<script type="text/javascript">
   $(".compose-mail #send-data").click(function(){
       var message = $('.note-editable')[0].innerText;
       var message1 = $('.summernote').code();
       var mystr = $.trim(message);
       //console.log(mystr.length); return false;
       var subject = $('#mail-subject').val();
       if(subject.length==0){
           $("#mail-subject").css("border-color", "#e00d1a");
           $("#mail-subject").next(".error").remove(); // remove it
           $("#mail-subject").after('<label class="error" for="datepicker">Please enter a subject.</label>');
           $("#mail-subject").focus();
           return false;
       }
       else if(mystr.length==0){
           $("#mail-subject").css("border-color", "#a9a9a9");
           $(".note-editor").css("border-color", "#e00d1a");
           $("#mail-subject").next(".error").remove(); // remove it
           $(".note-editor").next(".error").remove();
           $(".note-editor").after('<label class="error" >Please enter a message.</label>');
           $(".note-editable panel-body").focus();
           setTimeout(function() { $(".compose-mail .email-create .error").hide(); $(".note-editor").css("border-color", "#a9a9a9"); }, 1500);
           return false;
       }
       else{
           $("#blue-scheme .mindler-loader").css("display", "flex");
           $(".note-editor").css("border-color", "#a9a9a9");
           $.ajax(
            {
                url: "https://www.mindler.com/assess/composeTicket",
                type : 'POST',
                data:{'ci_csrf_token' : '',subject:subject,message:message1},
                cache : false,
                success: function(response) {
                     $("#blue-scheme .mindler-loader").css("display", "none");
                     if(response){
                        $(".compose-message-btn").click();
                        var hreflink = "https://www.mindler.com/assess/mymessages/"+response;
                        $(".btn-change-message").attr('href',hreflink);
                        /*alertify.confirm('Your message has been successfully sent. One of our career experts will respond to your query shortly.', function(){ 
                           window.location.href = "https://www.mindler.com/assess/mymessages/"+response;
                        });*/
                     }
                },
                error: function(jqXHR, tranStatus) {
                  $('#result').text('Error');
                  $('#code').text(jqXHR.status);
                  x_request_id = jqXHR.getResponseHeader('X-Request-Id');
                  response_text = jqXHR.responseText;
                 
                }
           });
       }
   }); 
   
    $("#dashboard-career").autocomplete({
         open: function(event, ui) {
             $('#dashboard-career').off('menufocus hover mouseover mouseenter');
         }
     });
   
    $(document).ready(function(){
   
         $('.summernote').summernote({
           height: 150,
           toolbar: [
             // [groupName, [list of button]]
             ['style', ['bold', 'italic', 'underline', 'clear']],
             ['font', ['strikethrough', 'superscript', 'subscript']],
             ['fontsize', ['fontsize']],
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']],
             ['height', ['height']]
           ],
           focus: true
         });

         
   
       /* freshdesk notificatio header*/
         /*$(".navbar-right .info-number").click(function() {
               var chkClass =  $(".navbar-right li").hasClass('open');
               if(chkClass==false){
                  var yourdomain = 'mindlerhelp'; // Your freshdesk domain name. Ex., yourcompany
                  var api_key = 'BNBmXy3q0ebhNGIh2GT'; // Ref: https://support.freshdesk.com/support/solutions/articles/215517-how-to-find-your-api-key
                  var email = "mitnp17@gmail.com";
                  $(".navbar-right .list-unstyled").empty();
                  $(".navbar-right .list-unstyled").append('<li class="text-left bnt-row">Loading...</li>');
                  $.ajax(
                    {
                      url: "https://"+yourdomain+".freshdesk.com/api/v2/tickets?email="+email+"&filter=new_and_my_open",
                      type: 'GET',
                      contentType: "application/json; charset=utf-8",
                      dataType: "json",
                      headers: {
                        "Authorization": "Basic " + btoa(api_key + ":x")
                      },
                      success: function(data, textStatus, jqXHR) {
                         
                         $(".navbar-right .list-unstyled").empty();
                         var date ;
                         var len = data.length;
                         if(len>0){
                           $.each(data, function(index, element){
                                if(index<=3){
                                  var today = moment();
                                  var today1 = moment(element.created_at);
                                   date = moment(element.created_at).format("DD-MM-YYYY");
                                   var str = element.created_at.split('T');
                                   var str1 = str[1].split('Z');
                                   var time = moment.utc(element.created_at).add('hours',5).add('minutes',30).format('hh:mm a');
                                   var origDiff = Math.abs(today.diff(today1,'days'));
                                   origDiff = (origDiff!=0)?origDiff+' days ago':'Today';
                                    $(".navbar-right .list-unstyled").append('<li><a href="https://www.mindler.com/assess/mymessages/'+element.id+'" class="li-link"><span class="image"><img src="https://cdn.mindler.com/img/defaultpic.png" alt="Profile Image"></span><span class="title">'+element.subject+'</span><span class="date">'+origDiff+' at '+time+' - '+date+'</span> </a></li>');
                                 }
                                 if(index == len - 1) {
                                   $(".navbar-right .list-unstyled").append('<li class="text-left bnt-row"><a href="https://www.mindler.com/assess/mymessages/'+element.id+'"  style="display: inline-block;padding: 0;color: #007fb6;margin-top: 5px;"><i class="fa fa-envelope margin-right-5"></i>Read All Messages </a><a href="https://www.mindler.com/assess/compose" class="btn btn-primary  btn-xs float-right "><i class="fa fa-plus  margin-right-5 " style="margin-top: -3px;"></i>New Message</a></li>');
                                 }
                           });
                         }else{

                            $(".navbar-right .list-unstyled").empty();
                           $(".navbar-right .list-unstyled").append('<li class="text-left bnt-row">No messages</li><li class="text-left bnt-row"><a href="https://www.mindler.com/assess/compose" class="btn btn-primary  btn-xs float-right "><i class="fa fa-plus  margin-right-5 " style="margin-top: -3px;"></i>New Message</a></li>');

                         }
   
                         
                      },
                      error: function(jqXHR, tranStatus) {
                        $('#result').text('Error');
                        $('#code').text(jqXHR.status);
                         x_request_id = jqXHR.getResponseHeader('X-Request-Id');
                         response_text = jqXHR.responseText;
                         if(jqXHR.status){
                           $(".navbar-right .list-unstyled").empty();
                           $(".navbar-right .list-unstyled").append('<li class="text-left bnt-row">No messages</li><li class="text-left bnt-row"><a href="https://www.mindler.com/assess/compose" class="btn btn-primary  btn-xs float-right "><i class="fa fa-plus  margin-right-5 " style="margin-top: -3px;"></i>New Message</a></li>');
                         }
                       }
                    }
                   );
                   
                     
                  
             }
         });*/


         $(".navbar-right .info-number").click(function() {
               var chkClass =  $(".navbar-right li").hasClass('open');
               if(chkClass==false){
                  var email = "mitnp17@gmail.com";
                  $(".navbar-right .list-unstyled").empty();
                  $(".navbar-right .list-unstyled").append('<li class="text-left bnt-row">Loading...</li>');
                  $.ajax(
                    {
                      url: "https://www.mindler.com/assess/getUserMessages",
                      type: 'GET',
                      contentType: "application/json; charset=utf-8",
                      dataType: "json",
                      success: function(data, textStatus, jqXHR) {
                         
                         $(".navbar-right .list-unstyled").empty();
                         var date ;
                         var len = data.length;
                         console.log(data);
                         if(len>0){
                           $.each(data, function(index, element){
                                if(index<=3){
                                  var today = moment();
                                  var today1 = moment.unix(element.created_at);
                                   date = moment.unix(element.created_at).format("DD-MM-YYYY");
                                   var time = moment.unix(element.created_at).add('hours',5).add('minutes',30).utc().format('hh:mm a');
                                   var origDiff = Math.abs(today.diff(today1,'days'));
                                   origDiff = (origDiff!=0)?origDiff+' days ago':'Today';
                                    $(".navbar-right .list-unstyled").append('<li><a href="https://www.mindler.com/assess/mymessages/'+element.id+'" class="li-link"><span class="image"><img src="https://cdn.mindler.com/img/defaultpic.png" alt="Profile Image"></span><span class="title">'+element.conversation_message.body+'</span><span class="date">'+origDiff+' at '+time+' - '+date+'</span> </a></li>');
                                 }
                                 if(index == len - 1) {
                                   $(".navbar-right .list-unstyled").append('<li class="text-left bnt-row"><a href="https://www.mindler.com/assess/mymessages/'+element.id+'"  style="display: inline-block;padding: 0;color: #007fb6;margin-top: 5px;"><i class="fa fa-envelope margin-right-5"></i>Read All Messages </a><a  href="https://www.mindler.com/assess/compose" class="btn btn-primary  btn-xs float-right "><i class="fa fa-plus  margin-right-5 " style="margin-top: -3px;"></i>New Message</a></li>');
                                 }
                           });
                         }else{

                            $(".navbar-right .list-unstyled").empty();
                           $(".navbar-right .list-unstyled").append('<li class="text-left bnt-row">No messages</li><li class="text-left bnt-row"><a  href="https://www.mindler.com/assess/compose" class="btn btn-primary  btn-xs float-right "><i class="fa fa-plus  margin-right-5 " style="margin-top: -3px;"></i>New Message</a></li>');

                         }
   
                         
                      },
                      error: function(jqXHR, tranStatus) {
                        $('#result').text('Error');
                        $('#code').text(jqXHR.status);
                         x_request_id = jqXHR.getResponseHeader('X-Request-Id');
                         response_text = jqXHR.responseText;
                         if(jqXHR.status){
                           $(".navbar-right .list-unstyled").empty();
                           $(".navbar-right .list-unstyled").append('<li class="text-left bnt-row">No messages</li><li class="text-left bnt-row"><a  href="https://www.mindler.com/assess/compose" class="btn btn-primary  btn-xs float-right "><i class="fa fa-plus  margin-right-5 " style="margin-top: -3px;"></i>New Message</a></li>');
                         }
                       }
                    }
                   );
                   
                     
                  
             }
         });
   
       /* end of notifications*/
   
   
        /* Dashboard posts section*/
        //$.getJSON('https://www.mindler.com/blog/?json=get_recent_posts&count=4', function(data) {
        $.getJSON('https://www.mindler.com/blog/wp-json/wp/v2/posts?_embed&per_page=4', function(data) {
          $(".dashboard-post-section #posts").empty();
          $(".dashboard-post-section #posts").append('<div class="loader" style="text-align: center;">Loading...</div>');
          $.each(data, function(index, element) {
               var date = moment(element.date).format("llll");
               var day = moment().format("DD.MM.YYYY");
               var time = moment.utc(element.date).add('hours',5).add('minutes',30).format('hh:mm a');
               var today = (date==day)?'Today':'';
               var img;
               var authorId = element.author;
               var content = element.excerpt.rendered;
			   var title = element.title.rendered;
               title= title.replace(/\s+/g, '-').toLowerCase()
               if(authorId){ 
                     getAvatar(authorId, function(responseData) {  
                        $(".dashboard-post-section #posts").append('<div class="col-md-6" style="padding: 0 7px;"><div class="post-box"><div class="social-avatar"><a target="_blank" href="'+element._embedded.author[0].link+'" class="pull-left"><span class="sender-img">'+responseData+'</span></a><div class="media-body"><h4><a style="color:#484848;" target="_blank" href="'+element._embedded.author[0].link+'" class="pull-left">'+element._embedded.author[0].name+'</a><br><small class="text-muted">'+today+' '+date+'</small></h4></div></div><h3><a onclick=ga(\"send\",\"event\",\"BlogFeed\",\"Title-Link\",\"'+title+'\") target="_blank" href="'+element.link+'">'+element.title.rendered+'</a></h3><div class="img-box"><a target="_blank" href="'+element.link+'"><img src="'+element._embedded['wp:featuredmedia'][0].source_url+'" class="img-resonsive " /></a></div>'+($(content).text().substring(0,100) + '...')+'<div class="margin-top-20"><a href="'+element.link+'" onclick=ga(\"send\",\"event\",\"BlogFeed\",\"ReadMore\",\"'+title+'\") target="_blank" class="btn btn-xs btn-default-ghost">Read More</a><a onclick="shareblog(\''+element.link+'\',\''+title+'\');" class="pull-right" style="color: #4267b2;font-size: 11px;margin-top: 3px;cursor:pointer" ><i  class="fa fa-facebook"></i> Share</a></div></div></div>')
                     
                       if(index==3){
                         $( ".loader" ).remove();
                         $(".dashboard-post-section #posts").after("<div class='col-xs-12 text-center'> <a target='_blank' onclick=ga(\'send\',\'event\',\'BlogFeed\',\'ViewAll\',\'\')  href='https://www.mindler.com/blog/'  class='btn btn-xs btn-primary  margin-top-10  font-size-13' >View all</a>");
                       }
   
                     });
   
                   
               }
           });
           
       });
   
   
       function getAvatar(authorId,callback){
   
            $.ajax(
             {
                 url: "https://www.mindler.com/assess/get_avatar",
                 type: 'GET',
                 data: {'ci_csrf_token' : '',authorId:authorId},
                 success:callback,
                 error: function(jqXHR, tranStatus) {
                   $('#result').text('Error');
                   $('#code').text(jqXHR.status);
                   x_request_id = jqXHR.getResponseHeader('X-Request-Id');
                   response_text = jqXHR.responseText;
                  
                 }
               }
             );
       }
       /*End of post*/
   
   
       /* Upload profile image code */
         $("#personal-tab-details #register-photo").change(function() {
          
          var formData = new FormData( $("#personal-tab-details")[0] );
          $("#blue-scheme .mindler-loader").css("display", "flex");
          var fileName = $(this).val();
          fileName = fileName.split('.');
          var arrayExtensions = ["jpg" , "jpeg", "png", "bmp", "gif"];
          
         /* $("#personal-tab-details .fileupload").next(".validation").remove(); // remove it
          if((jQuery.inArray(fileName[1],arrayExtensions)) == -1) { 
               $("#personal-tab-details .fileupload ").next(".validation").remove(); // remove it
               $("#personal-tab-details .fileupload ").after('<div class="validation" style="color:red;font-size: 10px;">You have uploaded an invalid image file type.</div>');
            $("#blue-scheme .mindler-loader").css("display", "none");
          }
          else if (typeof FormData !== 'undefined' && (jQuery.inArray(fileName[1],arrayExtensions))>0) {*/
            if (typeof FormData !== 'undefined'){
            
            $("#personal-tab-details .fileupload ").next(".validation").remove(); // remove it
            // send the formData
             $.ajax({
                 url : "https://www.mindler.com/assess/upload_file",  // Controller URL
                 type : 'POST',
                 data : formData,
                 cache : false,
                 contentType : false,
                 processData : false,
                 success : function(data) {
                     $(".fileupload").next(".validation").remove(); // remove it
                     var json = $.parseJSON(data);
                     d = new Date();
                     if(json.status=='success'){
                         var uid = json.file_name.split('.');
                         var src = 'http://mindlerstudentinfo.imgix.net/'+uid[0]+'/'+json.file_name+'?'+d.getTime()+'&w=70&h=70&fit=crop&crop=faces';
                         $("#header-image").attr("src", src);
                         $("#sidebar-image").attr("src", src);
                         $(".fileupload-exists .fileupload-preview").find("img").attr("src", src);
                             
                     }else{
                        $("#personal-tab-details .fileupload").after('<div class="validation" style="color:red;font-size: 10px;">You have uploaded an invalid image file type.</div>');
                     }
                     $("#blue-scheme .mindler-loader").css("display", "none");
                 }
             });
          
          } else {
            $("#personal-tab-details .fileupload ").after('<div class="validation" style="color:red;font-size: 10px;">You have uploaded an invalid image file type.</div>');
            $("#blue-scheme .mindler-loader").css("display", "none");
          }
          
          
          });
          
       /*End of code*/
   
   
       /* Book session section*/
        /*$(".for-book-schedule .form-group").click(function(){
            $(".error").remove(); // remove it
        });*/


        $("[id^='year-']").change(function(){
            var firstavailableday = 2;
            var lastavailableday = 14;
            var name = $(this).attr('id');
            var id = name.split('-');
            var yr = $('#year-'+id[1]).val();
            var d = new Date(),
                m = d.getMonth(),
                y = d.getFullYear();

            var lastDay = new Date(y, m + 1, 0);
            var ld = lastDay.getDate();
            
            var monthNames = ["Jan", "Feb", "March", "April", "May", "June","July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            $('#month-'+id[1]).empty();
            $('#date-'+id[1]).empty();
            $('#date-'+id[1]).append('<option value="" disabled="" selected="">Date</option>');
            
            var nm1= m+1;
            if(nm1==12){nm1=0;}
            var nm = monthNames[nm1];

            if(yr==y+1){
              $('#month-'+id[1]).append('<option value="" disabled="" selected="">Month</option>');
              $('#month-'+id[1]).append('<option value="'+(nm1+1)+'">'+nm+'</option>');
            }else{
              $('#month-'+id[1]).append('<option value="" disabled="" selected="">Month</option>');
              if(m==11){
                $('#month-'+id[1]).append('<option value="'+(m+1)+'">'+monthNames[m]+'</option>');
              }else{
                if((d.getDate()+lastavailableday)>ld && (d.getDate()<=(ld-firstavailableday))){
                    $('#month-'+id[1]).append('<option value="'+(m+1)+'">'+monthNames[m]+'</option>');
                    $('#month-'+id[1]).append('<option value="'+(nm1+1)+'">'+nm+'</option>');
                }else if(d.getDate()>(ld-firstavailableday)){
                    $('#month-'+id[1]).append('<option value="'+(nm1+1)+'">'+nm+'</option>');
                }else{
                    $('#month-'+id[1]).append('<option value="'+(m+1)+'">'+monthNames[m]+'</option>');
                }
              }
            }
            

      });


      /*$("[id^='year-']").change(function(){
   
             var name = $(this).attr('id');
             var id = name.split('-');
             var yr = $(this).val();
             var month = $('#month-'+id[1]).val();
             var cd = new Date();
             var d = new Date(),
                 m = d.getMonth(),
                 y = d.getFullYear();
             $(this).parents(".session-details.for-book-schedule").find(".error").remove(); // remove it
            
             if(month==(m+1) && yr==y){
   
               var d1 = new Date();
               d1.setDate(d1.getDate() + 12);
               var newdate1 = d1.getDate();
                   
               d.setDate(d.getDate() + 2);
               var newdate = d.getDate();
               if(newdate>newdate1){
                 newdate1="31";
               }
               
               $('#date-'+id[1]).empty();
               $('#date-'+id[1]).append('<option value="" disabled="" selected="">Date</option>');
                  for (var i = newdate; i <= newdate1; i++) {
                     var a = new Date(month+'/'+i+'/'+y);
                     var day = a.getDay();
                     if(day>0 ){
                       $('#date-'+id[1]).append('<option value="'+i+'">'+i+'</option>');
                     }
                     
                  }
             }else if(month>(m+1) && yr==y){
                var d1 = new Date();
                d1.setDate(d1.getDate() + 12);
                var newdate1 = d1.getDate();
   
               $('#date-'+id[1]).empty();
               $('#date-'+id[1]).append('<option value="" disabled="" selected="">Date</option>');
                  for (var i = 1; i <= newdate1; i++) {
                     var a = new Date(month+'/'+i+'/'+y);
                     var day = a.getDay();
                     if(day>0 ){
                         $('#date-'+id[1]).append('<option value="'+i+'">'+i+'</option>');
                       }
                  }
   
             }
   
       });*/



      $("[id^='month-']").change(function(){
            var h1 = new Date('06/28/2019');
            var h2 = new Date('01/01/2019');
            var h3 = new Date('11/09/2018');
            var firstavailableday = 2;
            var lastavailableday = 14;
            var name = $(this).attr('id');
            var id = name.split('-');
            var yr = $('#year-'+id[1]).val();
            var month = $(this).val();
            var cd = new Date();
            var d = new Date(),
                m = d.getMonth(),
                y = d.getFullYear();

            $(this).parents(".session-details.for-book-schedule").find(".error").remove(); // remove it
             if(yr==null){ 
                  $(this).parents(".session-details.for-book-schedule").find("#choose-date").append('<label class="error">Please choose year from drop down.</label>');
                  return false;
              }
              
            if(month==(m+1) && yr==y){ 

              var d1 = new Date();
              d1.setDate(d1.getDate() + lastavailableday);
              var newdate1 = d1.getDate();
                  
              d.setDate(d.getDate() + firstavailableday);
              var newdate = d.getDate();
              if(newdate>newdate1){
                newdate1="31";
              }
              
              $('#date-'+id[1]).empty();
              $('#date-'+id[1]).append('<option value="" disabled="" selected="">Date</option>');
                 for (var i = newdate; i <= newdate1; i++) {
                    var a = new Date(month+'/'+i+'/'+y);
                    var day = a.getDay();
                    var dateIs = moment(y+'-'+month+'-'+i);
                    dayNumber = Math.ceil(dateIs.date() / 7);
                    var checkSat = (day==6 && (dayNumber==1 || dayNumber==3))?true:false;
                    
                    if(day>0 && checkSat!=true && ((i==h1.getDate() && (month-1)==h1.getMonth())==false) && ((i==h2.getDate() && (month-1)==h2.getMonth())==false) && ((i==h3.getDate() && (month-1)==h3.getMonth())==false)){
                      $('#date-'+id[1]).append('<option value="'+i+'">'+i+'</option>');
                    }
                    
                 }
            }else if(month>(m+1) && yr==y){ 
               var d1 = new Date();
               d1.setDate(d1.getDate() + lastavailableday);
               var newdate1 = d1.getDate();

              $('#date-'+id[1]).empty();
              $('#date-'+id[1]).append('<option value="" disabled="" selected="">Date</option>');
                 for (var i = 1; i <= newdate1; i++) {
                    var a = new Date(month+'/'+i+'/'+y);
                    var day = a.getDay();
                    var dateIs = moment(y+'-'+month+'-'+i);
                    dayNumber = Math.ceil(dateIs.date() / 7);
                    var checkSat = (day==6 && (dayNumber==1 || dayNumber==3))?true:false;
                    
                    if(day>0 && checkSat!=true && ((i==h1.getDate() && (month-1)==h1.getMonth())==false) && ((i==h2.getDate() && (month-1)==h2.getMonth())==false) && ((i==h3.getDate() && (month-1)==h3.getMonth())==false)){
                        $('#date-'+id[1]).append('<option value="'+i+'">'+i+'</option>');
                      }
                 }

            }else if(yr!==y){
              var d1 = new Date();
               d1.setDate(d1.getDate() + lastavailableday);
               var newdate1 = d1.getDate();
               

              $('#date-'+id[1]).empty();
              $('#date-'+id[1]).append('<option value="" disabled="" selected="">Date</option>');
                 for (var i = 1; i <= newdate1; i++) {

                    var a = new Date(month+'/'+i+'/'+yr);
                    var day = a.getDay();
                    if(day>0  && ((i==h1.getDate() && (month-1)==h1.getMonth())==false) && ((i==h2.getDate() && (month-1)==h2.getMonth())==false) && ((i==h3.getDate() && (month-1)==h3.getMonth())==false)){
                        $('#date-'+id[1]).append('<option value="'+i+'">'+i+'</option>');
                      }
                 }
            }

      });
  

     /*vallidate date*/
      /*$("[id^='month-']").change(function(){
   
             var name = $(this).attr('id');
             var id = name.split('-');
             var yr = $('#year-'+id[1]).val();
             var month = $(this).val();
             var cd = new Date();
             var d = new Date(),
                 m = d.getMonth(),
                 y = d.getFullYear();
             $(this).parents(".session-details.for-book-schedule").find(".error").remove(); // remove it
             if(yr==null){ 
                  $(this).parents(".session-details.for-book-schedule").find("#choose-date").append('<label class="error">Please choose year from drop down.</label>');
                  return false;
              }

             if(month==(m+1) && yr==y){
   
               var d1 = new Date();
               d1.setDate(d1.getDate() + 12);
               var newdate1 = d1.getDate();
                   
               d.setDate(d.getDate() + 2);
               var newdate = d.getDate();
               if(newdate>newdate1){
                 newdate1="31";
               }
               
               $('#date-'+id[1]).empty();
               $('#date-'+id[1]).append('<option value="" disabled="" selected="">Date</option>');
                  for (var i = newdate; i <= newdate1; i++) {
                     var a = new Date(month+'/'+i+'/'+y);
                     var day = a.getDay();
                     if(day>0 ){
                       $('#date-'+id[1]).append('<option value="'+i+'">'+i+'</option>');
                     }
                     
                  }
             }else if(month>(m+1) && yr==y){
                var d1 = new Date();
                d1.setDate(d1.getDate() + 12);
                var newdate1 = d1.getDate();
   
               $('#date-'+id[1]).empty();
               $('#date-'+id[1]).append('<option value="" disabled="" selected="">Date</option>');
                  for (var i = 1; i <= newdate1; i++) {
                     var a = new Date(month+'/'+i+'/'+y);
                     var day = a.getDay();
                     if(day>0 ){
                         $('#date-'+id[1]).append('<option value="'+i+'">'+i+'</option>');
                       }
                  }
   
             }
   
       });*/
    
      
   
       /*End of book session*/
        new WOW().init();
    
        App.initPage();
        App.initLeftSideBar();
        App.initCounter();
        App.initNiceScroll();
        App.initPanels();
        App.initProgressBar();
        App.initSlimScroll();
        App.initNotific8();
        App.initTooltipster();
        App.initStyleSwitcher();
        App.initMenuSelected();
        App.initRightSideBar();
        App.initEmail();
        App.initSummernote();
        App.initAccordion();
        App.initModal();
        App.initPopover();
        App.initOwlCarousel();
        App.initSkyCons();
        App.initWidgets();
    
        DashboardGreen.initRickShawGraph();
        DashboardGreen.initFlotGraph();
        DashboardGreen.initChartGraph();
        DashboardGreen.initSparklineGraph();
        DashboardGreen.initDateRange();
        DashboardGreen.initWorldMap();
        DashboardGreen.initEasyPieChart();
        DashboardGreen.initMorrisChart();
        DashboardGreen.initTodoList();
    
    });
   
   
      /* Career search from dashboard*/
      $(".dashboard-post-section #go-career").click(function(){
         
         var availableTags = [];
         $('#dashboard-career').focus();
         $('#dashboard-career').autocomplete({
            source: availableTags,
            minLength: 0,
            scroll: true
         }).focus(function() {
            $(this).autocomplete("search", "");
         });

         var data = $(".dashboard-post-section #dashboard-career").val();
         var url = "https://www.mindler.com/careerlibrary?search=";
         if(data.length>0){
           $(".dashboard-post-section #dashboard-career").next(".error").remove(); // remove it
           window.open(url+data);
           //$(".dashboard-page #dashboard-career").val('');
         }/*else{
           $(".dashboard-page #dashboard-career").next(".error").remove(); // remove it
           $(".dashboard-page #dashboard-career").after('<label class="error" for="datepicker">This field is required.</label>');
           $(".dashboard-page #dashboard-career").focus();
         }*/
      });

      var availableTags = [];
      $('#dashboard-career').autocomplete({
            source: availableTags,
            minLength: 0,
            scroll: true
        }).focus(function() {
            $(this).autocomplete("search", "");
        });
   
     /* End of career search*/
</script>
<script>
   window.fbAsyncInit = function() {
     FB.init({
       appId      : '485869331607596',
       cookie     : true,
       xfbml      : true,
       version    : 'v2.8'
     });
     FB.AppEvents.logPageView();   
   };
   
   (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
   
   /*Share blog on fb*/
    function shareblog(url,title){
		ga("send","event","BlogFeed","Fshare",title)
          FB.ui({
          method: 'share',
          display: 'popup',
          href: url,
        }, function(response){
        });
   }

  var baseUrl = "https://www.mindler.com/";
  function referUsingFb(coupon){
      FB.ui({
        method: 'share_open_graph',
        action_type: 'og.shares',
        action_properties: JSON.stringify({
          object: {
            'og:url': baseUrl+'?refer='+coupon+'',
            'og:title': 'I found my perfect career. Find yours at INR 500 off!',
            'og:description': 'Use my referral code: '+coupon+' to get Rs. 500 off all Mindler career guidance programs.',
            'og:image': 'http://mindlerdashboard.imgix.net/referral-FB.png?w=500'
          }
        })
      },
      function (response) {
      // Action after response
      });


    }
   
   /*End fb share*/
   
   
   function shareMatch() {
	ga('send', 'event', 'My Matches', 'Fshare', '')
    FB.ui({
      method: 'share',
      display: 'popup',
      href: 'https://www.mindler.com/prelogin/shareMatch',
    }, function(response){});
   }
   
</script>

<div class="window-block"></div>
<!-- given by sat -->
<!-- Tracking @mindler -->
<script type="text/javascript">
  
$.ajax({
       type: "POST",
       url: "https://www.mindler.com/prelogin/track",
       data: {'ci_csrf_token' : '',"url":window.location.href} ,
       success: function(response){}
    });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70477724-1', 'auto');
  ga('send', 'pageview');

</script>








<!-- Hotjar Tracking Code for www.mindler.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1138297,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</body>
</html>
<!--===== Footer End ========