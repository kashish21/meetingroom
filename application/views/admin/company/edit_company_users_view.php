
<main class="main-content">
    <div class="container">
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Company Details</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Company</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="<?php echo base_url(); ?>admin/company" class="btn btn-gradient-primary btn-uppercase">
                    <i class="fa fa-list m-r-5"></i>Companies List
                </a>
            </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">New Company</h6>
                        <?php echo $this->session->flashdata('alert'); ?>
                        <form action="<?php echo base_url(); ?>admin/company/edit/<?php echo $this->uri->segment(4);?>" enctype="multipart/form-data" method="POST">
                          <?php foreach ($get_users as $get_user): ?>
                            <!-- Username -->
                            <div class="form-group">
                                <label for="company">Company Name</label>
                                <input type="text" name="company" value="<?php echo $get_user->company_name; ?>" class="form-control <?php echo form_error('company') != '' ? 'is-invalid' : ''; ?>" id="company" placeholder="Company Name">
                                <?php echo form_error('company'); ?>
                            </div>
                            <!-- Location -->
                            <div class="form-group">
                                <label for="location">Company Location</label>
                                <input type="text" name="location" value="<?php echo $get_user->location; ?>" maxlength="10" class="form-control <?php echo form_error('location') != '' ? 'is-invalid' : ''; ?>" aria-describedby="locationHelp" id="location">
                                <?php echo form_error('location'); ?>
                                <small id="mobileHelp" class="form-text text-muted">We'll never share your mobile with
                                    anyone else.
                                </small>
                            </div>
                            <!-- Active User -->
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-checkbox-success">
                                    <input type="checkbox" name="active" value="<?php echo $get_user->active; ?>" class="custom-control-input" id="customSwitch2_" checked>
                                    <label class="custom-control-label" for="customSwitch2_">Status (Active / Inactive)</label>
                                </div>
                            </div>
                            <?php endforeach; ?>
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
