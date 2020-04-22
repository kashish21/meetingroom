
<main class="main-content">

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>SuperAdmin</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Admin/Manager</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="<?php echo base_url(); ?>admin/administrators" class="btn btn-gradient-primary btn-uppercase">
                    <i class="fa fa-list m-r-5"></i>Admin/Manager List
                </a>
            </div>
        </div>
        <!-- end::page header -->

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Admin/Manager User</h6>
                        <?php echo $this->session->flashdata('alert'); ?>
                        <form action="<?php echo base_url(); ?>admin/administrators/edit/<?php echo $this->uri->segment(4);?>" enctype="multipart/form-data" method="POST">

                            <!-- Username -->
                            <div class="form-group">
                                <label for="admin_username">Username</label>
                                <input type="text" name="admin_username" value="<?php echo (!empty($get_users[0]->username))? $get_users[0]->username : ''; ?>" class="form-control <?php echo form_error('admin_username') != '' ? 'is-invalid' : ''; ?>" id="admin_username" placeholder="Username">
                                <?php echo form_error('admin_username'); ?>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="admin_email">Your Email</label>
                                <input type="email" name="admin_email" value="<?php echo (!empty($get_users[0]->email))? $get_users[0]->email : ''; ?>" class="form-control <?php echo form_error('admin_email') != '' ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" id="admin_email" placeholder="Email">
                                <?php echo form_error('admin_email'); ?>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.
                                </small>
                            </div>

                            <!-- Mobile -->
                            <div class="form-group">
                                <label for="admin_mobile">Your Mobile</label>
                                <input type="text" name="admin_mobile" value="<?php echo (!empty($get_users[0]->phone))? $get_users[0]->phone : ''; ?>" maxlength="10" class="form-control <?php echo form_error('admin_mobile') != '' ? 'is-invalid' : ''; ?>" aria-describedby="mobileHelp" id="admin_mobile" placeholder="Mobile">
                                <?php echo form_error('admin_mobile'); ?>
                                <small id="mobileHelp" class="form-text text-muted">We'll never share your mobile with
                                    anyone else.
                                </small>

                            </div>

                            <!-- Company -->
                            <div class="form-group">
                                <label for="admin_company">Your Company OR Institute</label>
                                <input type="text" name="admin_company" value="<?php echo (!empty($get_users[0]->company))? $get_users[0]->company : ''; ?>" class="form-control <?php echo form_error('admin_company') != '' ? 'is-invalid' : ''; ?>" id="admin_company" placeholder="Company / Institute">
                                <?php echo form_error('admin_company'); ?>
                            </div>
                            <!-- Active User -->
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-checkbox-success">

                                    <input type="checkbox" name="admin_active" value="<?php echo $get_users[0]->active; ?>" class="custom-control-input" id="customSwitch2_" <?php echo ($get_users[0]->active == 1)? 'checked' : ''; ?> >

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
                                    <option value="<?php echo $get_role->id;?>" <?php echo ($get_role->id == $get_users[0]->role_id)? 'selected' : ''; ?>><?php echo ucfirst($get_role->role);?></option>
                                <?php } }?>

                                </select>
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
