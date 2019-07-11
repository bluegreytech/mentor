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
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Assesment</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Assesment/Assesmentadd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Assesment</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Assesment/Assesmentlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Assesment</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Blog</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Blog/Blogadd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Blog</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Blog/Bloglist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Blog</a>
              </li>
            </ul>
          </li>
        <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Programs</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Program/Programadd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Program</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Program/Programlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Program </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Question Image</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>QImage/QImageadd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add a Question Image</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>QImage/QImagelist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Question Image </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Question</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Question/Questionadd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Question</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Question/Questionlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Question</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Question Answer</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Questionanswer/Questionansweradd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Question Answer</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Questionanswer/Questionanswerlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Question Answer</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Rate</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Rate/Rateadd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Answer Rate</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Rate/Ratelist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Answer Rate </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Standard</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Standard/AddStandard" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Standard</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Standard/Standardlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Standard </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Stream</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Stream/Streamadd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add Stream</a>
              </li>
              <li>
              <li>
                <a href="<?php echo base_url(); ?>Stream/Streamlist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Stream </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">User Role</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Userrole/Userroleadd" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add User Role </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>Userrole/Userrolelist" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i> List of User Role </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">User Session</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="<?php echo base_url(); ?>Usersession/AddUsersession" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add User Session </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>Usersession/ListUsersession" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i> List of User Session </a>
              </li>
            </ul>
          </li>
          <li class=" nav-item">
            <a>
              <i class="icon-briefcase"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quote</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="quoteinquiry_list.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-file-text2"></i> List of Quote Inquiry</a>
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