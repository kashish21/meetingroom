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
                        <li class="breadcrumb-item active" aria-current="page">Meeting List
                    </ol>
                </nav>
            </div>
            <div>
              <div class="btn-group">
                <!-- search -->
                <form class="form-inline my-2 my-lg-0 " method="post" >
                  <input name="searchKeyword" class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search">
                  <button name="submitSearch" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <!--search end-->
              </div>
              <div class="btn-group">
                <a class="btn btn-gradient-warning btn-uppercase" href="<?php echo base_url().'admin/index/add'; ?>"><i class="fa fa-plus m-r-5"></i>ADD Meeting</a>
              </div>
            </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php echo $this->session->flashdata('alert'); ?>
                        <?php echo $this->session->flashdata('record'); ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Si</th>
                                        <th scope="col">Meeting Id</th>
                                        <th scope="col">Conference Name</th>
                                        <th scope="col">Manager Name</th>
                                        <th scope="col">Meeting Name</th>
                                        <th scope="col">Date(YYYY-MM-DD)</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>
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
                                          <?php foreach ($conference_names as $conference_name): ?>
                                            <?php if ($conference_name->company_id == $company_id && $conference_name->id == $auser->conference_id): ?>
                                              <?php echo $conference_name->conference_name; ?>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        </td>
                                        <td>
                                          <!--Manager Name-->
                                            <i class="fa fa-user"> <?php echo $auser->manager; ?>
                                        </td>
                                        <td>
                                          <!-- Meeting Name-->
                                            <?php echo $auser->meeting_name; ?>
                                        </td>

                                        <td>
                                          <!--Meeting Date-->
                                            <?php echo $auser->date; ?>
                                        </td>
                                        <td>
                                          <!--Meeting Start Time-->
                                            <?php echo $auser->start_time.' '.$auser->am_pm_;  ?>
                                        </td>
                                        <td>
                                          <!--Meeting End Time-->
                                            <?php echo $auser->end_time.' '.$auser->am_pm; ?>
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
        <!-- pagination -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <!-- Show pagination links -->
            <?php echo $this->pagination->create_links(); ?>
          </ul>
        </nav>
        <!--pagination end-->
    </div>
</main>
<!-- end::main content -->
