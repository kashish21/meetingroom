
<div class="side-menu">
    <div class='side-menu-body'>
        <ul>
            <li class="side-menu-divider m-t-0"></li>
            <?php if ($role_id == 1) { ?>
                <li>
                <a class="<?php echo $menu == 'Index' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/administrators">
                    <i class="icon fa fa-globe"></i>
                    <span>Dashboard</span>
                </a>
            </li>
             <li class="side-menu-divider m-t-10">User Management</li>
            <li>
                <a class="<?php echo ((isset($main_menu)) ? $main_menu : "") == 'user_management' ? 'active' : ''; ?>" href="#">
                    <span>User Management</span>
                </a>
                <ul style="<?php echo ((isset($main_menu)) ? $main_menu : "") == 'user_management' ? 'display: block' : 'display: none'; ?>">
                    <li>
                        <a class="<?php echo $menu == 'administrators' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/administrators">
                            <i class="icon fa fa-user-md"></i>
                            <span>Admins/Managers</span>
                        </a>
                    </li>
                    </ul>
              </li>
            <!-- End Superadmin Nav -->

            <!-- for Admin -->
          <?php }else if($role_id == 2){?>
            <li>
            <a class="<?php echo $menu == 'Index' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/company">
                <i class="icon fa fa-globe"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="side-menu-divider m-t-10">Admin Management</li>
       <li>
           <a class="<?php echo ((isset($main_menu)) ? $main_menu : "") == 'company_management' ? 'active' : ''; ?>" href="#">

               <span>Admin Management</span>
           </a>
           <ul style="<?php echo ((isset($main_menu)) ? $main_menu : "") == 'company_management' ? 'display: block' : 'display: none'; ?>">
             <li>
                 <a class="<?php echo $menu == 'Company' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/company">
                     <i class="icon fa fa-user-md"></i>
                     <span>Companies</span>
                 </a>
             </li>
               <li>
                   <a class="<?php echo $menu == 'Manager' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/manager">
                       <i class="icon fa fa-user-md"></i>
                       <span>Managers</span>
                   </a>
               </li>
               <li>
                   <a class="<?php echo $menu == 'Conference' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/conference">
                       <i class="icon fa fa-user-md"></i>
                       <span>Conferences</span>
                   </a>
               </li>
           <!--/ul-->
       </li>
       <!--for manager-->
     <?php }else if($role_id == 5){?>
       <li>
       <a class="<?php echo $menu == 'Index' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/Index">
           <i class="icon fa fa-globe"></i>
           <span>Dashboard</span>
       </a>
   </li>
   <li class="side-menu-divider m-t-10">Manager Management</li>
  <li>
      <a class="<?php echo ((isset($main_menu)) ? $main_menu : "") == 'company_management' ? 'active' : ''; ?>" href="#">
          <span>Manager Management</span>
      </a>
  </li>
<?php }else{?>
  <?php $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">No such postion in the database</div>'); ?>
<?php } ?>
</ul>
</div>
</div>
<!-- end::side menu
