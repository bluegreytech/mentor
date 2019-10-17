    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <!--div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div-->
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>home/dashboard">
              <i class="icon-dashboard"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span>
            </a>
            
          </li> 
          <?php if($this->session->userdata('AdminId')==1){ ?>
            
         <li class="nav-item">
            <a>
              <i class="icon-user"></i><span data-i18n="nav.dash.main" class="menu-title">Admin</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>home/addadmin" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Admin</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>home/adminlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Admin</a>
              </li>
            </ul>
          </li> 
          <?php } ?>
          <li class="nav-item">
            <a>
              <i class="icon-users"></i><span data-i18n="nav.dash.main" class="menu-title">Student</span>
            </a>
            <ul class="menu-content">
            <!--   <li>
                <a href="<?php //echo base_url(); ?>User/Useradd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add User </a>
              </li> -->
              <li>
                <a href="<?php echo base_url(); ?>student/studentlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i> List of Student </a>
              </li>
            </ul>
          </li>
              <li class="nav-item">
                  <a href="<?php echo base_url();?>home/inquerylist">
                         <i class="icon-users"></i><span data-i18n="nav.dash.main" class="menu-title">Inquery List</span>
                  </a>
              </li>
              <li class="nav-item">
                <a>
                  <i class="icon-comments"></i><span data-i18n="nav.dash.main" class="menu-title">Testimonial</span>
                </a>
                <ul class="menu-content">
                  <li>
                    <a href="<?php echo base_url(); ?>testimonial/addtestimonial" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Testimonial</a>
                  </li>
                 
                  <li>
                    <a href="<?php echo base_url(); ?>testimonial/testimoniallist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Testimonial</a>
                  </li>
                </ul>
              </li> 
              <li class="nav-item">
                <a>
                  <i class="icon-blog"></i><span data-i18n="nav.dash.main" class="menu-title">Blog</span>
                </a>
                <ul class="menu-content">
                  <li>
                    <a href="<?php echo base_url(); ?>blog/addblog" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i>Add Blog</a>
                  </li>
                 
                  <li>
                    <a href="<?php echo base_url(); ?>blog/bloglist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Blog</a>
                  </li>
                </ul>
              </li> 
               <li class="nav-item">
                <a>
                  <i class="icon-rupee"></i><span data-i18n="nav.dash.main" class="menu-title">Price & Plan</span>
                </a>
                <ul class="menu-content">
                  <li>
                    <a href="<?php echo base_url(); ?>price/addprice" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Price</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>price/pricelist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i> List of Price </a>
                  </li>
                    <li class="nav-item">
                      <a><i class="icon-pie-chart"></i><span data-i18n="nav.dash.main" class="menu-title">Plan</span>
                      </a>
                      <ul class="menu-content">
                          <li>
                          <a href="<?php echo base_url(); ?>price/addplan" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Plan</a>
                          </li>
                          <li>
                          <a href="<?php echo base_url(); ?>price/planlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i> List of Plan </a>
                          </li>
                      </ul>
                    </li>

                   
                </ul>
              
          </li>

            <li class="nav-item">
                      <a><i class="icon-library"></i><span data-i18n="nav.dash.main" class="menu-title">Career Library</span>
                      </a>
                      <ul class="menu-content">
                          <li>
                          <a href="<?php echo base_url(); ?>Library/addcareer" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Career Library</a>
                          </li>
                          <li>
                          <a href="<?php echo base_url(); ?>Library" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i> List of Career Library </a>
                          </li>
                      </ul>
                    </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->