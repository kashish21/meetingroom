<!-- begin::main content -->
<main class="main-content">

    <div class="container">
      <?php if ($role_id == 1) { ?>
        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Dashboard SUPERADMIN</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sales</li>
                    </ol>
                </nav>
            </div>
            <div>
                <div class="dropdown m-r-5">
                    <button id="btnGroupDrop1" type="button" class="btn btn-success btn-uppercase dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download Report
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">Pdf</a>
                        <a class="dropdown-item" href="#">Excel</a>
                        <a class="dropdown-item" href="#">File</a>
                    </div>
                </div>
                <a href="#" class="btn btn-warning btn-uppercase">
                    <i class="fa fa-external-link m-r-5"></i> Export
                </a>
            </div>
        </div>
        <?php }else if($role_id == 2){?>
          <div class="page-header d-md-flex align-items-center justify-content-between">
              <div>
                  <h3>Dashboard ADMIN</h3>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Admin</li>
                      </ol>
                  </nav>
              </div>
              <div>
                  <div class="dropdown m-r-5">
                      <button id="btnGroupDrop1" type="button" class="btn btn-success btn-uppercase dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Download Report
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                          <a class="dropdown-item" href="#">Pdf</a>
                          <a class="dropdown-item" href="#">Excel</a>
                          <a class="dropdown-item" href="#">File</a>
                      </div>
                  </div>
                  <a href="#" class="btn btn-warning btn-uppercase">
                      <i class="fa fa-external-link m-r-5"></i> Export
                  </a>
              </div>
          </div>
        <?php }else if($role_id == 5){?>
          <div class="page-header d-md-flex align-items-center justify-content-between">
              <div>
                  <h3>Dashboard MANAGER</h3>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Sales</li>
                      </ol>
                  </nav>
              </div>
              <div>
                  <div class="dropdown m-r-5">
                      <button id="btnGroupDrop1" type="button" class="btn btn-success btn-uppercase dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Download Report
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                          <a class="dropdown-item" href="#">Pdf</a>
                          <a class="dropdown-item" href="#">Excel</a>
                          <a class="dropdown-item" href="#">File</a>
                      </div>
                  </div>
                  <a href="#" class="btn btn-warning btn-uppercase">
                      <i class="fa fa-external-link m-r-5"></i> Export
                  </a>
              </div>
          </div>
        <?php } else { ?>
          <p>NO SUCH ROLE PRESENT</p>
        <?php } ?>
    </div>

</main>
