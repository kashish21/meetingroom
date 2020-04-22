<main class="main-content">
    <div class="container">
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Conference Details</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Conference</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="<?php echo base_url().'admin/conference/index/'; ?>" class="btn btn-gradient-primary btn-uppercase">
                    <i class="fa fa-list m-r-5"></i>Conferences List
                </a>
            </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">New Conference</h6>
                        <?php echo $this->session->flashdata('alert'); ?>
                        <form action="<?php echo base_url().'admin/conference/add/'; ?>" enctype="multipart/form-data" method="POST">

                          <!-- Conferrence Ajanda-->
                          <div class="form-group">
                              <label for="conference_name">Conference Name</label>
                              <input type="text" name="conference_name" value="<?php echo set_value('conference_name'); ?>" class="form-control <?php echo form_error('conference_name') != '' ? 'is-invalid' : ''; ?>" id="conference_name" placeholder="Conference Name">
                              <?php echo form_error('conference_name'); ?>
                          </div>
                          <!-- Company -->
                          <div class="form-group">
                              <label for="conference_devices">Select Company</label>
                              <select id="company" class="js-example-basic-single" name="conference_company">
                                  <!-- <option></option> -->
                                  <?php
                                      if(!empty($get_companies)){
                                          foreach($get_companies as $get_company){
                                  ?>
                                  <option value="<?php echo $get_company->id;?>"><?php echo ucfirst($get_company->company_name);?></option>
                              <?php } }?>
                              </select>
                          </div>
                            <!-- Active/Inactive Conference -->
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-checkbox-success">
                                    <input type="checkbox" name="active" value="1" class="custom-control-input" id="customSwitch2_" checked>
                                    <label class="custom-control-label" for="customSwitch2_">Status (Active / Inactive)</label>
                                </div>
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
