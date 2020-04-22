<!-- begin::main content -->
<main class="main-content">
    <div class="container">
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Manager Users</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Conferences List
                    </ol>
                </nav>
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
                                        <th scope="col">Conference Id</th>
                                        <th scope="col">Conference Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>
                                        <th scope="col">Do You Want to Book this Conference ?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($admin_users) { ?>
                                    <?php
                                        $i=1;
                                        foreach ($admin_users as $auser) {
                                    ?>
                                    <tr>
                                        <td>
                                            <span class="badge badge-primary"><?php echo $i; $i++;?></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-danger"><?php echo $auser->id; ?></span>
                                        </td>

                                        <td>
                                          <!--Conference Name-->
                                            <?php echo $auser->conference_name; ?>
                                        </td>
                                        <td>
                                          <!--Conference Date-->
                                            <i class="fa"></i> <?php echo $auser->date; ?>
                                        </td>
                                        <td>
                                          <!--Conference Start Time-->
                                            <i class="fa"></i> <?php echo $auser->time; ?>
                                        </td>
                                        <td>
                                          <!--Conference End Time-->
                                            <i class="fa"></i> <?php echo $auser->end_time; ?>
                                        </td>
                                        <td>
                                          <?php if ($auser->active == 0): ?>
                                            <!-- Conference Status -->
                                            <form action="<?php echo base_url().'admin/manager/book/'.$auser->id; ?>" method="post">
                                              <div>
                                                <input type="radio" id="customSwitch2_" name="active" value="1">
                                                <label for="Yes">Yes</label><br>
                                                <input type="radio" id="customSwitch2_" name="active" value="0">
                                                <label for="No">No</label><br>
                                              </div>
                                              <input type="submit" name="submit" value="submit">
                                            </form>
                                          <?php else: ?>
                                            <div class="form-group">
                                              <div class="custom-control custom-switch custom-checkbox-success">
                                                  <label for="active">Already Booked !!</label>
                                                  <label class="switch">
                                                    <input type="checkbox" name="active" value="1" class="custom-control-input status-change" id="customSwitch2_" checked>
                                                    <span class="slider round"></span>
                                                  </label>
                                              </div>
                                            </div>
                                          <?php endif; ?>
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
