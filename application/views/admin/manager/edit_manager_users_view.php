<main class="main-content">
    <div class="container">
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Manager</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Manager</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="<?php echo base_url(); ?>admin/manager/index" class="btn btn-gradient-primary btn-uppercase">
                    <i class="fa fa-list m-r-5"></i>Managers List
                </a>
            </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Manager User</h6>
                        <?php echo $this->session->flashdata('alert'); ?>
                        <?php if ($get_users): ?>
                          <?php foreach ($get_users as $get_user): ?>
                            <form action="<?php echo base_url(); ?>admin/manager/edit/<?php echo $get_user->user_id;?>" enctype="multipart/form-data" method="POST">
                                <!-- Username -->
                                <div class="form-group">
                                    <label for="admin_username">Username</label>
                                    <input type="text" name="admin_username" value="<?php echo $get_user->username ;?>" class="form-control <?php echo form_error('admin_username') ; ?>" id="admin_username" placeholder="Username">
                                    <?php echo form_error('admin_username'); ?>
                                </div>
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="admin_email">Email</label>
                                    <input type="email" name="admin_email" value="<?php echo $get_user->email ; ?>" class="form-control <?php echo form_error('admin_email') ; ?>" aria-describedby="emailHelp" id="admin_email" placeholder="Email">
                                    <?php echo form_error('admin_email'); ?>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone else.
                                    </small>
                                </div>
                                <!-- Mobile -->
                                <div class="form-group">
                                    <label for="admin_mobile">Mobile</label>
                                    <input type="text" name="admin_mobile" value="<?php echo $get_user->phone ; ?>" maxlength="10" class="form-control <?php echo form_error('admin_mobile') ; ?>" aria-describedby="mobileHelp" id="admin_mobile" placeholder="Mobile">
                                    <?php echo form_error('admin_mobile'); ?>
                                    <small id="mobileHelp" class="form-text text-muted">We'll never share your mobile with
                                        anyone else.
                                    </small>
                                </div>
                                <!-- Company -->
                                <div class="form-group">
                                    <label for="manager_devices">Select Team</label>
                                    <select id="company" class="js-example-basic-single" name="admin_company">
                                        <!-- <option></option> -->
                                        <?php
                                            if(!empty($get_companies)){
                                                foreach($get_companies as $get_company){
                                        ?>
                                        <option value="<?php echo $get_company->id;?>"><?php echo ucfirst($get_company->company_name);?></option>
                                    <?php } }?>
                                    </select>
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
                              <?php endforeach; ?>
                            <?php endif; ?>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- end::main content
