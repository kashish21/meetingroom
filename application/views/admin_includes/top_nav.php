<!-- begin::navbar -->

<nav class="navbar">
    <div class="container-fluid">

        <div class="header-logo">
          <?php if ($role_id == 1): ?>
            <a href="<?php echo base_url(); ?>admin/dashboard"><h3>Meeting_Room</h3></a>
          <?php else: ?>
            <a href="<?php echo base_url(); ?>admin/company"><h3>Meeting_Room</h3></a>
          <?php endif; ?>
        </div>

        <div class="header-body">
            <form class="search">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="button" id="button-addon2">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="d-lg-none d-sm-block nav-link search-panel-open">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link nav-link-notify" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="dropdown-menu-title d-flex justify-content-between" data-backround-image="../assets/media/image/image1.png">
                            <div>
                                <h6 class="text-uppercase font-size-12 m-b-0">Messages</h6>
                                <small class="font-size-11 opacity-7">1 unread messages</small>
                            </div>
                            <div class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle no-icon" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down text-white"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">All Messages</a>
                                    <a href="#" class="dropdown-item">Mark All Read</a>
                                    <a href="#" class="dropdown-item">Settings</a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu-body">
                            <ul class="list-group list-group-flush">
                                <a href="#" class="list-group-item d-flex link-1 hide-show-toggler">
                                    <div>
                                        <figure class="avatar avatar-xs m-r-15">
                                            <span class="avatar-title bg-success rounded-circle">M</span>
                                        </figure>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="m-b-0 d-flex justify-content-between">
                                            Malanie Hanvey
                                            <i title="Read Mark" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                        </h6>
                                        <span class="text-muted m-r-10 small">PM 08:50</span>
                                        <span class="text-muted small">Have you mad...</span>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item d-flex link-1 bg-light hide-show-toggler">
                                    <div>
                                        <figure class="avatar avatar-xs m-r-15">
                                            <span class="avatar-title bg-primary rounded-circle">TB</span>
                                        </figure>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="m-b-0 d-flex justify-content-between">
                                            Kenneth Hune
                                            <i title="Read Mark" data-toggle="tooltip" class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                        </h6>
                                        <span class="text-muted m-r-10 small">PM 10:23</span>
                                        <span class="text-muted small">I have a meetin...</span>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item d-flex align-items-center link-1 hide-show-toggler">
                                    <div>
                                        <figure class="avatar avatar-xs m-r-15">
                                            <span class="avatar-title bg-danger rounded-circle">M</span>
                                        </figure>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="m-b-0 d-flex justify-content-between">
                                            Kevin added
                                            <i title="Read Mark" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                        </h6>
                                        <span class="text-muted m-r-10 small">PM 08:50</span>
                                        <span class="text-muted small">Have you mad...</span>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item d-flex align-items-center link-1 hide-show-toggler">
                                    <div>
                                        <figure class="avatar avatar-xs m-r-15">
                                            <span class="avatar-title bg-info rounded-circle">KC</span>
                                        </figure>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="m-b-0 d-flex justify-content-between">
                                            Katherine Ember
                                            <i title="Read Mark" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                        </h6>
                                        <span class="text-muted m-r-10 small">PM 20:13</span>
                                        <span class="text-muted small">I have a meetin...</span>
                                    </div>
                                </a>
                            </ul>
                        </div>
                        <div class="dropdown-menu-footer text-right">
                            <ul class="list-inline small">
                                <li class="list-inline-item">
                                    <a href="#">Mark All Read</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link nav-link-notify" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="dropdown-menu-title bg-primary-gradient">
                            <h6 class="text-uppercase font-size-12 m-b-0">Notifications</h6>
                            <small class="font-size-11 opacity-7">2 unread notifications</small>
                        </div>
                        <div class="dropdown-menu-body p-t-b-15 p-l-r-20">
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div>
                                        <figure class="avatar avatar-state-danger avatar-sm m-r-15 bring-forward">
                                            <span class="avatar-title bg-info-bright text-info rounded-circle">
                                                <i class="fa fa-file-text-o font-size-20"></i>
                                            </span>
                                        </figure>
                                    </div>
                                    <div>
                                        <p class="m-b-5">
                                            <a href="#">Kevin added</a> new attachment to the ticket
                                            <a href="#">Software Bug Reporting</a>
                                        </p>
                                        <small class="text-muted">
                                            <i class="fa fa-clock-o m-r-5"></i> 8 hours ago
                                        </small>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div>
                                        <figure class="avatar avatar-state-danger avatar-sm m-r-15 bring-forward">
                                            <span class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                <i class="fa fa-money font-size-20"></i>
                                            </span>
                                        </figure>
                                    </div>
                                    <div>
                                        <p class="m-b-5">
                                            <a href="#">Katherine</a> submitted new ticket
                                            <a href="#">Payment Method</a>
                                        </p>
                                        <small class="text-muted">
                                            <i class="fa fa-clock-o m-r-5"></i> Yesterday
                                        </small>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div>
                                        <figure class="avatar avatar-sm m-r-15 bring-forward">
                                            <span class="avatar-title bg-success-bright text-success rounded-circle">
                                                <i class="fa fa-dollar font-size-20"></i>
                                            </span>
                                        </figure>
                                    </div>
                                    <div>
                                        <p class="m-b-5">
                                            <a href="#">Katherine</a> changed settings to ticket category
                                            <a href="#">Payment & Invoice</a>
                                        </p>
                                        <small class="text-muted">
                                            <i class="fa fa-clock-o m-r-5"></i> 1 days ago
                                        </small>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div>
                                        <figure class="avatar avatar-sm m-r-15 bring-forward">
                                            <span class="avatar-title bg-danger-light text-danger rounded-circle">
                                                <i class="fa fa-upload font-size-20"></i>
                                            </span>
                                        </figure>
                                    </div>
                                    <div>
                                        <p class="m-b-5">
                                            <a href="#">Natalie</a> reassigned ticket Problem installing software to
                                            <a href="#">Katherine</a>
                                        </p>
                                        <small class="text-muted">
                                            <i class="fa fa-clock-o m-r-5"></i> 1 days ago
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu-footer text-right">
                            <ul class="list-inline small">
                                <li class="list-inline-item">
                                    <a href="#">Mark All Read</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-user-o"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="dropdown-menu-title text-center" data-backround-image="../assets/media/image/image1.png">
                            <figure class="avatar avatar-state-success avatar-sm m-b-10 bring-forward">
                                <img src="" class="rounded-circle" alt="DP">
                            </figure>
                            <h6 class="text-uppercase font-size-12 m-b-0"><?php echo (!empty($this->session->username))?$this->session->username:"";?></h6>
                        </div>
                        <div class="dropdown-menu-body">
                            <div class="bg-light p-t-b-15 p-l-r-20">
                                <h6 class="text-uppercase font-size-11">Profile completion</h6>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <a href="#" class="list-group-item link-2">Profile</a>
                                <a href="#" class="list-group-item link-2 d-flex">Followers <span class="text-muted ml-auto">214</span></a>
                                <a href="#" class="list-group-item link-2 sidebar-open" data-sidebar-target="#settings">Settings</a>
                                <a href="<?php echo base_url(); ?>logout" class="list-group-item text-danger">Logout</a>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-lg-none d-sm-block">
                    <a href="#" class="nav-link side-menu-open">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- end::navbar -->
