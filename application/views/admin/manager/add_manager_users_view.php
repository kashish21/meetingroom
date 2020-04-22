<main class="main-content">
    <div class="container">
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Manager</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ADD Manager</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="<?php echo base_url(); ?>admin/manager" class="btn btn-gradient-primary btn-uppercase">
                    <i class="fa fa-list m-r-5"></i>Managers List
                </a>
            </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">New Manager</h6>
                        <?php echo $this->session->flashdata('alert'); ?>
                        <form action="<?php echo base_url(); ?>admin/manager/add" enctype="multipart/form-data" method="POST">
                            <!-- Username -->
                            <div class="form-group">
                                <label for="manager_username">Username</label>
                                <input type="text" name="manager_username" value="<?php echo set_value('manager_username'); ?>" class="form-control <?php echo form_error('manager_username') != '' ? 'is-invalid' : ''; ?>" id="manager_username" placeholder="Username">
                                <?php echo form_error('manager_username'); ?>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="manager_email">Email</label>
                                <input type="email" name="manager_email" value="<?php echo set_value('manager_email'); ?>" class="form-control <?php echo form_error('manager_email') != '' ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" id="manager_email" placeholder="Email">
                                <?php echo form_error('manager_email'); ?>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.
                                </small>
                            </div>
                            <!-- Mobile -->
                            <div class="form-group">
                                <label for="manager_mobile">Mobile</label>
                                <input type="text" name="manager_mobile" value="<?php echo set_value('manager_mobile'); ?>" maxlength="10" class="form-control <?php echo form_error('manager_mobile') != '' ? 'is-invalid' : ''; ?>" aria-describedby="mobileHelp" id="manager_mobile" placeholder="Mobile">
                                <?php echo form_error('manager_mobile'); ?>
                                <small id="mobileHelp" class="form-text text-muted">We'll never share your mobile with
                                    anyone else.
                                </small>
                            </div>
                            <!-- Company -->
                            <div class="form-group">
                                <label for="manager_devices">Select Company</label>
                                <select id="company" class="js-example-basic-single" name="manager_company" required>
                                    <!-- <option></option> -->
                                    <?php
                                        if(!empty($get_companies)){
                                            foreach($get_companies as $get_company){
                                    ?>
                                    <option value="<?php echo $get_company->id;?>"><?php echo ucfirst($get_company->company_name);?></option>
                                <?php } }?>
                                </select>
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="manager_password">Password</label>
                                <input type="password" name="manager_password" maxlength="20" minlength="5" class="form-control <?php echo form_error('manager_password') != '' ? 'is-invalid' : ''; ?>" aria-describedby="manager_password" id="manager_password" placeholder="Password">
                                <?php echo form_error('manager_password'); ?>
                                <small id="manager_password" class="text-muted"> Must be 5-20 characters long. </small>
                            </div>
                            <!-- Active User -->
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-checkbox-success">
                                    <input type="checkbox" name="manager_active" value="1" class="custom-control-input" id="customSwitch2_" checked>
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
