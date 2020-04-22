<!-- begin::main content -->
<main class="main-content">
    <div class="container">
      <?php $this->session->flashdata('alert'); ?>
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Companies LIST</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Companies List</li>
                    </ol>
                </nav>
            </div>
              <div>
                <div class="btn-group">
                  <!-- search -->
                  <form class="form-inline my-2 my-lg-0 " method="post" >
                    <input name="searchKeyword" class="form-control mr-sm-2" type="search" placeholder="Search Companies..." aria-label="Search">
                    <button name="submitSearch" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                  <!--search end-->
                </div>
                  <div class="btn-group">
                    <a class="btn btn-gradient-warning btn-uppercase" href="<?php echo base_url(); ?>admin/company/add"><i class="fa fa-plus m-r-5"></i>ADD Company</a>
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
                                        <th scope="col">User Id</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Company Location</th>
                                        <th scope="col">Company Created On</th>
                                        <th class="text-right" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($admin_users) {   ?>
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
                                            <!-- Active User -->
                                            <div class="custom-control custom-switch custom-checkbox-success">
                                                <label class="switch">
                                                  <input type="checkbox" <?php echo $auser->active == 1 ? 'checked' : ''; ?> name="admin_active"  value="1" class="custom-control-input status-change" >
                                                  <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </td>
                                          <td>
                                              <?php echo $auser->company_name; ?>
                                          </td>
                                          <td>
                                              <?php echo $auser->location; ?>
                                          </td>
                                        <td>
                                            <?php echo $auser->created_at; ?>
                                        </td>
                                        <td>
                                            <a class="pull-right dtldata"  href="<?php echo base_url(); ?>admin/company/delete_user/<?php echo $auser->id; ?>" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash text-danger fa-lg "></i></a>
                                            <a class="pull-right" href="<?php echo base_url();?>admin/company/edit/<?php echo $auser->id; ?>"><i class="fa fa-edit text-info fa-lg m-r-10"></i></a>
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
