<main class="main-content">
    <div class="container">
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Meeting Details</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Meeting</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="<?php echo base_url().'admin/Index'; ?>" class="btn btn-gradient-primary btn-uppercase">
                    <i class="fa fa-list m-r-5"></i>Meeting List
                </a>
            </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">New Meeting</h6>
                        <?php echo $this->session->flashdata('alert'); ?>
                        <form action="<?php echo base_url().'admin/index/add'; ?>" enctype="multipart/form-data" method="POST">
                          <!-- Meeting Ajanda-->
                          <div class="form-group">
                              <label for="meeting_name">Meeting Name</label>
                              <input type="text" name="meeting_name" value="<?php echo set_value('meeting_name'); ?>" class="form-control <?php echo form_error('meeting_name') != '' ? 'is-invalid' : ''; ?>" id="meeting_name" placeholder="Meeting Name">
                              <?php echo form_error('meeting_name'); ?>
                          </div>
                          <!-- Conference -->
                          <div class="form-group">
                              <label for="conference_devices">Select Conference</label>
                              <select id="conference" class="js-example-basic-single" name="conference_company">
                                  <!-- <option></option> -->
                                  <?php
                                      if(!empty($get_conferences)){
                                          foreach($get_conferences as $get_conference){
                                  ?>
                                  <option value="<?php echo $get_conference->id;?>"><?php echo ucfirst($get_conference->conference_name);?></option>
                              <?php } }?>
                              </select>
                          </div>
                            <!--Date-->
                            <div class="form-group">
                                <label for="date">Enter Date</label>
                                <input type="date" min="<?php echo date('Y-m-d'); ?>" name="date" value="<?php echo set_value('date'); ?>" class="form-control <?php echo form_error('date') != '' ? 'is-invalid' : ''; ?>" id="time_slot" placeholder="Enter Date">
                                <?php echo form_error('date'); ?>
                            </div>
                            <!--Start Time Slot-->
                            <div class="form-group">
                                <label for="time_slot">Enter Start time</label>
                                <input type="time" name="time_slot" value="<?php echo set_value('time_slot'); ?>" class="form-control <?php echo form_error('time_slot') != '' ? 'is-invalid' : ''; ?>" id="time_slot" placeholder="Enter Start Time">
                                <?php echo form_error('time_slot'); ?>
                            </div>
                            <!-- AM/PM -->
                            <div class="form-group">
                                <label for="am_pm_devices">Select AM/PM</label>
                                <select id="am_pm_" class="js-example-basic-single" name="am_pm_">
                                    <!-- <option></option> -->
                                    <?php
                                        if(!empty($get_am_pms)){
                                            foreach($get_am_pms as $get_am_pm){
                                    ?>
                                    <option value="<?php echo $get_am_pm->am_pm ;?>"><?php echo $get_am_pm->am_pm ;?></option>
                                <?php } }?>
                                </select>
                            </div>
                            <!--End Time Slot-->
                            <div class="form-group">
                                <label for="end_time_slot">Enter End time</label>
                                <input type="time" name="end_time_slot" value="<?php echo set_value('end_time_slot'); ?>" class="form-control <?php echo form_error('end_time_slot') != '' ? 'is-invalid' : ''; ?>" id="end_time_slot" placeholder="Enter End Time">
                                <?php echo form_error('end_time_slot'); ?>
                            </div>
                            <!-- AM/PM -->
                            <div class="form-group">
                                <label for="am_pm_devices">Select AM/PM</label>
                                <select id="am_pm" class="js-example-basic-single" name="am_pm">
                                    <!-- <option></option> -->
                                    <?php
                                        if(!empty($get_am_pms)){
                                            foreach($get_am_pms as $get_am_pm){
                                    ?>
                                    <option value="<?php echo $get_am_pm->am_pm ;?>"><?php echo $get_am_pm->am_pm ;?></option>
                                <?php } }?>
                                </select>
                            </div>
                            <!-- Active/Inactive Conference -->
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-checkbox-success">
                                    <input type="checkbox" name="active" value="0" class="custom-control-input" id="customSwitch2_">
                                    <label class="custom-control-label" for="customSwitch2_">Status (Ongoing / Pending)</label>
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
