<!-- begin::main content -->
<main class="main-content">
    <div class="container">
<?php $this->session->flashdata('alert'); ?>
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>CONFERENCE LIST</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Conference List</li>
                    </ol>
                </nav>
            </div>
                  </div>
              </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <?php echo $this->session->flashdata('alert'); ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Si</th>
                                        <th scope="col">User Id</th>
                                        <th scope="col">Conference Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>
                                        <th class="text-right" scope="col">Do You Want to Book this Conference ?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($company_users) {   ?>
                                    <?php
                                        $i=1;
                                          foreach ($company_users as $auser) {
                                    ?>
                                    <tr>
                                        <td>
                                            <span class="badge badge-primary"><?php echo $i; $i++;?></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-danger"><?php echo $auser->id; ?></span>
                                        </td>

                                          <td>
                                              <?php echo $auser->conference_name; ?>
                                          </td>

                                          <td>
                                              <i class="fa"></i> <?php echo $auser->date; ?>
                                          </td>
                                          <td>
                                              <i class="fa"></i> <?php echo $auser->time; ?>
                                          </td>
                                          <td>
                                              <i class="fa"></i> <?php echo $auser->end_time; ?>
                                          </td>
                                        <?php   }
                                         }?>
                                          <td>
                                            <!-- Conference Status -->
                                            <form class="" action="<?php base_url().'admin/conference/book/'.$id; ?>" method="post">
                                              <div>
                                                <input type="radio" id="customSwitch2_" name="active" value="1">
                                                <label for="Yes">Yes</label><br>
                                                <input type="radio" id="customSwitch2_" name="active" value="0">
                                                <label for="No">No</label><br>
                                              </div>
                                              <input type="submit" name="submit" value="submit">
                                            </form>

                                          </td>
                                    </tr>

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
