<main class="main-content">
    <div class="container">
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>SuperAdmin User</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ADD Admin</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="<?php echo base_url(); ?>admin/administrators" class="btn btn-gradient-primary btn-uppercase">
                    <i class="fa fa-list m-r-5"></i>Admins/Managers List
                </a>
            </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">New Admin</h6>
                        <?php echo $this->session->flashdata('alert'); ?>
                        <form action="<?php echo base_url(); ?>admin/administrators/add" enctype="multipart/form-data" method="POST">
                            <!-- Username -->
                            <div class="form-group">
                                <label for="admin_username">Username</label>
                                <input type="text" name="admin_username" value="<?php echo set_value('admin_username'); ?>" class="form-control <?php echo form_error('admin_username') != '' ? 'is-invalid' : ''; ?>" id="admin_username" placeholder="Username">
                                <?php echo form_error('admin_username'); ?>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="admin_email">Your Email</label>
                                <input type="email" name="admin_email" value="<?php echo set_value('admin_email'); ?>" class="form-control <?php echo form_error('admin_email') != '' ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" id="admin_email" placeholder="Email">
                                <?php echo form_error('admin_email'); ?>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.
                                </small>
                            </div>
                            <!-- Mobile -->
                            <div class="form-group">
                                <label for="admin_mobile">Your Mobile</label>
                                <input type="text" name="admin_mobile" value="<?php echo set_value('admin_mobile'); ?>" maxlength="10" class="form-control <?php echo form_error('admin_mobile') != '' ? 'is-invalid' : ''; ?>" aria-describedby="mobileHelp" id="admin_mobile" placeholder="Mobile">
                                <?php echo form_error('admin_mobile'); ?>
                                <small id="mobileHelp" class="form-text text-muted">We'll never share your mobile with
                                    anyone else.
                                </small>
                            </div>
                            <!-- Company -->
                            <div class="form-group">
                                <label for="admin_company">Your Company OR Institute</label>
                                <input type="text" name="admin_company" value="<?php echo set_value('admin_company'); ?>" class="form-control <?php echo form_error('admin_company') != '' ? 'is-invalid' : ''; ?>" id="admin_company" placeholder="Company / Institute">
                                <?php echo form_error('admin_company'); ?>
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="admin_password">Your Password</label>
                                <input type="password" name="admin_password" maxlength="20" minlength="5" class="form-control <?php echo form_error('admin_password') != '' ? 'is-invalid' : ''; ?>" aria-describedby="admin_password" id="admin_password" placeholder="Password">
                                <?php echo form_error('admin_password'); ?>
                                <small id="admin_password" class="text-muted"> Must be 5-20 characters long. </small>
                            </div>
                            <!-- Active User -->
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-checkbox-success">
                                    <input type="checkbox" name="admin_active" value="1" class="custom-control-input" id="customSwitch2_" checked>
                                    <label class="custom-control-label" for="customSwitch2_">Status (Active / Inactive)</label>
                                </div>
                            </div>
                             <!-- Device Type -->
                            <div class="form-group">
                                <label for="admin_devices">Select Role</label>
                                <select id="role" class="js-example-basic-single" name="role_id">
                                    <!-- <option></option> -->
                                    <?php
                                        if(!empty($get_roles)){
                                            foreach($get_roles as $get_role){
                                    ?>
                                    <option value="<?php echo $get_role->id;?>"><?php echo ucfirst($get_role->role);?></option>
                                <?php } }?>
                                </select>
                            </div>
                              <div class="form-group" id="upload_type">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- end::main content
