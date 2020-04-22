<!-- begin::main content -->
<main class="main-content">

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3><?php echo $admin_users->username;?> (<?php echo $admin_users->role;?>)</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/administrators'); ?>">Admin Users List </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permission</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="<?php echo base_url(); ?>admin/administrators/add" class="btn btn-gradient-warning btn-uppercase">
                    <i class="fa fa-plus m-r-5"></i> ADD Admin users
                </a>
            </div>
        </div>
        <!-- end::page header -->

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <?php echo $this->session->flashdata('alert'); ?>
                        <!-- <span id="empmsg"></span> -->
                        <div class="table-responsive">
                           
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Si</th>
                                        
                                        
                                        <th scope="col">Modules</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($getMapModules) { ?>
                                    <?php 
                                        $i=1;
                                        foreach ($getMapModules as $getMapModule) { 
                                    ?>
                                    <tr>
                                        <td>
                                            <span class="badge badge-primary"><?php echo $i; $i++;?></span>
                                        </td>
                                  

                                  

                                        <td>
                                            <?php echo $getMapModule->name; ?>
                                           
                                        </td>
                                        <td>
                                            <input type="checkbox" name="view" data-user_id="<?php echo $this->uri->segment(4);?>" data-module_id = "<?php echo $getMapModule->module_id; ?>" class="permission_check" value="V"
                                                <?php
                                                    if(!empty($module_permission_gp))
                                                    {
                                                       foreach($module_permission_gp as $module_permission)
                                                       {
                                                            if(($module_permission->module_id == $getMapModule->module_id) && ($module_permission->permission == "V") )
                                                            {
                                                                echo "checked";
                                                            }
                                                       }
                                                    }
                                                ?>
                                            >
                                        </td>
                                        <td> 
                                            <input type="checkbox" name="edit" data-user_id="<?php echo $this->uri->segment(4);?>" data-module_id = "<?php echo $getMapModule->module_id; ?>" class="permission_check"  value="E"
                                                <?php
                                                    if(!empty($module_permission_gp))
                                                    {
                                                       foreach($module_permission_gp as $module_permission)
                                                       {
                                                            if(($module_permission->module_id == $getMapModule->module_id) && ($module_permission->permission == "E") )
                                                            {
                                                                echo "checked";
                                                            }
                                                       }
                                                    }
                                                ?>
                                            >
                                        </td>
                                        <td>
                                            <input type="checkbox" name="delete" data-user_id="<?php echo $this->uri->segment(4);?>" data-module_id = "<?php echo $getMapModule->module_id; ?>" class="permission_check" value="D"
                                                <?php
                                                    if(!empty($module_permission_gp))
                                                    {
                                                       foreach($module_permission_gp as $module_permission)
                                                       {
                                                            if(($module_permission->module_id == $getMapModule->module_id) && ($module_permission->permission == "D") )
                                                            {
                                                                echo "checked";
                                                            }
                                                       }
                                                    }
                                                ?>
                                            >
                                        </td>
                                       
                                       
                                    </tr>
                                    <?php }
                                    } ?>


                                </tbody>
                            </table>
                           
                        
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</main>
<!-- end::main content -->