<aside>
         <div id="sidebar" class="nav-collapse md-box-shadowed">
            <!-- sidebar menu start-->
            <div class="leftside-navigation leftside-navigation-scroll">
               <ul class="sidebar-menu" id="nav-accordion">
                  <li class="sidebar-profile" >
                     <div class="profile-main">
                        <div class="img-blue-box">
                           <p class="image">
                              <img id="sidebar-image" src="<?php echo base_url(); ?>default/images/a6.png" />                              <!-- <span class="status"><i class="fa fa-circle text-success"></i></span> -->
                           </p>
                        </div>
                              <?php 
                                 $UserId=$this->session->userdata('UserId');
                                 $FirstName=$this->session->userdata('FirstName');
                                 $LastName=$this->session->userdata('LastName');
                                 $EmailAddress=$this->session->userdata('EmailAddress');
                                 $RoleId=$this->session->userdata('RoleId');
                              ?>
                        <p>
                           <span class="name"><?php echo $FirstName.' '.$LastName; ?></span>
                        </p>
                        <p class="mobile-user-id" style="color: #888;font-size: 10px;margin-top: 3px;">User ID: 110892</span></p>
                     </div>
                  </li>

                  <li id="tour1"><a href="<?php echo base_url();?>home/dashboard" class="active"><span class="icon-home2 fa fa-home"></span><span class="nav-title">Dashboard</span></a>
                  </li>
                  <li id="tour2"><a href="<?php echo base_url();?>Dashboard/Profile/<?php echo $UserId ;?>"><span class="icon-home2 fa fa-user"></span><span class="nav-title">My Profile</span></a>
                  </li>
                  <!-- <li id="tour3"><a href="#" ><span class="icon-home2 fa fa-list"></span><span class="nav-title">My Tests</span></a>
                  </li>
                  <li id="tour8"><a href="#" ><span class="icon-home2 fa  fa-briefcase"></span><span class="nav-title">My Action Plan</span></a></li>
                  <li><a href="#" ><span class="icon-home2 fa fa-headphones "></span><span class="nav-title">Help </span></a>
                  </li> -->

                  <li class="mobile-menu-link change-password" style="border-top:1px #e9e9e9 solid"><a href="javascript:void(0);"  data-toggle="modal" data-target="#modal-change-password" style="padding: 7px 20px;color: #888;">
                     <span class="icon-home2 fa fa-lock "></span> <span class="nav-title font-size-12">Change Password</span></a></li>
                  <li  class="mobile-menu-link"><a href="<?php echo base_url();?>Home/logout" style="padding: 7px 20px;;color: #888;"><span class="icon-home2 fa fa-sign-out"></span><span class="nav-title font-size-12">Log Out</span></a></li>
                                 </ul>
            </div>
            <!-- sidebar menu end-->
         </div>
      </aside>