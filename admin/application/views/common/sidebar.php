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
                <a href="<?php echo base_url(); ?>admin/addadmin" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Admin</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>admin/adminlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Admin</a>
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
         
         
         <!--   <li>
                <a href="<?php echo base_url(); ?>home/add_pages" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file"></i> Page Setting </a>
                    
              </li> -->
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->