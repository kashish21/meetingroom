<!-- begin::main content -->
<main class="main-content">
    <div class="container">
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Conference LIST</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Conference List</li>
                    </ol>
                </nav>
            </div>
              <div>
                <div class="btn-group">
                  <!-- search -->
                  <form class="form-inline my-2 my-lg-0 " method="post" >
                    <input name="searchKeyword" class="form-control mr-sm-2" type="search" placeholder="Search Conferences..." aria-label="Search">
                    <button name="submitSearch" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                  <!--search end-->
                </div>
                  <div class="btn-group">
                    <a class="btn btn-gradient-warning btn-uppercase" href="<?php echo base_url().'admin/conference/add/'; ?>"><i class="fa fa-plus m-r-5"></i>ADD Conference</a>
                  </div>
              </div>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php echo $this->session->flashdata('record'); ?>
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Si</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Conference Name</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if ($conferences) {   ?>
                                  <?php
                                  $i=1;
                                  foreach ($conferences as $auser) {
                                  ?>
                                    <tr>
                                        <td>
                                            <span class="badge badge-primary"><?php echo $i; $i++;?></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-danger"><?php echo $auser->id; ?></span>
                                        </td>

                                          <td>
                                            <!-- Company Name -->
                                            <?php foreach ($company_names as $company_name): ?>
                                              <?php if ($company_name->id == $auser->company_id): ?>
                                                <?php echo $company_name->company_name; ?>
                                              <?php endif; ?>
                                            <?php endforeach; ?>
                                          </td>
                                          <td>
                                            <!-- Conference Name -->
                                              <?php echo $auser->conference_name; ?>
                                          </td>
                                            <td>
                                              <label class="switch">
                                                <input type="checkbox" <?php echo $auser->active == 1 ? 'checked' : ''; ?> name="admin_active" data-id="<?php echo $auser->id; ?>" value="1" class="custom-control-input status-change" id="customSwitch2_">
                                                <span class="slider round"></span>
                                              </label>
                                            </td>
                                    </tr>
                                  <?php   }
                                   }?>
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
